<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pembelian;
use App\Models\Layanan;
use App\Models\Kategori;
use App\Models\Voucher;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\digiFlazzController;
use App\Http\Controllers\VipResellerController;
use App\Http\Controllers\ApiGamesController;
use App\Http\Controllers\SmileOneController;
use App\Http\Controllers\JulyhyusController;
use Illuminate\Support\Facades\Http;

class TriPayCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $api = \DB::table('setings')->where('id',1)->first();
        
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $api->tripay_private_key);

        if ($signature !== (string) $callbackSignature) {
            return 'Invalid signature';
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return 'Invalid callback event, no action was taken';
        }

        $data = json_decode($json);
        $ref = $data->reference;

        $invoice = Pembayaran::where('reference', $ref)
            ->where('status', 'Belum Lunas')
            ->first();

        $order_id = $invoice->order_id;
        $dataPembeli = Pembelian::where('order_id', $order_id)->first();
        $dataLayanan = Layanan::where('layanan', $dataPembeli->layanan)->first();
        $dataKategori = Kategori::where('id', $dataLayanan->kategori_id)->first();

        $pesanPembeli = 
        "Yeay \n" .
        "Orderanmu dengan No Invoice: *$order_id* telah berhasil dibayar!\n\n" .
        "*Informasi Pembelian:*\n\n" .
        "Layanan : *$dataPembeli->layanan*\n" .
        "ID : *$dataPembeli->user_id ($dataPembeli->zone*)\n" .
        "Nickname : *$dataPembeli->nickname*\n" .
        "Harga : *Rp. " . number_format($dataPembeli->harga, 0, '.', ',') . "*\n" .
        "Status Pembelian: *Diproses*\n\n" .
        
        "_Terima Kasih ^^_";

        $zoneSend = $dataPembeli->zone == null ? "" : "($dataPembeli->zone)\n";
        $nickname = $dataPembeli->nickname == null ? '' : "Nickname : $dataPembeli->nickname\n";

        $pesanAdmin = 
        "*Pembayaran Berhasil*\n\n" .
        "No Invoice: *$order_id*\n" .
        "Layanan : $dataPembeli->layanan\n" .
        "ID : $dataPembeli->user_id\n" .
        "Server : $dataPembeli->zone\n" .
        $nickname .
            "Metode Pembayaran : $invoice->metode\n" .
            "Harga : Rp. " . number_format($invoice->harga, 0, '.', ',') . "\n\n" .
            "*Kontak Pembeli*\n" .
            "No HP : $invoice->no_pembeli\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/$order_id";

        $uid = $dataPembeli->user_id;
        $zone = $dataPembeli->zone;
        $provider_id = $dataLayanan->provider_id;

        if (!$invoice) {
            return 'Invoice not found or current status is not UNPAID';
        }

        if (intval($data->total_amount) !== (int) $invoice->harga) {
            return 'Invalid amount';
        }

        if ($data->status == "PAID") {
            
                $requestPesan = $this->msg(ENV('NOMOR_ADMIN'), $pesanAdmin);
		        $pesanPembeli = $this->msg($invoice->no_pembeli, $pesanPembeli);
           
                if($dataLayanan->provider == "digiflazz"){
                    $provider_order_id = rand(1, 10000);
                    $digiFlazz = new digiFlazzController;
                    $order = $digiFlazz->order($uid, $zone, $provider_id, $provider_order_id);
    
                    if ($order['data']['status'] == "Pending" || $order['data']['status'] == "Sukses") {
                        $order['data']['status'] = true;
                        $order['transactionId'] = $provider_order_id;
                    } else {
                        $order['data']['status'] = false;
                    }
                }else if($dataLayanan->provider == "vip"){
                    $vip = new VipResellerController;
                    $order = $vip->order($uid, $zone, $provider_id);
                    
                    if($order['result']){
                        $order['data']['status'] = $order['result'];
                        $order['transactionId'] = $order['data']['trxid'];
                    }else{
                        $order['data']['status'] = false;
                    }
                }else if($dataLayanan->provider == "alpharamz"){
                    $alpharamz = new AlpharamzController;
                    $order = $alpharamz->order($uid, $zone, $provider_id, $invoice->no_pembeli);
                    
                    if($order['status'] == true){
                        $order['data']['status'] = $order['status'];
                        $order['transactionId'] = $order['data']['id'];
                    }else{
                        $order['data']['status'] = false;
                    }
                }else if($dataLayanan->provider == "apigames"){
                    $provider_order_id = rand(1, 10000);
                    $apigames = new ApiGamesController;
                    $order = $apigames->order($uid, $zone, $provider_id, $provider_order_id);
    
                    if($order['data']['status'] == "Sukses"){
                        $order['transactionId'] = $provider_order_id;
                        $order['data']['status'] = true;
                    }else{
                        $order['data']['status'] = false;
                    }
                }else if($dataLayanan->provider == "joki"){
                    $order['data']['status'] = true;
                    }
            
                if ($order['data']['status']) { // Jika pembelian sukses
                
                if($dataPembeli->tipe_transaksi !== 'joki'){
                    
                    
                $pesanSukses = 
                    "Yeay\n\n" .
                    "Orderan kamu dengan No Invoice *$order_id* telah berhasil dikirim!\n\n" .
                    "*Catatan:*\n\n" .
                    "_Jika belum diterima silahkan kontak Admin dengan mengirim *Invoice* biar kami cek ^^_\n" .
                    "_Follow sosial media kami untuk info terbaru dan promo menarik lainnya_\n\n" . 
                   "_Terima Kasih ^^_";
                   
                $pesanSuksesAdmin = 
                    "Yeay\n\n" .
                    "Orderan dengan No Invoice *$order_id* telah berhasil dikirim!\n\n" .
                    "*Catatan:*\n\n" .
                    "_Jika belum diterima silahkan kontak Admin dengan mengirim *Invoice* biar kami cek ^^_\n" .
                    "_Follow sosial media kami untuk info terbaru dan promo menarik lainnya_\n\n" .
                   "_Terima Kasih ^^_";
    
                    $requestSuksesAdmin = $this->msg(ENV('NOMOR_ADMIN'), $pesanSuksesAdmin);
    		        $requestSukses = $this->msg($invoice->no_pembeli, $pesanSukses);

                

                    $dataPembeli->update([
                        'provider_order_id' => isset($order['transactionId']) ? $order['transactionId'] : 0,
                        'status' => 'Process',
                        'log' => json_encode($order)
                    ]);
                    
                    
                    
                }else{
                    
                    
                $pesanSukses = 
                    "Yeay\n\n" .
                    "Orderan kamu dengan No Invoice: *$order_id* telah berhasil dikirim\n\n" .
                    "*Catatan:*\n\n" .
                    "_Jika belum diterima silahkan kontak Admin dengan mengirim *Invoice* biar kami cek ^^_\n" .
                    "_Follow sosial media kami untuk info terbaru dan promo menarik lainnya_\n\n" .
                    "_Terima Kasih ^^_";
                   
                $pesanSuksesAdmin = 
                    "Yeay\n\n" .
                    "Orderan kamu dengan No Invoice: *$order_id* telah berhasil dikirim\n\n" .
                    "*Catatan:*\n\n" .
                    "_Jika belum diterima silahkan kontak Admin dengan mengirim *Invoice* biar kami cek ^^_\n" .
                    "_Follow sosial media kami untuk info terbaru dan promo menarik lainnya_\n\n" .
                    "_Terima Kasih ^^_";
    
                    $requestSuksesAdmin = $this->msg(ENV('NOMOR_ADMIN'), $pesanSuksesAdmin);
    		        $requestSukses = $this->msg($invoice->no_pembeli, $pesanSukses);
    
            
                    
                    
                }
                
                
                } else { //jika pembelian gagal

                   if($dataPembeli->tipe_transaksi !== 'joki'){
                       
                        $dataPembeli->update([
                        'status' => 'Batal',
                        'log' => json_encode($order)
                        ]);
                        
                   }

                }
            
            $invoice->update(['status' => 'Lunas']);

            return response()->json(['success' => true]);

        } else if ($data->status == "EXPIRED" || $data->status == "FAILED") {

            $invoice->update(['status' => 'Batal']);
            return response()->json(['success' => true]);

        } else {

            return response()->json(['error' => 'Unrecognized payment status']);

        }
    }
    
    public function msg($nomor, $msg)
    {
        $api = \DB::table('setings')->where('id',1)->first();
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.fonnte.com/send',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('target' => $nomor,'message' => $msg),
          CURLOPT_HTTPHEADER => array(
            'Authorization: '.$api->wa_key
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
     
}
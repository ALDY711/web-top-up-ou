

<?php $__env->startSection("content"); ?>

<?php echo $__env->make('../navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .css-16pvxfk {
    background: linear-gradient(270deg, rgb(211 211 211) -1.95%, rgb(110 7 7) 50.95%) !important;
}

  .css-6qw8qz {
    border: 1px solid rgba(203, 203, 203, 0.5);
    background: linear-gradient(163.42deg, rgb(90 90 90) -107%, rgba(255, 255, 255, 0) 105.46%);
}

  .css-6qw8qzz {
    border: 1px solid rgba(203, 203, 203, 0.5);
    background-color:#282828;
}




.css-138rpjn {
    background: linear-gradient(500deg, rgb(210 4 1) 0%, rgba(112, 127, 235, 0) 100%);
    color:white;
}

.css-138rpjnn:hover {
    background: linear-gradient(500deg, rgb(210 4 1) 0%, rgba(112, 127, 235, 0) 100%);
    color:white;
}
.font-medium {
    font-weight: 500;
}
.text-sm {
    font-size: .875rem;
    line-height: 1.25rem;
}
.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}
.rounded-3xl {
    border-radius: 1.5rem;
}
.gap-3 {
    gap: 0.75rem;
}
.items-center {
    align-items: center;
}
.flex {
    display: flex;
}
a {
    color: inherit;
    text-decoration: inherit;
}
</style>

<?php if(session('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session('error')); ?>

</div>
<?php elseif(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<main class="min-h-[50vh]">
 <div class="mx-auto max-w-7xl pb-24 grid grid-cols-12 gap-6 lg:gap-x-16 lg:py-8 lg:px-12 mb-10 md:px-4 px-4">
  <div class="hidden md:block lg:block xl:block col-span-1 lg:col-span-3">
   <aside class="py-6 lg:col-span-3 lg:p-0 sticky top-20">
   <nav class="h-full content-start lg:grid lg:content-between">
                    <div class="space-y-4">
                        <a class="group flex gap-3 items-center rounded-3xl px-3 py-2 text-sm font-medium css-138rpjnn" aria-current="page" href="/user/dashboard">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"></path>
                            </svg>
                            <span class="truncate hidden lg:block xl:block">Akun</span>
                        </a>
                        <a class="group flex gap-3 items-center rounded-3xl px-3 py-2 text-sm font-medium css-138rpjn css-138rpjnn" aria-current="page" href="/deposit">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M20 2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h4v5l4-2 4 2v-5h4c1.11 0 2-.89 2-2V4c0-1.11-.89-2-2-2zm0 13H4v-2h16v2zm0-5H4V4h16v6z"></path>
                            </svg>
                            <span class="truncate hidden lg:block xl:block">Deposit</span>
                        </a>
                        
                    </div>
                    <div class="cursor-pointer content-end">
                    </div>
                </nav>
   </aside>
  </div>
  <div class="col-span-12 md:col-span-11 lg:col-span-9 mt-6 sm:mt-6 lg:mt-0 md:mt-6">
   <div class="flex justify-start items-center gap-5 undefined"></div>
   <div class="flex p-4 mt-6 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
     <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div>
    Deposit bertanda manual konfirmasi ke WhatsApp Admin setelah melakukan transfer <a href="<?php echo e(ENV('APP_WA')); ?>?text=%20Halo%20Admin%20Deposit%20saya%20belum%20di%20konfirmasi%20ID%20Deposit:%20(...)" target="_blank"><b>WHATSAPP ADMIN</b> (KLIK)</a>
    </div>
   </div>
   <div class="mt-6 flex flex-col gap-6">
    <div class="p-6 rounded-2xl flex flex-col gap-3 css-6qw8qz">
     <div class="mt-2 border-b pb-2 grid-cols-12">
      <h3 class="pb-2 text-lg font-bold leading-6 md:text-xl flex items-center gap-3">
       <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path d="M20 2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h4v5l4-2 4 2v-5h4c1.11 0 2-.89 2-2V4c0-1.11-.89-2-2-2zm0 13H4v-2h16v2zm0-5H4V4h16v6z"></path>
       </svg>
       &nbsp; Deposit
      </h3>
     </div>
     <div class="mt-1 space-y-1">
      <div class="grid-cols-2">
                        <form class="form-horizontal mt-3" action="<?php echo e(route('deposit.post')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                        
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label text-white" for="simpleinput">Metode:</label>
                                    <div class="col-lg-12">
                                        <select class="form-control" name="metode">
                                           <!-- <option value="BCA">BCA(MANUAL)</option>-->
                                            <option value="OVO">OVO(MANUAL)</option>
                                            <option value="GOPAY">GOPAY(MANUAL)</option>
                                            <option value="DANA">DANA(MANUAL)</option>
                                           <!-- <option value="SHOPEPAY">SHOPEPAY(MANUAL)</option>-->
                                            <option value="BSI">BSI(MANUAL)</option>
                                        </select>
                                        <?php $__errorArgs = ['metode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label text-white" for="simpleinput">Jumlah:</label>
                                    <div class="col-lg-12">
                                        <input type="number" class="form-control text-dark <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukan Nominal Deposit" value="<?php echo e(old('jumlah')); ?>" name="jumlah" value="">
                                        <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>                            
                        </div>
          
          
          
     </div>
    </div>
   
    <div class="p-6 rounded-2xl flex flex-col gap-3 css-6qw8qz">
     <div class="mt-2 border-b pb-2 grid-cols-12">
      <h3 class="pb-2 text-lg font-bold leading-6 md:text-xl flex items-center gap-3">
       <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path
         d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
        ></path>
       </svg>
       &nbsp; Riwayat Deposit
      </h3>
     </div>
     <div class="mt-4 space-y-4">
                        <div class="table-responsive">
                            <table class="table m-o text-white">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jumlah</th>
                                        <th>Metode</th>
                                        <th>No Pembayaran</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                        		<?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    
                                    if($pesanan->status == "Pending" || $pesanan->status == "Batal"){
                                        $label_pesanan = 'warning';
                                    }else if($pesanan->status == "Processing"){
                                        $label_pesanan = 'info';
                                    }else if($pesanan->status == "Success"){
                                        $label_pesanan = 'success';
                                    }else{
                                        $label_pesanan = 'danger';
                                    }
                                ?>                        		
                        		<tr>
                        			<td><?php echo e($pesanan->id); ?></td>
                        			<td>Rp <?php echo e(number_format($pesanan->jumlah,0,',','.')); ?></td>
                        			<td><?php echo e($pesanan->metode); ?></td>
                        			<td><?php echo $pesanan->metode != "QRIS" ? $pesanan->no_pembayaran : '<a class="btn btn-primary" href="/assets/qrisdepo.png" target="_blank">Lihat QR</a>'; ?></td>
                        			<td><span class="badge bg-<?php echo e($label_pesanan); ?>"><?php echo e($pesanan->status); ?></span></td>
                        			<td><?php echo e($pesanan->created_at); ?></td>
                        		</tr>
                        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        		<tr>
                        			<td align="center" colspan="6">Tidak ada riwayat</td>
                        		</tr>
                        		<?php endif; ?>
                        	</table>
                        </div>
                        <div class="d-flex justify-content-center">
                            <?php echo e($data->links('vendor.pagination.simple-tailwind')); ?>

                        </div>                        
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
   </div>
  </div>
 </div>
</main>



<script type="text/javascript">
    function modal(name, link) {
        var myModal = new bootstrap.Modal($('#modal-detail'))
        $.ajax({
            type: "GET",
            url: link,
            beforeSend: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('Loading...');
            },
            success: function(result) {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html(result);
            },
            error: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('There is an error...');
            }
        });
        myModal.show();
    }
</script>

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="myModalLabel">QRIS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="/qris.jpg" width="70%" class="mx-auto d-flex justify-content-center">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo $__env->make('../footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>			
<?php echo $__env->make("main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nvdstor2/demo3.nvdstoreindonesia.com/system/resources/views/components/deposit.blade.php ENDPATH**/ ?>
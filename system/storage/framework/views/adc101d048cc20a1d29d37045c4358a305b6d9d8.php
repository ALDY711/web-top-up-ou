

<?php $__env->startSection("content"); ?>
<div class="wrapper pt-4">
    <div class="container mb-5">
        <div class="row mt-1">
            <div class="col-12">
                <div class="card bg-dark shadow cekstore-rounded-sedang">
                    <div class="card-header cekstore-rounded-sedang bg-cekstore">
                        <h5 class="card-title text-white mt-2">Daftar Harga</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-dark table-bordered table-hover"  style="font-size: 14px !important; margin-top: 0px; text-align: center">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp PID</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Product</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Item</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Price</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Gold Acc.</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Platinum Acc.</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if($data->status == "available"){
                                                $label_pesanan = "success";
                                            }else{
                                                $label_pesanan = "danger";
                                            }
                                        ?>
                                        <tr>
                                             <th scope="row"><?php echo e($data->id); ?></th>
                                            <td><?php echo e($data->nama_kategori); ?></td>
                                            <td><?php echo e($data->layanan); ?></td>
                                            <td>Rp. <?php echo e(number_format($data->harga,0,',','.')); ?></td>
                                            <td>Rp. <?php echo e(number_format($data->harga_gold,0,',','.')); ?></td>
                                            <td>Rp. <?php echo e(number_format($data->harga_platinum,0,',','.')); ?></td>
                                            <td>
                                                <span class="badge bg-<?php echo e($label_pesanan); ?>"><?php echo e($data->status); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.table').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nvdstor2/game.nvdstoreindonesia.com/system/resources/views/components/pricelist.blade.php ENDPATH**/ ?>
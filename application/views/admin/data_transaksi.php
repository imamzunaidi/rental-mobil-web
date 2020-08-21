<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>
        <?php echo $this->session->flashdata('pesan')?>
        <div class = "table-responsive">
            <table class = "table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Mobil</th>
                    <th>Tgl. Rental</th>
                    <th>Tgl. Kembali</th>
                    <th>Harga/Hari</th>
                    <th>Denda/Hari</th>
                    <th>Total Denda</th>
                    <th>Status Pengembalian</th>
                    <th>Status Rental</th>
                    <th>Cek Pembayaran</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1; foreach($transaksi as $tr):?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $tr->nama?></td>
                        <td><?php echo $tr->merk?></td>
                        <td><?php echo date('d-m-Y',strtotime($tr->tanggal_rental))?></td>
                        <td><?php echo date('d-m-Y',strtotime($tr->tanggal_kembali))?></td>
                        <td>Rp. <?php echo number_format($tr->harga,0,',','.')?></td>
                        <td>Rp. <?php echo number_format($tr->denda,0,',','.')?></td>
                        <td>Rp. <?php echo $tr->total_denda?></td>
                        <td>
                            <?php
                                if($tr->tanggal_pengembalian == "0000-00-00"){
                                    echo "-";
                                }else{
                                    echo date('d/m/Y', strtotime($tr->tanggal_pengembalian));
                                }
                            ?>
                        </td>
                        <td><?php echo $tr->status_rental?>
                            <?php 
                                // if($tr->status == "1"){
                                //     echo "Kembali";
                                // }else{
                                //     echo "Belum Kembali";
                                // }
                            ?>
                        </td>
                        <td>
                          <center>
                            <?php 
                                if(empty($tr->bukti_pembayaran)){?>
                                    <button class = "btn btn-sm btn-danger"><i class = "fas fa-times-circle"></i></button>
                                <?php }else{?>
                                    <a class = "btn btn-sm btn-primary "href="<?php echo base_url('admin/transaksi/pembayaran/'.$tr->id_rental)?>"><i class = "fas fa-check-circle"></i></a>
                            <?php }?>
                         </center>
                        </td>
                        <td>
                            <?php
                                if($tr->status == "1"){
                                    echo "-";
                                }else{?>
                                    <div class="row">
                                        <a class = "btn btn-sm btn-success" href="<?php echo base_url('admin/transaksi/transaksi_selesai/').$tr->id_rental?>"><i class = 'fas fa-check'></i></a>
                                        <a class = "btn btn-sm btn-danger ml-2" href="<?php echo base_url('admin/transaksi/transaksi_batal').$tr->id_rental?>"><i class = 'fas fa-times'></i></a>
                                    </div>
                                <?php } ?>
                        
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>

    </section>
</div>
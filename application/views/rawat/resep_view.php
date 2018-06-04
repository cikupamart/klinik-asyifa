<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/sweetalert2.css">
<script src="<?php echo base_url(); ?>js/sweetalert2.min.js"></script>
<script>
    function hapusData(obat_code) {
        var id = obat_code;
        swal({
            title: 'Anda Yakin ?',
            text: 'Data Faktur Akan di Hapus !',type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }, function() {
            window.location.href="<?php echo site_url('rawat/resep/deletedata'); ?>"+"/"+id
        });
    }
</script>

<?php 
if ($this->session->flashdata('notification')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notification'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Transaksi Rawat Jalan <small>Resep Pasien</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-bar-chart"></i>
                    <a href="<?php echo site_url('rawat/home'); ?>">Statistik</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Transaksi Rawat Jalan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Resep Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('rawat/resep/pilihpasien'); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Resep</button>
                </a>
                <br><br>                
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Resep Pasien
                        </div>
                        <div class="tools"></div>
                    </div>                    
                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>                                
                                <th width="10%">No. Faktur</th>
                                <th width="10%">Tanggal</th>
                                <th>Nama Pasien</th>
                                <th width="15%">Poliklinik</th>
                                <th width="15%">Dokter</th>
                                <th width="8%">Total</th>
                                <th width="5%">Status</th>
                                <th width="8%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($listResep as $r) {
                                $jual_id        = $r->jual_id;
                                $tanggal        = $r->jual_date;
                                if (!empty($tanggal)) {
                                    $xtanggal   = explode("-",$tanggal);
                                    $thn        = $xtanggal[0];
                                    $bln        = $xtanggal[1];
                                    $tgl        = $xtanggal[2];

                                    $date       = $tgl.'-'.$bln.'-'.$thn;
                                } else { 
                                    $date       = '';
                                }
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><?php echo $r->jual_no_faktur; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $r->pasien_nama; ?></td>
                                <td><?php echo $r->poliklinik_name; ?></td>
                                <td><?php echo $r->dokter_name; ?></td>
                                <td><?php echo number_format($r->jual_total, 0, '.', ','); ?></td>
                                <td>
                                    <?php if ($r->jual_st_bayar == 'Open') { ?>
                                    <span class="label label-primary"><?php echo $r->jual_st_bayar; ?></span>
                                    <?php } else { ?>
                                    <span class="label label-danger"><?php echo $r->jual_st_bayar; ?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('rawat/resep/editresep/'.$r->rawat_id.'/'.$r->jenis_id.'/'.$r->jual_no_faktur.'/'.$r->jual_id); ?>"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="icon-pencil"></i></button>
                                    </a>
                                    <?php if ($r->jual_total == 0) { ?>
                                    <a onclick="hapusData(<?php echo $jual_id; ?>)"><button class="btn btn-danger btn-xs" title="Hapus Data"><i class="icon-trash"></i></button>
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>

                        </table>
                    </div>
                </div>            
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
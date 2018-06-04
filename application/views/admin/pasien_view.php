<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Dashboard <small>Pasien</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('dashboard/home'); ?>">Daftar Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <?php if($this->session->flashdata('notif')){
          $pesan = $this->session->flashdata('notif');
          echo "<div class='alert alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> $pesan.
  </div>";
        } elseif($this->session->flashdata('gagal')) {
            $pesan = $this->session->flashdata('gagal');
          echo "<div class='alert alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Gagal!</strong> $pesan.
  </div>";
        }?>
            <div class="col-md-12">
                <a href="<?php echo site_url('admin/register'); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</button>
                </a>
                <br>
                <br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Pasien
                        </div>
                        <div class="tools"></div>
                    </div>

                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No RM</th>
                                <th width="15%">Nama Pasien</th>
                                <th width="10%">Alamat</th>
                                <th width="10%">Dokter</th>
                                <th width="25%">Keluhan</th>                               
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($pasien as $r) {
                                // $dokter_id = $r->dokter_id;
                            //<?php echo site_url('apotek/obat/editdata/'.$r->obat_code); -> ubah
                            // <?php echo $obat_code; -> hapus 
                            ?>
                            <tr>
                                <td><?php echo $r->no_rm; ?></td>           
                                <td><?php echo $r->nama_pasien ?></td>
                                <td><?php echo $r->alamat ?></td>
                                <td><?php echo $r->dokter_name ?></td>
                                <td><?php echo $r->keluhan ?></td>                                
                                <td>
                                    <a href="<?=base_url(); ?>admin/register/detail/<?php echo $r->id_pasien; ?>">
                                        <button class="btn btn-success btn-xs" title="Detail Data"><i class="icon-detail"></i>Detail</button></a>
                                    <a href="<?=base_url(); ?>admin/register/edit/<?php echo $r->id_pasien; ?>">
                                        <button class="btn btn-primary btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit</button></a>
                                    <a href="javascript:if(confirm('Apakah Anda Yakin Menghapus Data ini  ?')){document.location='<?php echo base_url(); ?>admin/register/delete/<?php echo $r->id_pasien; ?>';}">
                                        <button class="btn btn-danger btn-xs" title="Hapus Data">
                                            <i class="icon-trash"></i> Hapus</button>
                                    </a>
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
<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Dashboard <small>Dokter</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('dashboard/home'); ?>">Daftar Dokter</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('dokter/home/adddata'); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</button>
                </a>
                <br><br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Dokter
                        </div>
                        <div class="tools"></div>
                    </div>

                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Dokter</th>
                                <th width="10%">Kategori</th>
                                <th width="10%">Kota Dokter</th>
                                <th width="10%">Telp.</th>
                                <th width="15%">Alamat</th>                               
                                <th width="16%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>           
                                <td><?php echo $r['dokter_name'] ?></td>
                                <td><?php echo $r['kategori_dokter'] ?></td>
                                <td><?php echo $r['dokter_city'] ?></td>
                                <td><?php echo $r['dokter_phone'] ?></td>
                                <td><?php echo $r['dokter_address'] ?></td>                                
                                <td>
                                    <a href="<?=base_url(); ?>dokter/home/ubah/<?php echo $r['dokter_id']; ?>">
                                        <button class="btn btn-primary btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit</button></a>
                                    <a href="javascript:if(confirm('Apakah Anda Yakin Menghapus Data ini  ?')){document.location='<?php echo base_url(); ?>dokter/home/hapus/<?php echo $r['dokter_id']; ?>';}">
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
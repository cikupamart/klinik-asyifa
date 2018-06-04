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
            <?php foreach($pasien as $p){ ?>
            <div class="col-md-12">
                <a href="<?php echo site_url('admin/register/edit/'.$p->id_pasien); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i>Edit</button>
                </a>
                <br>
                <br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Detail Pasien
                        </div>
                        <div class="tools"></div>
                    </div>
                   
                    <div class="portlet-body">                        
                        <div class="profile">
                    <div class="row">
                        <div class="col-sm-6">
                                <div class="profile-photo">
                                </div>
                        </div>
                       <div class="col-sm-12">
                            <div class="profile-info">
                                <div class="profile-items clearfix">
                                        <h1 class="profile-title">
                                        <span></span>
                                        <? echo $p->nama_pasien ?></h1>
                                        <h2 class="profile-position">NO RM. <b><?echo $p->no_rm; ?></b></h2></div>
                                         <ul class="profile-list">
                                            <li class="clearfix">
                                                <strong class="title">Tanggal Kunjungan</strong>
                                                <span class="cont"><?echo $p->tanggal_kunjungan; ?></span>
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">Tempat Lahir</strong>
                                                <span class="cont"><?echo $p->tempat_lahir; ?></span>
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">Tanggal Lahir</strong>
                                                <span class="cont"><?echo $p->tanggal_lahir; ?></span>
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">Umur</strong>
                                                <span class="cont"><?echo $p->umur; ?></span>
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">Jenis Kelamin</strong>
                                                <span class="cont"><? if ($p->jenis_kelamin == 'L') {
                                                    echo "Laki -  Laki";
                                                }else{echo "Perempuan";}; ?></span>
                                            </li>
                                            <li class="clearfix">
                                                        <strong class="title">Alamat</strong>
                                                        <span class="cont"><?echo $p->alamat; ?>, <?echo $p->kecamatan; ?>, <?echo $p->kabupaten; ?>, <?echo $p->provinsi; ?></span>
                                                </li>
                                            <li class="clearfix">
                                                        <strong class="title">Pendidikan</strong>
                                                        <span class="cont"><?php echo $p->pendidikan ?></span>
                                                </li>
                                            <li class="clearfix">
                                                        <strong class="title">No Telepon</strong>
                                                        <span class="cont"><? echo $p->no_telp?></span>
                                                </li>
                                            <li class="clearfix">
                                                        <strong class="title">Pekerjaan</strong>
                                                        <span class="cont"><? echo $p->pekerjaan; ?></span>
                                                </li>
                                            <li class="clearfix">
                                                        <strong class="title">Agama</strong>
                                                        <span class="cont"><? echo $p->agama; ?></span>
                                                </li>
                                                <li class="clearfix">
                                                        <strong class="title">Status</strong>
                                                        <span class="cont"><? echo $p->status; ?></span>
                                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                        <?php } ?>
                    </div>
                </div>            
            </div>
        </div>         
        <div class="clearfix"></div>
    </div>
</div>
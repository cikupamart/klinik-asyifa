<div class="page-container">
    <div class="page-head">
        <div class="container">
            <div class="page-title">
                <h1>Dashboard <small>Main Menu</small></h1>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">            
            <ul class="page-breadcrumb breadcrumb">
                <li class="active">
                    <a href="<?php echo site_url('dashboard/home'); ?>">Dashboard</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Selamat Datang, <a href="<?php echo site_url('dashboard/profil'); ?>"><b><?php echo ucwords(strtolower($this->session->userdata('nama'))); ; ?></b></a>
                </li>                
            </ul>
            
            <div class="row margin-top-10">
                <div class="col-md-12 col-sm-12">                   
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue-madison">
                            <div class="visual">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="details">
                                <div class="number"></div>
                                <div class="desc">
                                    Pendaftaran
                                </div>
                            </div>
                            <a class="more" href="<?php echo site_url('admin/home') ;?>">
                            Enter Menu <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red-intense">
                            <div class="visual">
                                <i class="fa fa-medkit"></i>
                            </div>
                            <div class="details">
                                <div class="number"></div>
                                <div class="desc">
                                    Klinik
                                </div>
                            </div>
                            <a class="more" href="<?php echo site_url('clinic/clinic') ;?>">
                            Enter Menu <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green-haze">
                            <div class="visual">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <div class="details">
                                <div class="number"></div>
                                <div class="desc">
                                    Dokter
                                </div>
                            </div>
                            <a class="more" href="<?php echo site_url('dokter/home') ;?>">
                            Enter Menu <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat purple-plum">
                            <div class="visual">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="details">
                                <div class="number"></div>
                                <div class="desc">
                                    Pengguna
                                </div>
                            </div>
                            <a class="more" href="<?php echo site_url('admin/users') ;?>">
                            Enter Menu <i class="m-icon-swapright m-icon-white"></i>
                            </a>                            
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div>
</div>
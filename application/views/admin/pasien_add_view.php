
<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Pasien <small>Tambah</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-user-plus"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Register</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Pasien</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/produk'); ?>">Pasien</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Tambah Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-square"></i> Form Tambah Pasien
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('admin/register/savedata'); ?>" method="post" enctype="multipart/form-data" name="form1">
                        <input type="hidden">

                            <div class="form-body">
                            <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Tanggal Kunjungan</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="form_control_1" value="<?php echo date('Y-m-j'); ?>" name="tgl_kunjungan" readonly="" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">No. RM</label>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" value="<? echo date('m') ?>" id="form_control_1" name="no_rm1" maxlength="2" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" val id="form_control_1" value="<? echo substr(date('Y'),2,2) ?>" name="no_rm2" maxlength="2" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" value="<?echo $maxid + 1?>" id="form_control_1" name="no_rm3" maxlength="2" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter Nama Pasien" name="name" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Tempat Lahir</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter Tempat Lahir" name="tmpt_lahir" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Tanggal Lahir</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="form_control_1" value="" name="tgl_lahir" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Umur</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="form_control_1" placeholder="Enter Tempat Umur" name="umur" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">No Telepon</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="form_control_1" placeholder="Enter Tempat Umur" name="no_telp" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Alamat</label>
                                    <div class="col-md-10">
                                        <textarea rows="1" name="alamat" class="form-control"></textarea>
                                        <select class="form-control" name="provinsi">
                                            <option value="DIY">DIY</option>
                                        </select>
                                        <select class="form-control" name="kabupaten">
                                            <option value="Gunung Kidul">Gunung Kidul</option>
                                        </select>
                                        <select class="form-control" name="kecamatan">
                                            <option value="">Pilih Kecamatan</option>
                                            <option value="gedangsari">Gedang Sari</option>
                                            <option value="girisubo">Girisubo</option>
                                            <option value="karangmojo">Karangmojo</option>
                                            <option value="ngawen">Ngawen</option>
                                            <option value="nglipar">Nglipar</option>
                                            <option value="paliyan">Paliyan</option>
                                            <option value="panggang">Panggang</option>
                                            <option value="patuk">Patuk</option>
                                            <option value="playen">Playen</option>
                                            <option value="ponjong">Ponjong</option>
                                            <option value="purwosari">Purwosari</option>
                                            <option value="rongkop">Rongkop</option>
                                            <option value="saptosari">Saptosari</option>
                                            <option value="semanu">Semanu</option>
                                            <option value="semin">Semin</option>
                                            <option value="tanjungsari">Tanjung Sari</option>
                                            <option value="tepus">Tepus</option>
                                            <option value="wonosari">Wonosari</option>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Jenis Kelamin</label>
                                    <div class="col-md-10">
                                        <label class="radio-inline"><input type="radio" value="L" name="jk">Laki-Laki</label>
                                        <label class="radio-inline"><input type="radio" value="P" name="jk">Perempuan</label>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Pekerjaan</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter Nama Pekerjaan" name="pekerjaan" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Pendidikan</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter Pendidikan" name="pendidikan" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Agama</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="agama">
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="budha">Budha</option>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Staus</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="">Pilih Status...</option>
                                            <option value="nikah">Nikah</option>
                                            <option value="belum nikah">Belum Nikah</option>
                                            <option value="cerai hidup">Cerai Hidup</option>
                                            <option value="cerai mati">Cerai Mati</option>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Klinik</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="klinik">
                                            <option value="UMUM">UMUM</option>
                                            <option value="KIA">KIA</option>
                                            <option value="ANAK">ANAK</option>
                                            <option value="KB">KB</option>
                                            <option value="INC">INC</option>
                                            <option value="LABORATORIUM">LABORATORIUM</option>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Dokter</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="dokter">
                                            <option value="">Pilih Dokter....</option>
                                            <?php
                                                foreach ($dokter as $r) {
                                                    echo "<option value='$r->dokter_name'>$r->dokter_name</option>";
                                                }
                                            ?>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Keluhan</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="keluhan" rows="5"></textarea>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                </div> 
                                <!-- footer -->   
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan</button>
                                        <a href="<?php echo site_url('admin/pasien'); ?>" class="btn yellow"><i class="fa fa-times"></i> Batal</a>
                                    </div>
                                </div>
                            </div>
                            <!-- batas -->
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>            
</div>  
<? foreach ($pasien as $p) {
   $dokterval =  $p->dokter_name;
?>
<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Pasien <small>Edit</small>
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
                    <a href="<?php echo site_url('admin/register'); ?>">Pasien</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-square"></i> Form Edit Pasien
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('admin/register/update/'.$p->id_pasien); ?>" method="post" enctype="multipart/form-data" name="form1">
                        <input type="hidden">

                            <div class="form-body">
                            <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Tanggal Kunjungan</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="form_control_1" value="<?php echo $p->tanggal_kunjungan; ?>" name="tgl_kunjungan" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">No. RM</label>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" value="<? echo substr($p->no_rm, 0,2) ?>" id="form_control_1" name="no_rm1" maxlength="2" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="form_control_1" value="<? echo substr($p->no_rm, 3,2) ?>" name="no_rm2" maxlength="2" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="form_control_1" name="no_rm3" value="<? echo substr($p->no_rm, 6,2) ?>" maxlength="2" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="form_control_1" value="<? echo $p->nama_pasien ?>" placeholder="Enter Nama Pasien" name="name" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Tempat Lahir</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="form_control_1" value="<? echo $p->tempat_lahir ?>" placeholder="Enter Tempat Lahir" name="tmpt_lahir" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Tanggal Lahir</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="form_control_1" value="<? echo $p->tanggal_lahir ?>" name="tgl_lahir" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Umur</label>
                                    <div class="col-md-10">
                                        <input type="number" value="<? echo $p->umur ?>" class="form-control" id="form_control_1" placeholder="Enter Tempat Umur" name="umur" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">No Telepon</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" value="<? echo $p->no_telp ?>" id="form_control_1" placeholder="Enter Tempat Umur" name="no_telp" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Alamat</label>
                                    <div class="col-md-10">
                                        <textarea rows="1" name="alamat" class="form-control"><?echo $p->alamat?></textarea>
                                        <select class="form-control" name="provinsi">
                                            <option value="DIY">DIY</option>
                                        </select>
                                        <select class="form-control" name="kabupaten">
                                            <option value="Gunung Kidul">Gunung Kidul</option>
                                        </select>
                                        <select class="form-control" name="kecamatan">
                                            <option value="">Pilih Kecamatan</option>
                                            <option <?php if($p->kecamatan == 'gedangsari') echo "selected=''"; ?> value="gedangsari">Gedang Sari</option>
                                            <option <?php if($p->kecamatan == 'girisubo') echo "selected=''"; ?> value="girisubo">Girisubo</option>
                                            <option <?php if($p->kecamatan == 'karangmojo') echo "selected=''"; ?> value="karangmojo">Karangmojo</option>
                                            <option <?php if($p->kecamatan == 'ngawen') echo "selected=''"; ?> value="ngawen">Ngawen</option>
                                            <option <?php if($p->kecamatan == 'nglipar') echo "selected=''"; ?> value="nglipar">Nglipar</option>
                                            <option <?php if($p->kecamatan == 'paliyan') echo "selected=''"; ?> value="paliyan">Paliyan</option>
                                            <option <?php if($p->kecamatan == 'panggang') echo "selected=''"; ?> value="panggang">Panggang</option>
                                            <option <?php if($p->kecamatan == 'patuk') echo "selected=''"; ?> value="patuk">Patuk</option>
                                            <option <?php if($p->kecamatan == 'playen') echo "selected=''"; ?> value="playen">Playen</option>
                                            <option <?php if($p->kecamatan == 'ponjong') echo "selected=''"; ?> value="ponjong">Ponjong</option>
                                            <option <?php if($p->kecamatan == 'purwosari') echo "selected=''"; ?> value="purwosari">Purwosari</option>
                                            <option <?php if($p->kecamatan == 'rongkop') echo "selected=''"; ?> value="rongkop">Rongkop</option>
                                            <option <?php if($p->kecamatan == 'saptosari') echo "selected=''"; ?> value="saptosari">Saptosari</option>
                                            <option <?php if($p->kecamatan == 'semanu') echo "selected=''"; ?> value="semanu">Semanu</option>
                                            <option <?php if($p->kecamatan == 'semin') echo "selected=''"; ?> value="semin">Semin</option>
                                            <option <?php if($p->kecamatan == 'tanjungsari') echo "selected=''"; ?> value="tanjungsari">Tanjung Sari</option>
                                            <option <?php if($p->kecamatan == 'tepus') echo "selected=''"; ?> value="tepus">Tepus</option>
                                            <option <?php if($p->kecamatan == 'wonosari') echo "selected=''"; ?> value="wonosari">Wonosari</option>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Jenis Kelamin</label>
                                    <div class="col-md-10">
                                        <label class="radio-inline"><input type="radio"<? if($p->jenis_kelamin == "L") echo "checked=''"; ?> value="L" name="jk">Laki-Laki</label>
                                        <label class="radio-inline"><input type="radio" <? if($p->jenis_kelamin == "P") echo "checked=''"; ?> value="P" name="jk">Perempuan</label>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Pekerjaan</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?echo $p->pekerjaan?>" class="form-control" id="form_control_1" placeholder="Enter Nama Pekerjaan" name="pekerjaan" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Pendidikan</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?echo $p->pendidikan?>" class="form-control" id="form_control_1" placeholder="Enter Pendidikan" name="pendidikan" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Agama</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="agama">
                                            <?
                                                switch ($p->agama) {
                                                    case 'islam':?>
                                                        <option selected="" value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <? break;
                                                        case 'kristen':
                                                            ?>
                                                        <option value="islam">Islam</option>
                                                        <option selected="" value="kristen">Kristen</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <?
                                                            break;
                                                        case 'katolik':
                                                            ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option selected="" value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <?
                                                            break;
                                                        case 'hindu':
                                                            ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option selected="" value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <?
                                                            break;
                                                        case 'budha':
                                                            ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option selected="" value="budha">Budha</option>
                                                        <?
                                                            break;
                                                    
                                                    default:
                                                        ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <?
                                                        break;
                                                }
                                            ?>
                                            
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Staus</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <? switch ($p->status) {
                                                case 'nikah':
                                                    ?><option value="">Pilih Status...</option>
                                            <option selected="" value="nikah">Nikah</option>
                                            <option value="belum nikah">Belum Nikah</option>
                                            <option value="cerai hidup">Cerai Hidup</option>
                                            <option value="cerai mati">Cerai Mati</option><?
                                                    break;
                                                case 'belum nikah':
                                                    ?>
                                            <option value="">Pilih Status...</option>
                                            <option value="nikah">Nikah</option>
                                            <option selected="" value="belum nikah">Belum Nikah</option>
                                            <option value="cerai hidup">Cerai Hidup</option>
                                            <option value="cerai mati">Cerai Mati</option><?
                                                    break;
                                                case 'cerai hidup':
                                                    ?>
                                            <option value="">Pilih Status...</option>
                                            <option value="nikah">Nikah</option>
                                            <option value="belum nikah">Belum Nikah</option>
                                            <option selected="" value="cerai hidup">Cerai Hidup</option>
                                            <option value="cerai mati">Cerai Mati</option><?
                                                    break;
                                                case 'cerai mati':
                                                    ?><option value="">Pilih Status...</option>
                                            <option value="nikah">Nikah</option>
                                            <option value="belum nikah">Belum Nikah</option>
                                            <option value="cerai hidup">Cerai Hidup</option>
                                            <option selected="" value="cerai mati">Cerai Mati</option><?
                                                    break;
                                                default:
                                                    ?><option selected="" value="">Pilih Status...</option>
                                            <option value="nikah">Nikah</option>
                                            <option value="belum nikah">Belum Nikah</option>
                                            <option value="cerai hidup">Cerai Hidup</option>
                                            <option value="cerai mati">Cerai Mati</option><?
                                                    break;
                                            }?>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Klinik</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="klinik">
                                            <?
                                                switch ($p->klinik) {
                                                    case 'UMUM':
                                                        ?>
                                                        <option selected="" value="UMUM">UMUM</option>
                                                        <option value="KIA">KIA</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option value="KB">KB</option>
                                                        <option value="INC">INC</option>
                                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                    case 'KIA':
                                                        ?>
                                                        <option value="UMUM">UMUM</option>
                                                        <option selected="" value="KIA">KIA</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option value="KB">KB</option>
                                                        <option value="INC">INC</option>
                                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                    case 'ANAK':
                                                        ?>
                                                        <option value="UMUM">UMUM</option>
                                                        <option value="KIA">KIA</option>
                                                        <option selected="" value="ANAK">ANAK</option>
                                                        <option value="KB">KB</option>
                                                        <option value="INC">INC</option>
                                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                    case 'KB':
                                                        ?>
                                                        <option value="UMUM">UMUM</option>
                                                        <option value="KIA">KIA</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option selected="" value="KB">KB</option>
                                                        <option value="INC">INC</option>
                                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                    case 'INC':
                                                        ?>
                                                        <option value="UMUM">UMUM</option>
                                                        <option value="KIA">KIA</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option value="KB">KB</option>
                                                        <option selected="" value="INC">INC</option>
                                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                    case 'LABORATORIUM':
                                                        ?>
                                                        <option value="UMUM">UMUM</option>
                                                        <option value="KIA">KIA</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option value="KB">KB</option>
                                                        <option value="INC">INC</option>
                                                        <option selected="" value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                    default:
                                                        ?>
                                                        <option value="UMUM">UMUM</option>
                                                        <option value="KIA">KIA</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option value="KB">KB</option>
                                                        <option value="INC">INC</option>
                                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                                        <?
                                                        break;
                                                }
                                            ?>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Dokter</label>
                                    <div class="col-md-10">
                                        <select required="" class="form-control select2_category" name="dokter">
                                            <option>Pilih Dokter....</option>
                                            <?php
                                                foreach ($dokter as $r) {
                                                    $check = $r->dokter_name;
                                                    echo "<option $check == $dokterval ? : ''; value='$r->dokter_name'>$r->dokter_name</option>";
                                                }
                                            ?>
                                        </select>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="form_control_1">Keluhan</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="keluhan" rows="5"><? echo $p->keluhan ?></textarea>
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
               <? } ?>
            </div>
        </div>

    </div>            
</div>  
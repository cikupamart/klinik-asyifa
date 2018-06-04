<script language="JavaScript" type="text/JavaScript">
function HitungHargaKecil() {
    var myForm        = document.form1;
    var Kemasan       = myForm.sat_kemasan.value;
    var Kms           = Kemasan.toUpperCase();    
    var Kecil         = myForm.sat_kecil.value;
    var Kcl           = Kecil.toUpperCase();
    var Hrg_Kemasan   = parseInt(myForm.hrg_kemasan.value);
    var Isi           = parseInt(myForm.isi_sat_kecil.value);
    
    if (Kms == Kcl) {
        myForm.isi_sat_kecil.value = 1;
        myForm.hrg_kecil.value     = Hrg_Kemasan;        
    } else if (Kms != Kcl) {        
        myForm.hrg_kecil.value     = Hrg_Kemasan/Isi;
    }

    Hrg_Kecil         = parseInt(myForm.hrg_kecil.value);

    if (Kms === '' && Kcl === '' && Hrg_Kemasan === 0) {
        myForm.hrg_pokok.value     = 0;
    } else if (Kms != '' && Kcl === '' && Hrg_Kemasan === 0) {
        myForm.hrg_pokok.value     = 0;
    } else if (Kms != '' && Kcl === '' && Hrg_Kemasan != 0) {
        myForm.hrg_pokok.value     = Hrg_Kemasan;
    } else if (Kms != '' && Kcl != '') {
        myForm.hrg_pokok.value     = Hrg_Kecil;
    }
}
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#lstJenis").select2({
        });

        $("#lstGolongan").select2({
        });

        $("#lstPabrikan").select2({
        });

        $("#lstSuplier").select2({
        });
    });
</script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Master Data <small>Dokter</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-bar-chart"></i>
                    <a href="<?php echo site_url('dokter/home'); ?>">Dokter</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Master Data</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('apotek/obat'); ?>">Dokter</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Tambah Dokter</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
              <?php
               $dokter_name      = "";
               $dokter_city      = "";
               $dokter_phone     = "";
               $dokter_address   = "";
                if ($ed == "update") {
                 foreach ($sql->result() as $obj) {
                   $dokter_name     = $obj->dokter_name;
                   $dokter_city     = $obj->dokter_city;
                   $dokter_phone    = $obj->dokter_phone;
                   $dokter_address  = $obj->dokter_address; 
                 }
                 
            }

         ?>
            <div class="col-md-12">

                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-square"></i> Form Tambah Dokter
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('dokter/dokter/savedata'); ?>" method="post" enctype="multipart/form-data" name="form1">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label" for="form_control_1">Nama Dokter</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Enter Nama Dokter" name="dokter_name" value="<?php echo $dokter_name; ?>" autocomplete="off" required autofocus>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>                                    
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label" for="form_control_1">Kategori Dokter</label>
                                            <div class="col-md-9">
                                                <select class="select2_category form-control" data-placeholder="- Pilih Jenis Obat -" name="kategori_dokter" id="lstJenis" required>
                                                    <option value="">- Pilih Kategori Dokter -</option>
                                                    <?php foreach ($getDataKategori as $key): ?>
                                                    <option value="<?php echo $key->id_dokter_kategori ?>"><?php echo $key->kategori_dokter ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>                      
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    
                                    
                                </div>                                
                                <h4 class="form-section">Kontak Dokter</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-4 control-label" for="form_control_1">Nomor Telp.</label>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" placeholder="Enter Nomor Telp" name="dokter_phone" id="dokter_phone" value="<?php echo $dokter_phone; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Harus DIISI.</span>
                                            </div>
                                        </div>                                    
                                    </div>                                    
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-4 control-label" for="form_control_1">Alamat dokter</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Enter Alamat Dokter" name="dokter_address" id="dokter_address" value="<?php echo $dokter_address; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Harus DIISI.</span>
                                            </div>
                                        </div>
                                    </div>    
                                        <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-4 control-label" for="form_control_1">Kota/Kab.</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Enter Kota/Kab. Dokter" name="dokter_city" id="dokter_city" value="<?php echo $dokter_address; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Harus DIISI.</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan</button>
                                        <a href="<?php echo site_url('apotek/obat'); ?>" class="btn yellow"><i class="fa fa-times"></i> Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>            
</div>  
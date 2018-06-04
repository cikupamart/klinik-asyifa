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
            Master Data <small>Clinic</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-bar-chart"></i>
                    <a href="<?php echo site_url('dokter/home'); ?>">Clinic</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Master Data</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('apotek/obat'); ?>">Clinic</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Tambah Clinic</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
              <?php
               $klinik      = "";
                if ($ed == "update") {
                 foreach ($sql->result() as $obj) {
                   $klinik     = $obj->klinik; 
                 }
                 
            }

         ?>
            <div class="col-md-12">

                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-square"></i> Form Tambah Clinik
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('clinic/clinic/savedata'); ?>" method="post" enctype="multipart/form-data" name="form1">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label" for="form_control_1">Nama Clinic</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Enter Clinic Name" name="klinik" value="<?php echo $klinik; ?>" autocomplete="off" required autofocus>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>                                    
                                    </div>                                    
                                </div>
                                
                                <div class="row">
                                    
                                    
                                </div>           
                                
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan</button>
                                        <a href="<?php echo site_url('clinik/clinic'); ?>" class="btn yellow"><i class="fa fa-times"></i> Batal</a>
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
<style type="text/css">
    small{
        font-size: 12px;
    }

    h3 {
   width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 20px; 
} 

h3 span { 
    background:#fff; 
    padding:0 10px; 
}

.custom-control-label::before, 
.custom-control-label::after {
    top: .2rem;
    width: 1.55rem;
    height: 1.55rem;
}
    
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title"> <i class="fa fa-plus"></i> Tambah Ploting Coaching</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="<?=base_url('admin/ploting_table')?>" class="btn btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <form action="<?=base_url('admin/ploting_table/simpan')?>" method="post">
                    <div class="block mt-4">
                        <div class="row">
                                <div class="col-md-12 mb-2">
                                    <h3><span>COACH</span></h3>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                <select id="select_coach" name="id_coach" class="select2 form-control" onchange="get_value(this)" >
                                <option value="" data-nip="" data-nuptk="" data-kab="" data-instansi="">Klik untuk pilih Coach</option>
                                    <?php 
                                    foreach ($coach as $key => $value) { ?>
                                    <option value="<?=encode_id($value->id)?>" data-nip="<?=$value->nip?>" data-nuptk="<?=$value->nuptk?>" data-kab="<?=$value->kab??'-'?>" data-instansi="<?=$value->instansi??'-'?>"><?=$value->nama?></option>
                                    <?php }
                                    ?>
                                </select>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td style="width: 10%;">NUPTK</td>
                                                <td style="width: 1%;">:</td>
                                                <td id="nuptk_coach">-</td>
                                            </tr>
                                            <tr>
                                                <td>NIP</td>
                                                <td>:</td>
                                                <td id="nip_coach">-</td>
                                            </tr>
                                            <tr>
                                                <td>Instansi</td>
                                                <td>:</td>
                                                <td id="instansi_coach">-</td>
                                            </tr>
                                            <tr>
                                                <td>Kab/Kota</td>
                                                <td>:</td>
                                                <td id="kab_coach">-</td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block mt-4">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <h3><span>GURU</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Instansi</th>
                                                <th>Kab/Kota</th>
                                                <th>Pilih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($guru as $key => $value) { ?>
                                                <tr>
                                                    <td><?=$no?></td>
                                                    <td><?=$value->nama?></td>
                                                    <td><?=$value->instansi?></td>
                                                    <td><?=$value->kab.' | '.$value->prov?></td>
                                                    <td>
                                                    <div class="custom-control custom-checkbox custom-checkbox-primary custom-checkbox-lg mb-3" style="">
                                                                <input name="id_guru[]" type="checkbox" value="<?=encode_id($value->id)?>" class="custom-control-input" id="cek<?=$value->id?>" >
                                                                <label class="custom-control-label" for="cek<?=$value->id?>"></label>
                                                            </div>
                                                    </td>
                                                </tr>
                                            <?php 
                                        $no++;
                                        } ?>
                                        </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg pull-right" type="submit"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function get_value(f){
        var nuptk_coach = $(f).find(':selected').data('nuptk');
        var nip_coach = $(f).find(':selected').data('nip');
        var kab_coach = $(f).find(':selected').data('kab');
        var instansi_coach = $(f).find(':selected').data('instansi');
        $('#nuptk_coach').text(nuptk_coach);
        $('#nip_coach').text(nip_coach);
        $('#kab_coach').text(kab_coach);
        $('#instansi_coach').text(instansi_coach);
    }
    function getStorage(key_prefix) {
    // this function will return us an object with a "set" and "get" method
    // using either localStorage if available, or defaulting to document.cookie
    if (window.localStorage) {
        // use localStorage:
        return {
            set: function(id, data) {
                localStorage.setItem(key_prefix+id, data);
            },
            get: function(id) {
                return localStorage.getItem(key_prefix+id);
            }
        };
    } else {
        // use document.cookie:
        return {
            set: function(id, data) {
                document.cookie = key_prefix+id+'='+encodeURIComponent(data);
            },
            get: function(id, data) {
                var cookies = document.cookie, parsed = {};
                cookies.replace(/([^=]+)=([^;]*);?\s*/g, function(whole, key, value) {
                    parsed[key] = unescape(value);
                });
                return parsed[key_prefix+id];
            }
        };
    }
}

$(function($) {
    // a key must is used for the cookie/storage
    var storedData = getStorage('com_mysite_checkboxes_'); 
    
    $('input:checkbox').bind('change',function(){
        $('#'+this.id+'txt').toggle($(this).is(':checked'));
        // save the data on change
        storedData.set(this.id, $(this).is(':checked')?'checked':'not');
    }).each(function() {
        // on load, set the value to what we read from storage:
        var val = storedData.get(this.id);
        if (val == 'checked') $(this).attr('checked', 'checked');
        if (val == 'not') $(this).removeAttr('checked');
        if (val) $(this).trigger('change');
    });
    
});
</script>
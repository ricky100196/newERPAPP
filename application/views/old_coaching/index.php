<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style type="text/css">
.content-desktop {
    display: unset;
}

.active-ya {
    color: #fff;
    background-color: #34c38f;
    border-color: #34c38f;
}

.active-tidak {
    color: #fff;
    background-color: #f46a6a;
    border-color: #f46a6a;
}

.content-mobile {
    display: none;
}

@media screen and (max-width: 768px) {
    .content-desktop {
        display: none;
    }

    .content-mobile {
        display: block;
    }
}

.progress {
    width: 10rem;
}

/* Mimic table appearance */
div.table-dropzone {
    width: 100% !important;
    display: table;
}

div.table-dropzone .file-row {
    display: table-row;
}

div.table-dropzone .file-row>div {
    display: table-cell;
    vertical-align: top;
    border-top: 1px solid #ddd;
    padding: 8px;
}

div.table-dropzone .file-row:nth-child(odd) {
    background: #f9f9f9;
}

/* The total progress gets shown by event listeners */
#total-progress {
    opacity: 0;
    transition: opacity 0.3s linear;
}

/* Hide the progress bar when finished */
#previews .file-row.dz-success .progress {
    opacity: 0;
    transition: opacity 0.3s linear;
}

/* Hide the delete button initially */
#previews .file-row .delete {
    display: none;
}

/* Hide the start and cancel buttons and show the delete button */

#previews .file-row.dz-success .start,
#previews .file-row.dz-success .cancel {
    display: none;
}

#previews .file-row.dz-success .delete {
    display: block;
}
</style>


<style>
.circle-image img {

    border: 6px solid #fff;
    border-radius: 100%;
    padding: 0px;
    top: -28px;
    position: relative;
    width: 70px;
    height: 70px;
    border-radius: 100%;
    z-index: 1;
    background: #e7d184;
    cursor: pointer;

}


.dot {
    height: 18px;
    width: 18px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    border: 3px solid #fff;
    top: -48px;
    left: 186px;
    z-index: 1000;
}

.name {
    margin-top: -21px;
    font-size: 18px;
}


.fw-500 {
    font-weight: 500 !important;
}


.start {

    color: green;
}

.stop {
    color: red;
}


.rate {

    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;

}



.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}


.buttons {
    top: 36px;
    position: relative;
}


.rating-submit {
    border-radius: 15px;
    color: #fff;
    height: 49px;
}


.rating-submit:hover {

    color: #fff;
}
</style>

<div class="row m-auto">
    <div class="card">
        <div class="card-body">
            <table width="100%">
                <tr>
                    <td class="text-center">
                        <ul class="list-inline user-chat-nav text-right mb-0">
                            <li class="list-inline-item d-none d-sm-inline-block">
                                
                            </li>
                        </ul>
                        <img style="margin-right: 15px;" src='<?= base_url('images/custom/logo_kemdikbud.png') ?>'
                            width="90" />
                        <table style="margin-top:1%;font-size: 9pt;text-align:center;" width="100%">
                            <tr>
                                <td>
                                    <font style="font-size: 20px;"><strong>COACHING MERDEKA BELAJAR </strong></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <font style="font-size: 17px;">BALAI BESAR GURU PENGGERAK KALIMANTAN SELATAN
                                        </font>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <font style="font-size: 17px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN
                                            TEKNOLOGI</font>
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div class="row">
                <div class="col-md-12 text-center">
                <a href="<?= base_url('coaching') ?>" class="btn btn-danger" type="button">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>

                    <a href="<?=@$coach->no_hp? 'https://wa.me/62'.((int)$coach->no_hp) : '#' ?>" onclick="get_time_call('<?=$instrumen->id?>','coach')" target="_blank" class="btn btn-info"> <i class="fa fa-phone"></i> Hubungi Coach
                    (<?=@$coach->no_hp??"Nomor belum ada, Hubungi panitia"?>)
                </a>
                <?php if ($this->type == 'supervisor') { ?>
                    <a href="<?=@$guru->no_hp? 'https://wa.me/62'.((int)$guru->no_hp) : '#' ?>" onclick="get_time_call('<?=$instrumen->id?>','guru')" target="_blank" class="btn btn-success"> <i class="fa fa-phone"></i> Hubungi Peserta
                    (<?=@$guru->no_hp??"Nomor belum ada, Hubungi panitia"?>)
                </a>
                <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 h4 text-center mb-3 mt-1">
                    <hr style="border-top: 2px solid #2a3042;">
                    <b>IDENTITAS PESERTA <span class="color: #53BDEB"><?= ($guru->program=='psp'?'PROGRAM SEKOLAH PENGGERAK':($guru->program=='pgp'?'PROGRAM GURU PENGGERAK':($guru->program=='ikm'?'IMPLEMENTASI KURIKULUM MERDEKA':''))) ?></span></b>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" disabled class="form-control" value="<?= @$guru->nama ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" disabled class="form-control" value="<?= @$guru->instansi ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kabupaten</label>
                        <input name="" id="" disabled class="form-control" value="<?= @$guru->nama_kab ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input name="" id="" disabled class="form-control" value="<?= @$guru->nama_prov ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" disabled class="form-control" value="<?= @$guru->no_hp ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" disabled class="form-control" value="<?= @$guru->email ?>">
                    </div>
                </div>
            </div>


            <?php if (@$coach) { ?>
            <div class="row">
                <div class="col-md-12 h4 text-center mb-3 mt-1">
                    <hr style="border-top: 2px solid #2a3042;">
                    <b>IDENTITAS COACH SEKOLAH MERDEKA</b>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" disabled class="form-control" value="<?= @$coach->nama ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" disabled class="form-control" value="<?= @$coach->instansi ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kabupaten</label>
                        <input name="" id="" disabled class="form-control" value="<?= @$coach->nama_kab ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input name="" id="" disabled class="form-control" value="<?= @$coach->nama_prov ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" disabled class="form-control" value="<?= @$coach->no_hp ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" disabled class="form-control" value="<?= @$coach->email ?>">
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="alert alert-success text-center m-5" role="alert">
                        <h3>Coach Belum Terplotting. Silahkan Pilih Coach Dibawah Ini</h3>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-12 h4" style="margin-bottom: 20px; text-align:center;">
                    <hr style="border-top: 2px solid #2a3042;">
                    <b>Hasil Pengisian Instrumen Oleh Guru</b>
                </div>
                <div class="col-md-12 table-responsive">
                    <div id="accordion">
                        <!-- <?php foreach ($soal as $key => $value) { ?>
                        <div class="card mb-1 shadow-none">
                            <div class="card-header" id="headingOne">
                                <h5 class="m-0">
                                    <a href="#collapse<?= $value->no ?>" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                        <?= $value->no.'. '. str_replace('_replace_',$program->program,$value->soal) ?>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse<?= $value->no ?>" class="collapse"
                                    aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div><?= (@$value->jawaban) ? $value->jawaban : '<b>Tidak Ada Jawaban</b>' ?></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?> -->

                        <div class="card mb-1 shadow-none">
                            <div class="card-header" id="headingOne">
                                <h5 class="m-0">
                                    <a href="#collapse0" class="text-dark" data-toggle="collapse" aria-expanded="true"
                                        aria-controls="collapseNol">
                                        <i class="far fa-hand-point-down"></i> Program Yang Diikuti
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse0" class="collapse" aria-labelledby="headingNol" data-parent="#accordion">
                                <div class="card-body">
                                    <div>
                                        <h4><b><?= ($guru->program=='psp'?'PROGRAM SEKOLAH PENGGERAK':($guru->program=='pgp'?'PROGRAM GURU PENGGERAK':($guru->program=='ikm'?'IMPLEMENTASI KURIKULUM MERDEKA':''))) ?></b></h4>
                                        <h5>Layanan <?= $instrumen->program ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-1 shadow-none">
                            <div class="card-header" id="headingOne">
                                <h5 class="m-0">
                                    <a href="#collapse1" class="text-dark" data-toggle="collapse" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <i class="far fa-hand-point-down"></i> Tujuan coaching ingin menyampaikan produk
                                        atau diskusi menyampaikan masalah
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div>
                                        <b><?= (@$jawaban['2']=='produk') ? 'Menyampaikan Produk' : (@$jawaban['2']=='masalah' ? 'Diskusi Masalah':'<h5>Tidak Ada Jawaban</h5>') ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-1 shadow-none">
                            <div class="card-header" id="headingTwo">
                                <h5 class="m-0">
                                    <a href="#collapse2" class="text-dark" data-toggle="collapse" aria-expanded="true"
                                        aria-controls="collapseTwo">
                                        <i class="far fa-hand-point-down"></i> Hal yang ingin disampaikan
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div><?= (@$jawaban['3']) ? $jawaban['3'] : '<h5>Tidak Ada Jawaban</h5>' ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-1 shadow-none">
                            <div class="card-header" id="headingThree">
                                <h5 class="m-0">
                                    <a href="#collapse3" class="text-dark" data-toggle="collapse" aria-expanded="true"
                                        aria-controls="collapseThree">
                                        <i class="far fa-hand-point-down"></i> Masukkan hal-hal penting terkait
                                        <?= (@$jawaban['2']=='produk') ? 'produk' : (@$jawaban['2']=='masalah' ? 'yang harus dibahas/dipertanyakan' : '') ?>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse3" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div><?= (@$jawaban['4']) ? $jawaban['4'] : '<h5>Tidak Ada Jawaban</h5>' ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Dokumen Pendukung</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table-dropzone table-hover table-bordered table-striped" style=""
                                        id="previews">
                                        <?php foreach ($file_pendukung as $key => $row_file) { ?>
                                        <div class="file-row dz-processing dz-success dz-complete"
                                            id="el<?= encode_id($row_file->id) ?>">
                                            <a target="_blank"
                                                href="<?= base_url('uploads/instrumen/' . $row_file->id_instrumen . "/" . $row_file->nama_file) ?>">
                                                <div>
                                                    <p class="name" data-dz-name="">
                                                        <?= str_replace("_", " ", $row_file->orig_name) ?></p>
                                                    <strong class="error text-danger" data-dz-errormessage=""></strong>
                                                </div>
                                            </a>
                                            <div>
                                                <p class="size" data-dz-size="">
                                                    <strong><?= $row_file->file_size ?></strong> KB
                                                </p>
                                            </div>
                                            <div>
                                                <a href="<?= base_url('uploads/instrumen/' . $row_file->id_instrumen . "/" . $row_file->nama_file) ?>"
                                                    class="btn btn-block mb-2 btn-info"
                                                    download='<?=$row_file->orig_name?>'> <i class="fas fa-eye"></i>
                                                    <span>Download</span> </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($instrumen->kunci=='1' && $instrumen->id_coach!=null) { ?>
<div class="d-lg-flex">
    <div class="w-100 user-chat">
        <div class="card">
            <div class="p-4 border-bottom ">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h2 class="font-size-20 mb-1">Forum Coaching / Komentar</h2>
                        <h5 class="font-size-15 mb-1"><b>Pengarah :
                                <?= ucwords($coach->nama).' - '.ucwords($coach->instansi) ?></b></h5>
                        <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i> Active
                            now</p>
                    </div>
                    <div class="col-md-4 col-3">
                        <ul class="list-inline user-chat-nav text-right mb-0">
                            <li class="list-inline-item d-none d-sm-inline-block">
                                <a href="<?= base_url('coaching') ?>" class="btn btn-sm btn-danger" type="button">
                                    <i class="bx bx-arrow-back"></i> Kembali
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div>
                <div class="chat-conversation p-3">
                    <ul class="list-unstyled mb-0" data-simplebar style="max-height: 486px;">
                        <?php if (count($chat_request)==0) { ?>
                        <li>
                            <div class="chat-day-title">
                                <span class="title"><b>Belum Ada Komentar</b></span>
                            </div>
                        </li>
                        <?php } else { ?>

                        <?php $tgl=null; foreach ($chat_request as $chat) { ?>

                        <?php if ($tgl!=date('Y-m-d', strtotime($chat['created_at']))) { $tgl=date('Y-m-d', strtotime($chat['created_at'])); ?>
                        <li>
                            <div class="chat-day-title">
                                <?php if ($tgl==date('Y-m-d')) { ?>
                                <span class="title"><b>Today</b></span>
                                <?php } else { ?>
                                <span class="title"><b><?= tgl_indo($tgl) ?></b></span>
                                <?php } ?>
                            </div>
                        </li>
                        <?php } ?>

                        <li <?= ((($chat['id_pengirim']==decode_id($this->id) && in_array($this->type, ['guru','coach'])) || ($chat['id_pengirim']==$instrumen->id_guru && !in_array($this->type, ['guru','coach']))) ? 'class="right"':'') ?>>
                            <div class="conversation-list col-md-10 col-xs-12">
                                <?php if ($chat['id_pengirim']==decode_id($this->id)) { ?>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:;"
                                            onclick="deleted_chat('<?= encode_id($chat['id']) ?>', '<?= encode_id($chat['id_instrumen']) ?>')">Delete</a>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="ctext-wrap">
                                    <div class="conversation-name"><?= $chat['nama_pengirim'] ?></div>
                                    <p>
                                        <?= $chat['chat'] ?>
                                    </p>
                                    <?php if ($chat['attachment_file']!=null) { ?>
                                    <div>
                                        <a href="<?= base_url('uploads/chat_attachment/'.$chat['id_instrumen'].'/'.$chat['attachment_file']) ?>"
                                            target="_blank"><i class="bx bx-receipt align-middle mr-1"></i> Lihat
                                            lampiran file</a>
                                    </div>
                                    <?php } ?>
                                    <p class="chat-time mb-0"><i class="bx bx-time-five align-middle mr-1"></i>
                                        <?= date('H:i:s', strtotime($chat['created_at'])) ?></p>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>

                <?php if ( $instrumen->selesai!='1' && in_array($this->type, ['coach', 'guru']) ) { ?>
                <form action="<?= base_url('coaching/send_chat/'.$instrumen_id) ?>" enctype="multipart/form-data"
                    method="POST">
                    <div class="p-3 chat-input-section">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <div class="form-group">
                                        <textarea class="form-control chat-input" name="chat"
                                            placeholder="Masukkan Komentar Anda Disini..." rows="4"></textarea>
                                    </div>
                                    <div class="custom-file mb-3 col-md-5 col-xs-12">
                                        <input type="file" name="attachment_file" class="custom-file-input"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload File *jika ada</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span class="d-sm-inline-block mr-2">Kirim</span> <i class="mdi mdi-send"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?>

                
                <?php if ($instrumen->rating == NULL) { ?>
                    <?php if ($instrumen->selesai=='1') { ?>
                        <?php if ($this->type=='guru') { ?>
                        <div class="row">
                            <div class="col-md-12 mb-5 text-center">
                                <div class="alert alert-success text-center m-5" role="alert">
                                    <h3>
                                    Terimakasih telah mengikuti coaching, selanjutnya anda dapat memberi rating dengan klik tombol dibawah ini.
                                    </h3>
                                
                                    <a href="javascript:;" class="btn btn-info btn_rating" data-toggle="modal"
                                    data-target="#modal-popout-rating"> <label style="font-size:20px;" for="3">☆</label> Beri Rating</a>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="row">
                            <div class="col-md-12 mb-5 text-center">
                                <div class="alert alert-success text-center m-5" role="alert">
                                    <h3>
                                    Peserta Telah Menyelesaikan Proses Coaching. <br> Peserta Belum Memberikan Rating dan Ulasan
                                    </h3>
                                
                                    <a href="javascript:;" class="btn btn-info btn_rating" data-toggle="modal"
                                    data-target="#modal-popout-rating"> <label style="font-size:20px;" for="3">☆</label> Beri Rating</a>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    <?php } ?>
                <?php } else { ?>
                    <?php if ($this->type!='coach') { ?>
                        <div class="row">
                            <div class="col-md-12 mb-5 text-center">
                                <div class="alert alert-success text-center m-5" role="alert">
                                    <h3>
                                    <?php if ($this->type=='guru') { ?>
                                    Terimakasih telah mengikuti coaching, <br>Anda telah memberikan rating kepada coach
                                    <?php } else {?>
                                    Peserta Telah Menyelesaikan Proses Coaching dan Memberikan Rating.
                                    <?php } ?>
                                    </h3>

                                    <div class="row">
                                        <div class="col-md-12">
                                                
                                            <div class="rating"> 
                                                    <input type="radio" name="rating" value="5" id="5" <?= ($instrumen->rating<=5)?'checked':'' ?> disabled><label style="font-size:40px;" for="5">☆</label> 
                                                    <input type="radio" name="rating" value="4" id="4" <?= ($instrumen->rating<=4)?'checked':'' ?> disabled><label style="font-size:40px;" for="4">☆</label> 
                                                    <input type="radio" name="rating" value="3" id="3" <?= ($instrumen->rating<=3)?'checked':'' ?> disabled><label style="font-size:40px;" for="3">☆</label> 
                                                    <input type="radio" name="rating" value="2" id="2" <?= ($instrumen->rating<=2)?'checked':'' ?> disabled><label style="font-size:40px;" for="2">☆</label> 
                                                    <input type="radio" name="rating" value="1" id="1" <?= ($instrumen->rating<=1)?'checked':'' ?> disabled><label style="font-size:40px;" for="1">☆</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 h5 text-center">
                                            Ulasan
                                        </div>
                                        <div class="col-12 mb-3">
                                            <textarea name="ulasan_peserta" class="form-control" cols="30" rows="10" disabled> <?= $instrumen->ulasan_peserta ?></textarea>
                                        </div>
                                    </div>
                                
                                    
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-12 mb-5 text-center">
                                <div class="alert alert-success text-center m-5" role="alert">
                                    <h3>
                                    Peserta Telah Menyelesaikan Proses Coaching. 
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                <?php }?>

            </div>
        </div>
    </div>
</div>

<?php if ($this->type=='guru') { ?>

<?php if ($instrumen->selesai=='1') { ?>

<?php if ($instrumen->rating==null) { ?>
<div class="modal fade" id="modal-popout-rating" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div id="content_modal">
                <div class="block">
                    <div class="block-content">
                        <form method="POST" autocomplete="off" action="<?= base_url('coaching/submit_rating/'.$instrumen->id) ?>">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title mt-0 text-white" id="myModalLabel">Beri Rating</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-5">
                                <div class="form-group box border row">
                                    <div class="col-md-12 h5 text-center mb-3">
                                        Profil Coach
                                    </div>
                                    <div class="col-md-12 text-center mb-3">
                                        <img src="<?=base_url($coach->foto_path)?>" height="150" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <Table class="table">
                                            <tr>
                                                <td>Nama</td>
                                                <td style="width:1%;">:</td>
                                                <td><?=$coach->nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Instansi</td>
                                                <td>:</td>
                                                <td><?=$coach->instansi?></td>
                                            </tr>
                                            <tr>
                                                <td>Kab/Kota</td>
                                                <td>:</td>
                                                <td><?=$coach->kab?></td>
                                            </tr>
                                        </Table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 h5 text-center">
                                        Rating
                                    </div>
                                    <div class="col-md-12">
                                            
                                        <div class="rating"> 
                                                <input type="radio" name="rating" value="5" id="5"><label style="font-size:40px;" for="5">☆</label> 
                                                <input type="radio" name="rating" value="4" id="4"><label style="font-size:40px;" for="4">☆</label> 
                                                <input type="radio" name="rating" value="3" id="3"><label style="font-size:40px;" for="3">☆</label> 
                                                <input type="radio" name="rating" value="2" id="2"><label style="font-size:40px;" for="2">☆</label> 
                                                <input type="radio" name="rating" value="1" id="1"><label style="font-size:40px;" for="1">☆</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 h5 text-center">
                                        Ulasan
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="ulasan_peserta" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 mb-3 text-center">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-telegram"></i> Simpan</button>
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
<?php } ?>

<?php } else { ?>
<div class="d-lg-flex">
    <div class="w-100 user-chat">
        <div class="card">
            <div class="p-4 border-bottom ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger text-center" role="alert">
                            <form action="<?= base_url('coaching/done_chat/'.$instrumen_id) ?>" method="post">
                                <div class="form-group">
                                <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1" name="checklist_chat" required>
                                                        <label class="custom-control-label" for="customCheck1">Proses Coaching Telah Selesai Dan
                                            Saya Telah Memahami Substansi</label>
                                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5 class="text-danger">Anda Tidak Dapat Membuka Form Coaching Jika Sudah Klik
                                        Selesai Dibawah ini</h5>
                                </div>

                                <button type="submit" onclick="cek_done()"
                                    class="btn btn-danger md-sm btn-rounded chat-send w-md waves-effect waves-light"><span
                                        class="d-sm-inline-block mr-2">Selesai</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>

<?php } ?>

<!-- end row -->
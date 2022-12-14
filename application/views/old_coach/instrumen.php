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
<div class="row m-auto">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <!-- <td width="25%" style="text-align: right;"><img style="margin-right: 15px;" src='https://appt.demoo.id/kemenpar_bip/public/assets-front/img/custom/kemenparekraf.png' width="90" /></td> -->
                        <td class="text-center">
                            <img style="margin-right: 15px;" src='<?= base_url('images/custom/logo_kemdikbud.png') ?>'
                                width="90" />
                            <table style="margin-top:1%;font-size: 9pt;text-align:center;" width="100%">
                                <tr>
                                    <td>
                                        <font style="font-size: 20px;"><strong>
                                                INSTRUMEN <i>COACHING</i> MERDEKA BELAJAR </strong></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <font style="font-size: 14px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET,
                                                DAN TEKNOLOGI 
                                            </font>
                                        </strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>


                <div class="row">
                    <div class="col-md-12 h4 text-center mb-3 mt-1">
                        <hr style="border-top: 2px solid #2a3042;">
                        IDENTITAS
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
                <div class="row">
                    <div class="col-md-12 h4" style="margin-bottom: 20px; text-align:center;">
                        <hr style="border-top: 2px solid #2a3042;">
                        Isian Instrumen 
                    </div>

                    <div class="col-md-12">
                        <div class="alert alert-success">
                        Isikan jawaban instrumen berikut sesuai kondisi yang sebenarnya
                        </div>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" style="vertical-align : middle;">No</th>
                                    <th  style="vertical-align : middle;">Pertanyaan</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($soal as $key => $value) { ?>
                                    <tr class="text-left">
                                        <td><?=$value->no?></td>
                                        <td colspan="2">
                                        <p><h6><?=$value->soal?></h6> </p>
                                            <h5>Jawab : </h5> <br>
                                            <textarea onchange="jawab('<?=encode_id($value->id_soal)?>',this.value)" value="" cols="30" rows="10" class="form-control"><?=$value->jawaban?></textarea>
                                            <?php if ($value->no == '4') { ?>
                                                <div class="col-md-12 table-responsive">    

                        <table class="table table-striped table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        Unggah Dokumen Pendukung
                                        <br>
                                        <br>
                                        <div id="actions" class="row">
                                            <div class="col-md-7">
                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                <span class="btn btn-success mb-2 fileinput-button">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <span>Add files...</span>
                                                </span>

                                                <span class="fileupload-process">
                                                    <div id="total-progress" class="progress active" aria-valuemin="0"
                                                        aria-valuemax="100" aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-success"
                                                            role="progressbar" style="width: 0%" data-dz-uploadprogress>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-dropzone table-hover table-bordered table-striped"
                                            style="display: none;" class="files" id="previews">

                                            <div id="template" class="file-row">
                                                <!-- This is used as the file preview template -->
                                                <div>
                                                    <span class="preview"><img data-dz-thumbnail /></span>
                                                </div>

                                                <div>
                                                    <p class="name" data-dz-name></p>
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                                <div>
                                                    <p class="size" data-dz-size></p>
                                                    <div class="progress progress-striped active" role="progressbar"
                                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn mb-2 btn-primary start">
                                                        <i class="fas fa-upload "></i>
                                                        <span>Start</span>
                                                    </button>

                                                    <button data-dz-remove class="btn mb-2 btn-warning cancel">
                                                        <i class="fas fa-backspace "></i>
                                                        <span>Cancel</span>
                                                    </button>

                                                    <button data-dz-remove class="btn mb-2 btn-danger delete">
                                                        <i class="fas fa-trash"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="table-dropzone table-hover table-bordered table-striped" style=""
                                            id="previews">
                                            <?php foreach ($value->file as $key => $row_file) { ?>
                                            <div class="file-row dz-processing dz-success dz-complete"
                                                id="el<?= encode_id($row_file->id) ?>">
                                                <!-- This is used as the file preview template -->

                                                <a target="_blank"
                                                    href="<?= base_url('uploads/instrumen/' . $row_file->id_instrumen . "/" . $row_file->nama_file) ?>">
                                                    <div> <span class="preview"><img data-dz-thumbnail=""
                                                                src="https://ministry.phicos.co.id/coaching_bbgp/images/custom/pdf.png"
                                                                style="width: 90px;"></span> </div>
                                                    <div>
                                                        <p class="name" data-dz-name=""><?= $row_file->orig_name ?></p>
                                                        <strong class="error text-danger"
                                                            data-dz-errormessage=""></strong>
                                                    </div>
                                                </a>
                                                <div>
                                                    <p class="size" data-dz-size="">
                                                        <strong><?= $row_file->file_size ?></strong> KB
                                                    </p>
                                                    <div class="progress progress-striped active" role="progressbar"
                                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success"
                                                            style="width: 100%;" data-dz-uploadprogress=""></div>
                                                    </div>
                                                </div>
                                                <div> <button class="btn mb-2 btn-primary start" disabled="disabled"> <i
                                                            class="fas fa-upload "></i>
                                                        <span>Start</span> </button> <button data-dz-remove=""
                                                        class="btn mb-2 btn-warning cancel"> <i
                                                            class="fas fa-backspace "></i> <span>Cancel</span>
                                                    </button>
                                                    <button data-dz-remove="" class="btn mb-2 btn-danger delete"
                                                        onclick="delete_upload('<?= encode_id($row_file->id) ?>')"> <i
                                                            class="fas fa-trash"></i> <span>Delete</span> </button>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 40px;">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-primary btn-lg" onclick="simpan_submit()">
                            <i class="fas fa-check-circle"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
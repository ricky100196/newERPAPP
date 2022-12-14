<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (!empty($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>
                <?= validation_errors() ?>
                <form action="<?= site_url('admin/beranda/do_update') ?>" method="post" id="form-edit" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= encode_id($data->id) ?>">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="form-group">
                            <label for="content">Deskripsi<span class="text-danger">*</span></label>
                            <textarea name="deskripsi"class="form-control" id="content" cols="30" rows="10"><?= $data->deskripsi ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="thumbnail">Gambar Beranda <span class="text-danger">*</span></label>
                            <?php if($data->img_url !== null){?>
                                <img class="w-auto img-fluid rounded-3" src="<?= base_url($data->img_url) ?>?>" id="blah" alt="img-hero-bgp" />
                            <?php }else{ ?>
                                <img class="w-auto img-fluid rounded-3" src="#" id="blah" alt="img-hero-bgp" />
                                <?php }?>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="image" id="file-image" onchange="readURL(this);" accept="image/*">
                                <label class="custom-file-label" for="file-image">Pilih File</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
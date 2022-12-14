<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <a href="<?= site_url('admin/beranda/index') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <?php if (!empty($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>
                <?= validation_errors() ?>
                <form action="<?= site_url('admin/beranda/do_insert') ?>" method="post" id="form-berita" enctype="multipart/form-data">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="form-group">
                            <label for="content">Deskripsi<span class="text-danger">*</span></label>
                            <textarea name="deskripsi" id="content" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="thumbnail">Gambar Beranda <span class="text-danger">*</span></label>
                            <img class="w-auto img-fluid rounded-3" src="#" id="blah" alt="img-hero-bgp" />
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
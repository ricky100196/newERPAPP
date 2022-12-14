<style type="text/css">
    @media screen and (max-width: 600px) {}
</style>
<link href="https://ministry.phicos.co.id/coaching_bbgp/assets-tambah/css/dashboard.css" rel="stylesheet" type="text/css" />
<div class="dasbor-utama">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://ministry.phicos.co.id/coaching_bbgp/">Beranda</a></li>
                        <li class="breadcrumb-item active">Dasbor <span class="d-md-inline d-none ml-md-1">Instrumen</span></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <!-- Data Instrumen Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-primary" role="alert">
                        <h2 class="text-center text-primary">Selamat Datang di Program Coaching Merdeka Belajar
                            <br>
                            Anda telah masuk sebagai <?=ucfirst($this->type)=='Guru'?'Peserta':ucfirst($this->type)?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" class="myEdit" href="#myModal">Edit Profile</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel">
                        <div class="panel-body bio-graph-info">
                            <h1>Profile</h1>
                            <!-- <a data-target="#myModal" data-toggle="modal" class="myEdit" id="MainNavHelp" href="#myModal"><i class="fa fa-pencil"></i></a> -->
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Nama </span>: <?= $profile->nama ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>No HP </span>: <?= $profile->no_hp ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>NIK </span>: <?= $profile->nik ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>NIP </span>: <?= $profile->nip ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Jenis Kelamin </span>:<?= $profile->jk ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Tanggal Lahir </span>: <?= $profile->tgl_lahir ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>alamat </span>: <?= $profile->alamat ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Jabatan</span>: <?= $profile->jabatan ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>instansi </span>: <?= $profile->instansi ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span>: <?= $profile->email ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <a href="<?= base_url('coaching') ?>">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium mb-1">Klik disini untuk melihat instrumen guru</p>
                                        <h5 class="mb-0"></h5>
                                    </div>

                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                        <span class="avatar-title bg-danger">
                                            <i class="bx bx-book font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Instrumen End -->
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-upload-formulirLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('coach/edit/' . $menu_id) ?>" method="post" class="" id="form-edit-profile">
                    <input type="hidden" value="<?= $profile->id ?>" class="form-control" name="id" id="id">


                    <div class="form-group col-md-12 col-md-6">
                        <label for="thumbnail">Gambar Profile <span class="text-danger">*</span></label>
                        <?php if ($profile->foto_path !== null) { ?>
                            <img class="w-auto img-fluid rounded-3" src="<?= base_url($profile->foto_path) ?>?>" id="blah" alt="img-hero-bgp" />
                        <?php } else { ?>
                            <img class="w-auto img-fluid rounded-3" src="#" id="blah" />
                        <?php } ?>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="image" id="file-image" onchange="readURL(this);" accept="image/*" />
                            <label class="custom-file-label" for="file-image">Pilih File</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach ($provinsi as $row) : ?>
                                <option <?php if ($profile->kode_prov == $row->kode_wilayah) {
                                            echo "selected";
                                        } ?> value="<?php echo $row->kode_wilayah; ?>"><?php echo $row->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="kota">Kota/Kabupaten</label>
                        <select name="kota" id="kota" class="kota form-control">
                            <option value="0">-PILIH-</option>
                            <?php
                            if ($profile->kab != null) {
                            ?>
                                <option value="<?= $profile->kode_kab ?>" selected><?= $profile->kab ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" value="<?= $profile->jabatan ?>" class="form-control" name="jabatan" required id="jabatan" placeholder="Masukan jabatan">

                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" value="<?= $profile->tgl_lahir ?>" class="form-control" name="tgl_lahir" required id="tgl_lahir" placeholder="Masukan tanggal Lahir">

                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="alamat">Alamat</label>
                        <input type="text" value="<?= $profile->alamat ?>" class="form-control" name="alamat" required id="alamat" placeholder="Masukan alamat">

                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="jk">Jenis Kelamin</label>
                        <div id="group1">
                            <input type="radio" name="jk" value="wanita" <?php if ($profile->jk == 'wanita') {
                                                                                echo 'checked';
                                                                            } ?>>Wanita<br>
                            <input type="radio" name="jk" value="laki" <?php if ($profile->jk == 'laki') {
                                                                            echo 'checked';
                                                                        } ?>>Laki<br>
                        </div>

                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="nama-lengkap">Nama</label>
                        <input type="text" value="<?= $profile->nama ?>" class="form-control" name="nama" required id="nama-lengkap" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="no_hp">No Handphone</label>
                        <input type="text" value="<?= $profile->no_hp ?>" class="form-control" name="no_hp" required id="no_hp" placeholder="Masukan No Handphone">
                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="email">Email</label>
                        <input type="text" value="<?= $profile->email ?>" class="form-control" name="email" required id="email" placeholder="Masukan Email">
                    </div>
                    <div class="form-group col-md-12 col-md-6">
                        <label for="password">Password</label>
                        <input type="password" id="myInput" value="<?= $profile->pass_asli ?>" class="form-control" name="password" required id="password" placeholder="Masukan password">
                        <input type="checkbox" onclick="myFunction()"> Show Password

                    </div>
                    <!-- <div class="form-group col-md-12 col-md-6">
                    <label for="instansi">Instansi</label>
                    <input type="text" value="<?= $profile->instansi ?>" class="form-control" name="instansi" required id="instansi" placeholder="Masukan Instansi">
                </div>
                <div class="form-group col-md-12 col-md-6">
                    <label for="status_lulus">Status lulus</label>
                    <input type="text" value="<?= $profile->status_lulus ?>" class="form-control" name="status_lulus" required id="status_lulus" placeholder="Masukan Status Lulus">
                </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<style type="text/css">
    @media screen and (max-width: 600px) {}

    img,
    h1 {
        display: inline-block;
        vertical-align: top;
    }

    i.fa {
        display: inline-block;
        border-radius: 60px;
        box-shadow: 0 0 2px #888;
        padding: 0.5em 0.6em;

    }
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
                        <h2 class="text-center text-primary">Selamat Datang di Program Coaching Merdeka Belajar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel">
                        <div class="panel-body bio-graph-info">
                            <h1>Profile</h1>
                            <!-- <a data-target="#myModal" data-toggle="modal" class="myEdit" id="MainNavHelp" href="#myModal"><i class="fa fa-pencil"></i></a> -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" class="myEdit" href="#myModal" >Edit Profile</button>
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
                                    <p><span>Jabatan</span>: <?= $profile->jabatan ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>instansi </span>: <?= $profile->instansi ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span>: <?= $profile->email ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Status Lulus </span>:<?= $profile->status_lulus ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Program </span>: <?= $profile->program ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <?php if ($this->session->userdata('program')) { ?>
                            <div class="card-body">
                                <a href="<?= base_url('guru/instrumen') ?>">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium mb-1">Klik disini untuk mengisi instrumen pasca kegiatan </p>
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
                        <?php } else { ?>
                            <div class="card-body">
                                <a href="javascript:;" data-toggle="modal" data-target="#modal-popout" onclick="pilih_program()">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium mb-1">Klik disini untuk mengisi instrumen pasca kegiatan <?=$this->session->userdata('program')?></p>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title bg-danger">
                                                <i class="bx bx-book font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Data Instrumen End -->
        </div>
    </div>

</div>
<<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-upload-formulirLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('guru/edit/' . $menu_id) ?>" method="post" class="" id="form-edit-profile">
            <input type="hidden" value="<?= $profile->id ?>" class="form-control" name="id" id="id">
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
                    <input type="checkbox"  onclick="myFunction()"> Show Password
                    
                </div>
                <div class="form-group col-md-12 col-md-6">
                    <label for="instansi">Instansi</label>
                    <input type="text" value="<?= $profile->instansi ?>" class="form-control" name="instansi" required id="instansi" placeholder="Masukan Instansi">
                </div>
                <div class="form-group col-md-12 col-md-6">
                    <label for="status_lulus">Status lulus</label>
                    <input type="text" value="<?= $profile->status_lulus ?>" class="form-control" name="status_lulus" required id="status_lulus" placeholder="Masukan Status Lulus">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div>
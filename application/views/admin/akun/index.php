<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: black !important;
    }
</style>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Akun Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Akun Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Daftar seluruh akun pengguna sistem.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <h4 class="h3 font-weight-bold"><?= $_title ?></h4>
                                </div> -->
                                <div class="pull-right col-md-12">
                                    <a class="btn btn-rounded btn-sm btn-primary float-right text-white" data-toggle="modal" data-target="#modal-form"><i class="fa fa-plus mr-1"></i> Tambah Akun</a>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle !important;width:5%">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">No HP</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data as $row) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td>- <?= $row->role ?></td>
                                                <td><?= $row->username ?></td>
                                                <td><?= $row->phone ?></td>
                                                <td><?= $row->email ?></td>

                                                <td class="text-center">
                                                    <button onclick="edit('<?= encode_id($row->id) ?>')" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
                                                    <button onclick="hapus('<?= encode_id($row->id) ?>', '<?= $row->nama ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade bs-modal-lg" id="modal_detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="isi_modal"></div>
        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-simpan" action="<?php echo site_url('admin/akun/save') ?>" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-control-label">Nama <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="form-control-label">No HP <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan No HP" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control-label">Alamat Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Alamat Email" >
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-control-label">Username <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-control-label">Pilih Hak Akses <span class="text-danger">*</span></label><br>
                        <select class="form-control select2" name="role[]" multiple="multiple">
                            <?php foreach($groups as $role) { ?>
                                <option value="<?php echo $role['id'] ?>"><?php echo $role['group_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-control-label">Password <span class="text-red">*</span></label>
                        <input type="password" class="form-control" name="pass" id="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
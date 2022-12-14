<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>pegawai</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">pegawai</a></div>
              <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan data pegawai baru.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('pegawai/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="pegawai_name">Nama pegawai</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->pegawai_name) ? $data->pegawai_name : '' ?>" name="pegawai_name" id="pegawai_name" placeholder="Masukan Nama pegawai" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="group">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="L" <?php echo @$data->jenis_kelamin=='L'?'selected':'' ?>>Laki - Laki</option>
                                            <option value="P" <?php echo @$data->jenis_kelamin=='P'?'selected':'' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nohp">No Telepon</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->nohp) ? $data->nohp : '' ?>" name="nohp" id="nohp" placeholder="Masukan Nomor Telepon">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->tempat_lahir) ? $data->tempat_lahir : '' ?>" name="tempat_lahir" id="tempat_lahir" placeholder="NIP">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" value="<?php echo isset($data->tanggal_lahir) ? $data->tanggal : '' ?>" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bagian">Bagian</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->bagian) ? $data->bagian : '' ?>" name="bagian" id="bagian" placeholder="Nama Bagian">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pendidikan">Pendidikan</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="SD" <?php echo @$data->delivery_type=='SD'?'selected':'' ?>>SD</option>
                                            <option value="SMP" <?php echo @$data->delivery_type=='SMP'?'selected':'' ?>>SMP</option>
                                            <option value="SMA" <?php echo @$data->delivery_type=='SMA'?'selected':'' ?>>SMA</option>
                                            <option value="D3" <?php echo @$data->delivery_type=='D3'?'selected':'' ?>>D3</option>
                                            <option value="S1" <?php echo @$data->delivery_type=='S1'?'selected':'' ?>>S1</option>
                                            <option value="S2" <?php echo @$data->delivery_type=='S2'?'selected':'' ?>>S2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->nik) ? $data->nik : '' ?>" name="nik" id="nik" placeholder="Masukan NIK">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->npwp) ? $data->npwp : '' ?>" name="npwp" id="npwp" placeholder="Masukan NPWP Perusahaan">
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-md-6">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" placeholder="Alamat" name="alamat" rows="5"><?php echo isset($data->alamat) ? $data->alamat : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status_karyawan">Status Karyawan</label>
                                        <select name="status_karyawan" id="status_karyawan" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="Aktif" <?php echo @$data->status_karyawan=='Aktif'?'selected':'' ?>>Aktif</option>
                                            <option value="Resign" <?php echo @$data->status_karyawan=='Resign'?'selected':'' ?>>Resign</option>
                                            <option value="Magang" <?php echo @$data->status_karyawan=='Magang'?'selected':'' ?>>Magang</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="date" class="form-control" placeholder="tanggal_masuk" name="tanggal_masuk" rows="5"><?php echo isset($data->tanggal_masuk) ? $data->tanggal_masuk : '' ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_keluar">Tanggal Keluar</label>
                                        <input type="date" class="form-control" placeholder="tanggal_keluar" name="tanggal_keluar" rows="5"><?php echo isset($data->tanggal_keluar) ? $data->tanggal_keluar : '' ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kontak_darurat">Kontak Darurat</label>
                                        <input type="text" class="form-control" placeholder="kontak_darurat" name="kontak_darurat" rows="5"><?php echo isset($data->kontak_darurat) ? $data->kontak_darurat : '' ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hubungan_kontak">Hubungan Kontak</label>
                                        <select name="status_karyawan" id="status_karyawan" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="Orang Tua" <?php echo @$data->status_karyawan=='Orang Tua'?'selected':'' ?>>Orang Tua</option>
                                            <option value="Istri / Suami" <?php echo @$data->status_karyawan=='Istri / Suami'?'selected':'' ?>>Istri / Suami</option>
                                            <option value="Anak" <?php echo @$data->status_karyawan=='Anak'?'selected':'' ?>>Anak</option>
                                            <option value="Saudara" <?php echo @$data->status_karyawan=='Saudara'?'selected':'' ?>>Saudara</option>            
                                        </select>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <?php if (!@$id) { ?>
                                        <button type="submit" class="btn btn-primary pull-right" id="simpan">Simpan</button>
                                        <?php  } else { ?>
                                        <button type="submit" class="btn btn-primary pull-right" id="update">Simpan</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
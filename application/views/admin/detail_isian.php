<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Isian Responden</h4>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <!-- <th>Nama Responden</th> -->
                                <!-- <th>Jabatan Responden</th> -->
                                <th>Jenis Usaha</th>
                                <th>Nama Usaha</th>
                                <!-- <th>Nama Pemilik/Grup Pemilik</th> -->
                                <!-- <th>Tahun Mulai Beroperasi</th> -->
                                <th>Nomor Induk Berusaha (NIB)</th>
                                <!-- <th>Provinsi</th>
                                <th>Kabupaten/Kota</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan/Desa</th>
                                <th>Jalan & No.</th>
                                <th>Email</th> -->
                                <th>No HP</th>
                                <!-- <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Penggunaan BPUP</th> -->
                                <th>Biaya Pemeliharaan Fasilitas</th>
                                <th>Pembelian Bahan Baku</th>
                                <th>Pembelian Bahan Penolong</th>
                                <th>Biaya lainnya yang digunakan untuk reaktivasi usaha</th>
                                <th>Skala Usaha Penerima BIP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <!-- <td><?= $row->nama ?></td>
                                <td><?= $row->jabatan_responden ?></td> -->
                                <td><?= $row->usaha ?></td>
                                <td><?= $row->nama_usaha ?></td>
                                <!-- <td><?= $row->nama_pemilik ?></td>
                                <td><?= $row->tahun_mulai ?></td> -->
                                <td><?= $row->nib ?></td>
                                <!-- <td><?= $row->nama_prov ?></td>
                                <td><?= $row->nama_kab ?></td>
                                <td><?= $row->nama_kec ?></td>
                                <td><?= $row->nama_kel ?></td>
                                <td><?= $row->jalan ?></td>
                                <td><?= $row->email ?></td> -->
                                <td><?= $row->no_hp ?></td>
                                <!-- <td><?= $row->longitude ?></td>
                                <td><?= $row->latitude ?></td>
                                <td><?= $row->penggunaan_bpup ?></td> -->
                                <td><?= $row->bpup_fasilitas ?></td>
                                <td><?= $row->bpup_baku ?></td>
                                <td><?= $row->bpup_penolong ?></td>
                                <td><?= $row->bpup_usaha ?></td>
                                <td><?= $row->skala_usaha ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
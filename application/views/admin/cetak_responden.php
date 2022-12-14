<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lampiran Isian Monitoring BPUP - <?= @$data_row->nama_usaha ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="https://appt.demoo.id/kemenpar_bip/public/assets-front/img/custom/kemenparekraf.png">
</head>
<body>
    <header>
        <center>
            <table width="100%">
                <tr>
                    <td width="15%" style="text-align: right;"><img style="margin-right: 15px;" src='https://appt.demoo.id/kemenpar_bip/public/assets-front/img/custom/kemenparekraf.png' width="90" /></td>
                    <td>
                        <table style="margin-top:1%;font-size: 9pt;text-align:center;">
                            <tr>
                                <td>
                                    <font style="font-size: 20px;"><strong>Monitoring Bantuan Pemerintah bagi Usaha Pariwisata (BPUP)</strong></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <font style="font-size: 14px;">Kementerian Pariwsata dan Ekonomi Kreatif/ Badan Pariwisata dan Ekonomi Kreatif (KEMENPAREKRAF/BAPAREKRAF)
                                        </font>
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <hr style="height:2px;border:none;color:#333;background-color:#333;" />
        </center>
    </header>
    <div class='container'>
        <div id="row">
            <div class="col-12" style="font-size: 16px; margin-bottom: 10px;">
                <b>HALAMAN PENGESAHAN & PERSETUJUAN</b>
            </div>
            <div class="col-12" style="font-size: 14px;">
                Kepada Yth. Responden<br>
                di Tempat<br>
                <br>
                Survei ini bertujuan untuk melakukan monitoring Bantuan Pemerintah bagi Usaha Pariwisata (BPUP) Tahun 2021. <br>
                Pengisian formulir survei dilakukan oleh pihak responden dengan mengedepankan unsur pemahaman atas penerimaan hibah dari Kementerian Pariwisata dan Ekonomi Kreatif/ Badan Pariwisata dan Ekonomi Kreatif (KEMENPAREKRAF/BAPAREKRAF).<br>
                Kepada Responden yang telah berkontribusi dalam kegiatan survei ini, kami ucapkan terima kasih.
            </div>
        </div>
        <div>
            <div class="col-12" style="font-size: 16px; margin-bottom: 10px;">
                <hr style="height:2px;border:none;color:#333;background-color:#333;" />
                <b>1. Identitas Profil</b>
            </div>
            <div class="col-12" style="font-size: 14px; text-align: left;">
                <table width="100%">
                    <tr>
                        <td style="width: 40%; text-align: left;">Nama Responden</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Jabatan Responden</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->jabatan_responden ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Jenis Usaha</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->usaha ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Nama Usaha</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama_usaha ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Nama Pemilik/Grup Pemilik</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama_pemilik ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Tahun Mulai Beroperasi</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->tahun_mulai ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Nomor Induk Berusaha (NIB)</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nib ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Provinsi</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama_prov ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Kabupaten/Kota</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama_kab ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Kecamatan</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama_kec ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Kelurahan/Desa</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->nama_kel ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Jalan & No.</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->jalan ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Email</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->email ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">No. Telpon</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->no_hp ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Latitude</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->longitude ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Longitude</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->latitude ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Penggunaan BPUP</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->penggunaan_bpup ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left;">Skala Usaha Penerima BIP</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 55%; text-align: left;"><?= @$data_row->skala_usaha ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div>
            <div class="col-12" style="font-size: 16px; margin-bottom: 10px;">
                <hr style="height:2px;border:none;color:#333;background-color:#333;" />
                <b>2. Monitoring BPUP</b>
            </div>
            <div class="col-12">
                <table width="100%" border="1" cellspacing="0" cellpadding="5">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%;">No</th>
                            <th>Kuesioner</th>
                            <th style="text-align:center; width: 10%;">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($soal as $row){ ?>
                            <tr>
                                <td style="text-align:center; width:5%;"><?= $no++ ?></td>
                                <td><?= $row->soal ?></td>
                                <td style="text-align:center; width:10%;"><?= $row->jawaban ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
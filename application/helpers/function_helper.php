<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan
if (!function_exists('bulan')) {
    function bulan($bln)
    {

        switch ((int)$bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tgl)
    {
        if (empty($tgl)) {
            return '';
        }
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun; //hasil akhir
    }
}

if (!function_exists('get_angka_ins')) {
    function get_angka_ins($value)
    {
        if ($value == 'STS') {
            return 1;
        }else if ($value == 'TS') {
            return 2;
        }else if ($value == 'S') {
            return 3;
        }else if ($value == 'SS') {
            return 4;
        }else {
            return '';
        }
    }
}

if (!function_exists('tgl_indo_timestamp')) {

    function tgl_indo_timestamp($tgl)
    {
        $inttime = date('Y-m-d H:i:s', strtotime($tgl)); //mengubah format menjadi tanggal biasa
        $tglBaru = explode(" ", $inttime); //memecah berdasarkan spaasi

        $tglBaru1 = $tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
        $tglBaru2 = $tglBaru[1]; //mendapatkan fotmat hh:ii:ss
        $tglBarua = explode("-", $tglBaru1); //lalu memecah variabel berdasarkan -

        $tgl = $tglBarua[2];
        $bln = $tglBarua[1];
        $thn = $tglBarua[0];

        $bln = bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
        $ubahTanggal = "$tgl $bln $thn | $tglBaru2 "; //hasil akhir tanggal

        return $ubahTanggal;
    }
}

function angka_penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = angka_penyebut($nilai - 10) . " Belas";
    } else if ($nilai < 100) {
        $temp = angka_penyebut($nilai / 10) . " Puluh" . angka_penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . angka_penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = angka_penyebut($nilai / 100) . " Ratus" . angka_penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . angka_penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = angka_penyebut($nilai / 1000) . " Ribu" . angka_penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = angka_penyebut($nilai / 1000000) . " Juta" . angka_penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = angka_penyebut($nilai / 1000000000) . " Milyar" . angka_penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = angka_penyebut($nilai / 1000000000000) . " Trilyun" . angka_penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function angka_terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(angka_penyebut($nilai));
    } else {
        $hasil = trim(angka_penyebut($nilai));
    }
    return $hasil;
}

function encode_id($id_)
{
    return substr(md5($id_), 0, 20) . $id_ . substr(md5($id_), 20, 12);
}

function decode_id($id_)
{
    return substr($id_, 20, strlen($id_) - 32);
}

function set_id($id)
{
    return md5(date("YmdHiS")) . $id;
}

function val_id($id)
{
    return substr($id, 32);
}

function get_number_saya($value)
{
    if ($value === null) {
        return null;
    } else if ($value == 0) {
        return 0;
    } else {
        return rupiah($value);
    }
}

function rupiah($value, $rp = '')
{
    if ($value) {
        $explode = explode('.', $value);
        $value = $explode[0];
        $result = str_replace(',', '.', number_format($value));
        if (!$rp) {
            $formated = $result;
        } else {
            $formated = 'Rp. ' . $result;
        }
        if (!empty($explode[1])) {
            if ($explode[1]!='00') {
                $formated .= ','.$explode[1];
            }
        }
        return $formated;
    } else {
        if ($value == null) {
            return null;
        }else{
            return 0;
        }
    }
}

function metadata1($url = NULL)
{
    $exif = exif_read_data($url, 0, true);
    return $exif;
}
function metadata2($url = NULL)
{
    $exif = exec("identify -verbose '$url'", $output);
    return $output;
}

function hitung_jp($jp) {
    if ($jp == 0) {
        return '0 Menit';
    }else{
        $hours = ($jp / 60);
        $rhours = floor($hours);
        $minutes = ($hours - $rhours) * 60;
        $rminutes = round($minutes);
        $waktu = '';
        if ($rhours>0) {
            $waktu .= $rhours." Jam";
        }
        if ($rminutes>0) {
            if ($waktu != '') {
                $waktu .= " ";
            }
            $waktu .= $rminutes." Menit";
        }
        return $waktu;
    }
}

function metadata3($url = NULL)
{
    $exif = exec("exiftool '$url'", $output);
    return $output;
}

if (!function_exists('upload_file')) {
    function upload_file($name, $path, $encryptName = true, $allowed_types = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx', $maxSize = 5)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $realName = $_FILES[$name]['name'];
        $_FILES[$name]['name'] = $_FILES[$name]['name'];
        $config = array(
            'upload_path'   => "$path",
            'allowed_types' => $allowed_types,
            'encrypt_name'  => $encryptName,
            'max_size' => $maxSize * 1000
        );
        $CI->upload->initialize($config);
        if ($CI->upload->do_upload($name)) {
            return [
                'path' => $path . '/' . $CI->upload->data("file_name"),
                'path_min' => $path,
                'real_name' => $realName,
                'name' => $CI->upload->data("file_name"),
                'type' => $CI->upload->data("file_type"),
                'size' => $CI->upload->data("file_size"),
                'ext' => $CI->upload->data("file_ext"),
            ];
        } else {
            // return false;
            return $CI->upload->display_errors();
            // exit;
        }
    }

    function program($text = ""){
        $result = NULL;
        if ($text == 'psp') {
            $result = 'Program Sekolah Penggerak';
        }elseif ($text == 'pgp' ) {
            $result = 'Program Guru Penggerak';
        }elseif ($text == 'ikm' ) {
            $result = 'Implementasi Kurikulum Merdeka';
        }
         return $result;
    }
}

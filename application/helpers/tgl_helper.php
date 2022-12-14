<?php
function getRomawi($bln){
   switch ($bln){
      case 1:
      return "I";
      break;
      case 2:
      return "II";
      break;
      case 3:
      return "III";
      break;
      case 4:
      return "IV";
      break;
      case 5:
      return "V";
      break;
      case 6:
      return "VI";
      break;
      case 7:
      return "VII";
      break;
      case 8:
      return "VIII";
      break;
      case 9:
      return "IX";
      break;
      case 10:
      return "X";
      break;
      case 11:
      return "XI";
      break;
      case 12:
      return "XII";
      break;
   }
}

function daterange_to_id($date1, $date2) {
   $a = explode('-', $date1);
   $b = explode('-', $date2);
   if (($a[1] == $b[1]) && ($a[0] == $b[0])) {
      $m = get_month($b[1]);
      return "{$a[2]} s.d {$b[2]} $m {$a[0]}";
   } else if (($a[1] != $b[1]) && ($a[0] == $b[0])) {
      $m = get_month($a[1]);
      $m2 = get_month($b[1]);
      return "{$a[2]} $m s.d {$b[2]} $m2 {$a[0]}";
   } else {
      $m = get_month($a[1]);
      $m2 = get_month($b[1]);
      return "{$a[2]} $m {$a[0]} s.d {$b[2]} $m2 {$b[0]}";
   }
}

function datetime_to_id($datetime = NULL) {
   if ($datetime == NULL) {
      return '';
   } else {
      $a = explode(' ', $datetime);
      $b = explode('-', $a[0]);
      $m = get_month($b[1]);
   }
   return "{$b[2]} $m {$b[0]} Pukul ".substr($a[1], 0, 5);
}

function datetime_to_id_br($datetime = NULL) {
   if ($datetime == NULL) {
      return '';
   } else {
      $a = explode(' ', $datetime);
      $b = explode('-', $a[0]);
      $m = get_month($b[1]);
   }
   return "{$b[2]} $m {$b[0]}<br>Pukul ".substr($a[1], 0, 5);
}

function datedetik_to_id($datetime = NULL) {
   if ($datetime == NULL) {
      return '';
   } else {
      $a = explode(' ', $datetime);
      $b = explode('-', $a[0]);
      $m = get_month($b[1]);
   }
   return "{$b[2]} $m {$b[0]}<br>Pukul ".$a[1];
}

function date_to_id($date = NULL) {
   if ($date == NULL) {
      return '';
   } else {
      $a = explode('-', $date);
      $m = get_month($a[1]);
   }
   return "{$a[2]} $m {$a[0]}";
}

function get_month($month) {
   switch ($month) {
      case '01':
      $m = 'Januari';
      break;
      case '02':
      $m = 'Februari';
      break;
      case '03':
      $m = 'Maret';
      break;
      case '04':
      $m = 'April';
      break;
      case '05':
      $m = 'Mei';
      break;
      case '06':
      $m = 'Juni';
      break;
      case '07':
      $m = 'Juli';
      break;
      case '08':
      $m = 'Agustus';
      break;
      case '09':
      $m = 'September';
      break;
      case '10':
      $m = 'Oktober';
      break;
      case '11':
      $m = 'November';
      break;
      default:
      $m = 'Desember';
      break;
   }
   return $m;
}

function get_bulan($month) {
   switch ($month) {
      case '01':
      $m = 'Januari';
      break;
      case '02':
      $m = 'Februari';
      break;
      case '03':
      $m = 'Maret';
      break;
      case '04':
      $m = 'April';
      break;
      case '05':
      $m = 'Mei';
      break;
      case '06':
      $m = 'Juni';
      break;
      case '07':
      $m = 'Juli';
      break;
      case '08':
      $m = 'Agustus';
      break;
      case '09':
      $m = 'September';
      break;
      case '10':
      $m = 'Oktober';
      break;
      case '11':
      $m = 'November';
      break;
      case '12':
      $m = 'Desember';
      break;
      default:
      $m = '';
      break;
   }
   return $m;
}

function arr_month() {
   $bulan = array(
      "01"=>"Januari",
      "02"=>"Februari",
      "03"=>"Maret",
      "04"=>"April",
      "05"=>"Mei",
      "06"=>"Juni",
      "07"=>"Juli",
      "08"=>"Agustus",
      "09"=>"September",
      "10"=>"Oktober",
      "11"=>"November",
      "12"=>"Desember"
   );
   return $bulan;
}
?>
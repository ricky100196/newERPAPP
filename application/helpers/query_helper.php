<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function insert_log($id_pengajuan, $status)
{
	$CI=&get_instance();
	$dt = array(
		'id_pengajuan' => $id_pengajuan, 
		'status' => $status, 
		'date' => date('Y-m-d H:i:s'), 
	);
    $CI->db->insert('log_pengajuan', $dt);
}
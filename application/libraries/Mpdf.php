<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/mailjet/vendor/autoload.php';
use \Mpdf\Resources;
 
class Mpdf {
    function __construct() {
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
         
        return new mPDF($param);
    }
	
	function load_custom($param=NULL,$size="A4")
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
         
        return new mPDF($param,$size);
    }

}
?>
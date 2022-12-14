<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('uploadFile')) {
    function uploadFile($name, $path, $encrypt_name = FALSE, $file_type = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|txt|psd|ai')
    {
        $CI = &get_instance();
        $CI->load->library('upload');

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        $realName = $_FILES[$name]['name'];
        $_FILES[$name]['name'] = date('YmdHis') . '-' . $_FILES[$name]['name'];

        $config = [
            'upload_path' => "$path",
            'allowed_types' => $file_type,
            'encrypt_name' => $encrypt_name,
        ];

        $CI->upload->initialize($config);
        if ($CI->upload->do_upload($name)) {
            return [
                'status' => true,
                'path' => $path . '/' . $CI->upload->data("file_name"),
                'name' => $CI->upload->data("file_name")
                // 'data' => [

                //     'real_name' => $realName,
                //     'name' => $CI->upload->data("file_name"),
                //     'type' => $CI->upload->data("file_type"),
                //     'size' => $CI->upload->data("file_size"),
                //     'ext' => $CI->upload->data("file_ext"),
                // ]
            ];
        } else {
            return [
                'status' => false,
                'data' => $CI->upload->display_errors(),
            ];
        }
    }
}

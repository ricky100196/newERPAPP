<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/mailjet/vendor/autoload.php';
use \Mailjet\Resources;
class Register_coach extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->load->view('front/register_coach');
	}

	public function do_save() {
		$this->form_validation->set_rules('nama', 'Nama lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'numeric');
        $this->form_validation->set_rules('nip', 'NIP', 'numeric');
        $this->form_validation->set_rules('no_hp', 'No hp', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('email', 'Alamat email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
        	$send = [
				'status' =>'0',
				'title' =>'Gagal!',
				'msg' => "Data Anda Belum Sesuai! \n Cek dan Lengkapi Kembali Formulir Pendaftaran.",
				'icon' => 'error',
			];
        } else {
        	$email = $this->input->post('email', true);
        	$nik = $this->input->post('nik', true);
			$nuptk = $this->input->post('nuptk', true);
			$nip = $this->input->post('nip', true);

            $user = $this->db->where('(nik="'.$nik.'" OR nuptk="'.$nuptk.'" OR nip="'.$nip.'")')->get('view_user');
			$cek_email = $this->db->where('(email="'.$email.'")')->get('view_user');

			if ($cek_email->num_rows() > 0) {
				$send = [
					'status' =>'0',
					'title' =>'Gagal!',
					'msg' => "Alamat Email Anda Telah Digunakan. \n Cek Kembali Data Anda",
					'icon' => 'info',
				];
			} else if ($user->num_rows() == 0) {
	            $data_insert = [
	                'nama' => $this->input->post('nama', true),
	                'nik' => $this->input->post('nik', true),
	                'nuptk' => (@$this->input->post('nuptk', true)?$this->input->post('nuptk', true):null),
	                'nip' => (@$this->input->post('nip', true)?$this->input->post('nip', true):null),
	                'no_hp' => $this->input->post('no_hp', true),
	                'pass_asli' => $this->input->post('no_hp', true),
	                'password' => md5($this->input->post('no_hp', true)),
	                'email' => $this->input->post('email', true),
	                'created' => date('Y-m-d H:i:s'),
	                'os' => $this->agent->platform(),
	                'user_agent' => $this->input->user_agent()
	            ];

				$this->load->model('M_api');
				$api_coach = $this->M_api->cek_coach($nip, true);
				$get_data = $api_coach;

				/*if ($api_coach != null) {
					$data_insert['jabatan'] = $get_data->jabatan;
					$data_insert['instansi'] = $get_data->instansi;
					$data_insert['tgl_lahir'] = substr($get_data->tglLahir, -4).'-'.substr($get_data->tglLahir, 3, 2).'-'.substr($get_data->tglLahir, 0, 2);
					$data_insert['jk'] = $get_data->jenisKelamin;

					$this->db->set($data_insert)->insert('coach_data');
					$id_registrasi = $this->db->insert_id();

					if ($this->db->affected_rows()>0) {
						$username = $data_insert['email'];
	                    $password = $data_insert['pass_asli'];
	                    $message = "Selamat, pendaftaran anda berhasil.\nSilahkan gunakan akun dibawah untuk login.\n\nUsername : $username \nPassword : $password \n\nAkses link di bawah ini untuk login : ".base_url('login')." \n\nBalai Guru Penggerak \nKalimantan Selatan.";
	                    $this->load->library('api_wa');
	                    $response_wa = json_decode($this->api_wa->send($data_insert['no_hp'], $message));
	                    if ($response_wa->status==true) {
	                    	$this->db->where('id', $id_registrasi)->set('response_wa', date("Y-m-d H:i:s"))->update('coach_data');
	                    }
	                    $response_email=$this->send_email($data_insert);
	                    if ($response_email) {
	                    	$this->db->where('id', $id_registrasi)->set('response_email', date("Y-m-d H:i:s"))->update('coach_data');
	                    }

						$this->session->set_flashdata('success', "Selamat! Anda Berhasil Mendaftar Akun \n Simpan Dibawah Ini \n Username : ".$data_insert['email']." \n Password : ".$data_insert['no_hp']." \n Gunakan Akun Anda Untuk Mengakses Ekosistem Sekolah Merdeka");
			        	$send = [
							'title' =>'Selamat!',
							'msg' => "Anda Berhasil Mendaftar Akun \n Simpan Dibawah Ini \n Username : ".$data_insert['email']." \n Password : ".$data_insert['no_hp']." \n Gunakan Akun Anda Untuk Mengakses Ekosistem Sekolah Merdeka",
							'icon' => 'success',
						];
			        } else {
			        	$send = [
							'title' =>'Gagal!',
							'msg' => "Periksa Kembali Koneksi Internet Anda.",
							'icon' => 'error',
						];
			        }
		        } else {*/
	        	$api_lulusan = $this->M_api->cek_lulusan($nuptk, true);
	        	
				if ($api_lulusan != null) {
		            $get_data = $api_lulusan;

		            if (((in_array(substr($get_data->status_lulus, 0, 1), ['1','2','3','9']) || strtolower($get_data->status_lulus)=='non psp') && strtolower($get_data->program=='ikm')) || (substr($get_data->status_lulus, 0, 5)=='Lulus' && strtolower($get_data->program=='psp')) || (in_array(substr($get_data->status_lulus, 0, 2), ['10','02','03','09']) && strtolower($get_data->program=='pgp'))) {
		            	$data_insert['jabatan'] = @$get_data->jabatan;
						$data_insert['instansi'] = $get_data->instansi;
						$data_insert['program'] = $get_data->program;
						$data_insert['status_lulus'] = $get_data->status_lulus;
						$data_insert['kab'] = $get_data->kab;
						$data_insert['prov'] = $get_data->prov;
						$wilayah = $this->db->where('a.nama', $get_data->kab)->get('ref_kabupaten a')->row();
						$data_insert['kode_kab'] = @$wilayah->kode_wilayah;
						$data_insert['kode_prov'] = @$wilayah->kode_prop;

						$this->db->set($data_insert)->insert('coach_data');
						$id_registrasi = $this->db->insert_id();

						if ($this->db->affected_rows()>0) {
							$username = $data_insert['email'];
		                    $password = $data_insert['pass_asli'];
		                    $message = "Selamat, pendaftaran anda berhasil.\nSilahkan gunakan akun dibawah untuk login.\n\nUsername : $username \nPassword : $password \n\nAkses link di bawah ini untuk login : ".base_url('login')." \n\nBalai Guru Penggerak \nKalimantan Selatan.";
		                    $this->load->library('api_wa');
		                    $response_wa = json_decode(json_decode($this->api_wa->send($data_insert['no_hp'], $message)));
		                    if ($response_wa->status==true) {
		                    	$this->db->where('id', $id_registrasi)->set('response_wa', date("Y-m-d H:i:s"))->update('coach_data');
		                    }
		                    $response_email=$this->send_email($data_insert);
		                    if ($response_email) {
		                    	$this->db->where('id', $id_registrasi)->set('response_email', date("Y-m-d H:i:s"))->update('coach_data');
		                    }

							$this->session->set_flashdata('success', "Selamat! Anda Berhasil Mendaftar \n Simpan Akun Dibawah Ini \n Username : ".$username." \n Password : ".$password." \n Gunakan Akun Anda Untuk Mengakses Coaching / Ekosistem Sekolah Merdeka");
							// redirect('register');
				        	$send = [
								'status' =>'1',
								'title' =>'Selamat!',
								'msg' => "Anda Berhasil Mendaftar Akun \n Simpan Dibawah Ini \n Username : ".$username." \n Password : ".$password." \n Gunakan Akun Anda Untuk Mengakses Ekosistem Sekolah Merdeka",
								'icon' => 'success',
							];
				        } else {
				        	$send = [
								'status' =>'0',
								'title' =>'Gagal!',
								'msg' => "Periksa Kembali Koneksi Internet Anda.",
								'icon' => 'error',
							];
				        }
		            }
		        } else {
		        	$this->session->set_flashdata('failed', 'Anda Tidak Terdaftar Sebagai Sasaran Ekosistem Sekolah Merdeka');
		        	$send = [
						'status' =>'0',
						'title' =>'Gagal!',
						'msg' => "Anda Tidak Terdaftar Sebagai Sasaran Ekosistem Sekolah Merdeka.",
						'icon' => 'error',
					];
		        }
			    // }
	        } else {
	        	$this->session->set_flashdata('failed', 'Anda Telah Terdaftar Sebagai '.strtoupper($user->row()->type).' Pada Ekosistem Sekolah Merdeka');
			    // redirect('register');
			    $send = [
					'status' =>'0',
					'title' =>'Gagal!',
					'msg' => "Anda Telah Memiliki Akun. \n Gunakan Akun Ini Untuk Login \n Username : ".$user->row()->username." \n Password : ".$user->row()->pass_asli,
					'icon' => 'info',
				];
	        }
	    }
	    echo json_encode($send);
	}

	public function cek_akun() {
		$email = $this->input->post('email');
		$nik = $this->input->post('nik');
		$nuptk = $this->input->post('nuptk');
		$nip = $this->input->post('nip');

		// $user = $this->db->where('(username="'.$nik.'")')->get('view_user');
		$user = $this->db->where('(nik="'.$nik.'" OR nuptk="'.$nuptk.'" OR nip="'.$nip.'")')->get('view_user');
		if ($user->num_rows() > 0) {
			$send = [
				'status' => '3',
				'title' =>'Informasi',
				'msg' => "Anda Telah Memiliki Akun. \n Gunakan Akun Ini Untuk Login \n Username : ".$user->row()->username." \n Password : ".$user->row()->password,
				'icon' => 'warning',
			];
		} else {
	        $this->load->model('M_api');
			$api_coach = $this->M_api->cek_coach($nip, true);

			/*if ($api_coach != null) {
	            $get_data = $api_coach;

	            if ($get_data->nik!=null && $get_data->nik!='' && $get_data->nik!=$nik) {
	            	$send = [
						'status' => '0',
						'title' =>'Informasi',
						'msg' => "No. KTP Terdeteksi Tidak Sesuai \n Mohon Cek Kembali Inputan Anda",
						'icon' => 'error',
					];
				} else {
		            $send = [
						'status' => '1',
						'nama' => $get_data->nama,
						'title' =>'OK',
						'msg' => "Data ".$get_data->nama." \n ".$get_data->instansi." Ditemukan. \n Anda Dapat Melanjutkan Pendaftaran Sebagai Coach Pada Ekosistem Sekolah Merdeka",
						'icon' => 'success',
					];
				}
	        } else {*/
				$api_lulusan = $this->M_api->cek_lulusan($nuptk, true);

				if ($api_lulusan != null) {
		            $get_data = $api_lulusan;
		            // var_dump($get_data);exit;

		            if (((in_array(substr($get_data->status_lulus, 0, 1), ['1','2','3','9']) || strtolower($get_data->status_lulus)=='non psp') && strtolower($get_data->program=='ikm')) || (substr($get_data->status_lulus, 0, 5)=='Lulus' && strtolower($get_data->program=='psp')) || (in_array(substr($get_data->status_lulus, 0, 2), ['10','02','03','09']) && strtolower($get_data->program=='pgp'))) {

			            /*if (strlen($get_data->nik)==16 && $get_data->nik!=$nik) {
			            	$send = [
								'status' => '0',
								'title' => 'Informasi',
								'msg' => "No. KTP Terdeteksi Tidak Sesuai \n Mohon Cek Kembali Inputan Anda",
								'icon' => 'error',
							];
			            } else {*/
			            	$send = [
								'status' => '1',
								'nama' => $get_data->nama,
								'title' => 'OK',
								'msg' => "Data ".$get_data->nama." \n ".$get_data->instansi." Ditemukan. \n Anda Dapat Melanjutkan Pendaftaran Sebagai Lulusan Program ".strtoupper($get_data->program).' Pada Ekosistem Sekolah Merdeka',
								'icon' => 'success',
							];
			            // }
			        } else {
			        	$send = [
							'status' => '2',
							'title' => 'Informasi',
							'msg' => "Data ".$get_data->nama." Ditemukan. \n Anda Tidak Terdaftar Sebagai Sasaran Ekosistem Sekolah Merdeka.",
							'icon' => 'error',
						];
			        }

		            
		        } else {
		        	$send = [
						'status' => false,
						'title' => 'Gagal',
						'msg' => "Data Tidak Ditemukan. \n Cek Kembali NIK/NUPTK/NIP Anda",
						'icon' => 'error',
					];
		        }
	        // }
	    } 

	    echo json_encode($send);
	}

	private function send_email($data)
    {
        $email = $data['email'];
        $message = $this->load->view('front/template_email_akun', $data, true);
        // $this->load->library('email');
        // $this->email->initialize(array(
        //     'protocol'    => 'smtp',
        //     'smtp_host'   => 'tls://in-v3.mailjet.com',
        //     'smtp_user'   => 'abc04e8eee03f0c0d728fc2569829ae6',
        //     'smtp_pass'   => '7b52c880afa9d46780f73743757241b5',
        //     'smtp_port'   => 465,
        //     'crlf'        => "\r\n",
        //     'newline'     => "\r\n"
        // ));

        // $this->email->from('coaching.bbgpkalsel@gmail.com', 'Balai Guru Penggerak Kalimantan Selatan');
        // $this->email->to($email);
        // $this->email->subject('Akun Coaching / Ekosistem Sekolah Merdeka');
        // $this->email->set_mailtype('html');

        // $this->email->message($message);



          $mj = new \Mailjet\Client('abc04e8eee03f0c0d728fc2569829ae6','7b52c880afa9d46780f73743757241b5',true,['version' => 'v3.1']);
		  $body = [
		    'Messages' => [
		      [
		        'From' => [
		          'Email' => "coaching.bbgpkalsel@gmail.com",
		          'Name' => "Balai Guru Penggerak Kalimantan Selatan"
		        ],
		        'To' => [
		          [
		            'Email' => $email
		          ]
		        ],
		        'Subject' => "Akun Coaching / Ekosistem Sekolah Merdeka",
		        // 'TextPart' => "My first Mailjet email",
		        'HTMLPart' => $message,
		        'CustomID' => "AppGettingStartedTest"
		      ]
		    ]
		  ];
		  $response = $mj->post(Resources::$Email, ['body' => $body]);
		  return $response;
    }
}
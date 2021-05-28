<?php

use FFI\CData;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('pages/login');
		$this->loginwork();
	}

	private function loginwork()
	{

		$username = $this->input->post('username');
		$pass = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($user) {  //jika user ada
			$passFromDb = $user['password'];
			$hash = password_hash($passFromDb, PASSWORD_DEFAULT);
			if (password_verify($pass, $hash)) {
				$data = [
					'user' => $user['username']
				];
				$this->session->set_userdata($data);
				redirect('auth/home');
			} else {
				$this->session->set_flashdata('m', '<small class="warning-text text-danger form_name">Password salah!</small><br>');
			}
		} else {
			$this->session->set_flashdata('m', '<small class="warning-text text-danger form_name">Username tidak ditemukan!</small><br>');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('auth');
	}
	public function register()
	{
		$this->load->view('pages/register');
	}

	public function register_work()
	{
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		$cek_username = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($cek_username) {
			$this->session->set_flashdata('message', '<small class="warning-text text-danger form_name">Username sudah digunakan</small><br>');
		} else {
			date_default_timezone_set("Asia/Bangkok");
			$dateSubmit = date("Y/m/d H:i:sa");
			$this->db->set('username', $username);
			$this->db->set('nama', $nama);
			$this->db->set('email', $email);
			$this->db->set('password', $pass);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('user');

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', 'Register Berhasil!');
				redirect('auth/home');
			} else {
				echo "Gagal insert";
			}
		}
	}

	public function diskusi()
	{
		if (!$this->session->userdata('user')) { //jika user tidak login arahkan ke halaman login
			redirect('auth');
		} else {

			$id_diskusi = $this->uri->segment(3);
			$sql = "SELECT user.*, diskusi.* from user INNER JOIN diskusi where diskusi.id_diskusi='$id_diskusi'";
			$data['detail'] = $this->db->query($sql)->row_array();

			$sqlku = "SELECT * FROM `komentar` WHERE id_diskusi='$id_diskusi' order by created_at desc ";
			$data['komentar'] = $this->db->query($sqlku)->result_array();

			$sql2 = "SELECT * FROM `komentar` WHERE id_diskusi='$id_diskusi'";
			$data['jkomentar'] = $this->db->query($sql2)->num_rows();

			$this->load->view('template/header');
			$this->load->view('pages/detaildiskusi.php', $data);
			$this->load->view('template/footer');
		}
	}
	public function home()
	{
		if (!$this->session->userdata('user')) { //jika user tidak login arahkan ke halaman login
			redirect('auth');
		} else {


			$sql = "SELECT * FROM `diskusi` ORDER BY created_at DESC";
			$data['diskusi'] = $this->db->query($sql)->result_array();

			$this->load->view('template/header');
			$this->load->view('pages/diskusi.php', $data);
			$this->load->view('template/footer');
		}
	}

	public function posting_diskusi()
	{

		date_default_timezone_set("Asia/Bangkok");
		$dateSubmit = date("Y/m/d H:i:sa");
		$title = $this->input->post('title');
		$deskripsi = $this->input->post('deskripsi');
		$kategori = $this->input->post('kategori');
		$user = $this->session->userdata['user'];
		$img = $_FILES['foto']['name'];
		$file = $_FILES['file']['name'];
		if ($img || $file) {
			$config['allowed_types'] = '*';
			$config['max_size']     = '2048';
			$config['upload_path'] = 'assets/img/attachment/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				array('upload_data' => $this->upload->data());
				$new_img = $this->upload->data('file_name');
			}

			if ($this->upload->do_upload('file')) {
				array('upload_data' => $this->upload->data());
				$new_file = $this->upload->data('file_name');
			}
			$this->db->set('title', $title);
			$this->db->set('image', $new_img);
			$this->db->set('file', $new_file);
			$this->db->set('deskripsi', $deskripsi);
			$this->db->set('kategori', $kategori);
			$this->db->set('username', $user);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('diskusi');
		} else {
			$this->db->set('title', $title);
			$this->db->set('deskripsi', $deskripsi);
			$this->db->set('kategori', $kategori);
			$this->db->set('username', $user);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('diskusi');
		}



		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'diposting');
			redirect('auth/home');
		} else {
			echo "Gagal insert";
		}
	}
	public function posting_komentar()
	{

		date_default_timezone_set("Asia/Bangkok");
		$dateSubmit = date("Y/m/d H:i:sa");
		$komentar = $this->input->post('komentar');
		$id_diskusi = $this->input->post('id_diskusi');
		$user = $this->session->userdata['user'];
		$img = $_FILES['foto']['name'];
		$file = $_FILES['file']['name'];
		if ($img || $file) {
			$config['allowed_types'] = '*';
			$config['max_size']     = '2048';
			$config['upload_path'] = 'assets/img/attachment/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				array('upload_data' => $this->upload->data());
				$new_img = $this->upload->data('file_name');
			}

			if ($this->upload->do_upload('file')) {
				array('upload_data' => $this->upload->data());
				$new_file = $this->upload->data('file_name');
			}
			$this->db->set('img', $new_img);
			$this->db->set('id_diskusi', $id_diskusi);
			$this->db->set('file', $new_file);
			$this->db->set('komentar_user', $komentar);
			$this->db->set('username', $user);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('komentar');
		} else {
			$this->db->set('id_diskusi', $id_diskusi);
			$this->db->set('komentar_user', $komentar);
			$this->db->set('username', $user);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('komentar');
		}



		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'diposting');
			redirect('auth/diskusi/' . $id_diskusi . '');
		} else {
			echo "Gagal insert";
		}
	}
	public function balas_komentar()
	{

		date_default_timezone_set("Asia/Bangkok");
		$dateSubmit = date("Y/m/d H:i:sa");
		$id_komentar = $this->input->post('id_komentar');
		$komentar = $this->input->post('komentar');
		$id_diskusi = $this->input->post('id_diskusi');
		$user = $this->session->userdata['user'];
		$img = $_FILES['foto']['name'];
		$file = $_FILES['file']['name'];
		if ($img || $file) {
			$config['allowed_types'] = '*';
			$config['max_size']     = '2048';
			$config['upload_path'] = 'assets/img/attachment/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				array('upload_data' => $this->upload->data());
				$new_img = $this->upload->data('file_name');
			}

			if ($this->upload->do_upload('file')) {
				array('upload_data' => $this->upload->data());
				$new_file = $this->upload->data('file_name');
			}
			$this->db->set('img', $new_img);
			$this->db->set('id_diskusi', $id_diskusi);
			$this->db->set('file', $new_file);
			$this->db->set('komentar', $komentar);
			$this->db->set('id_komentar', $id_komentar);
			$this->db->set('username', $user);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('balas_komentar');
		} else {
			$this->db->set('id_diskusi', $id_diskusi);
			$this->db->set('id_komentar', $id_komentar);
			$this->db->set('komentar_user', $komentar);
			$this->db->set('username', $user);
			$this->db->set('created_at', $dateSubmit);
			$this->db->insert('balas_komentar');
		}



		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'diposting');
			redirect('auth/diskusi/' . $id_diskusi . '');
		} else {
			echo "Gagal insert";
		}
	}
}

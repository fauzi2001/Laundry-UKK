<?php

class C_pelanggan extends MY_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->helper('url');
	}
	public function TampilkanMember()
	{
		$data = $this->m_pelanggan->MTampilMember();
		$this->render_backend('member', ['data' => $data, 'judul' => 'Data Member']);
	}

	public function TambahkanMember()
	{
		$this->render_backend('crud/form_tambah', ['judul' => 'Form Tambah Member']);
	}

	public function CTambahMember()
	{
		$nm_member = $this->input->post('input_nm_member');
		$tlp_member = $this->input->post('input_tlp_member');
		$alamat_member = $this->input->post('input_alamat_member');
		$jk = $this->input->post('input_jk_member');
		$id_user = $this->session->userdata('id_user');
		$data = [
			'nm_member' => $nm_member,
			'tlp_member' => $tlp_member,
			'alamat_member' => $alamat_member,
			'jk_member' => $jk,
			'id_user' => $id_user
		];

		$hasil = $this->m_pelanggan->MTambahMember($data);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Member');
		} else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Member');
		}
		redirect('C_pelanggan/TampilkanMember');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('Auth');
	}

	public function HMember($id)
	{
		$this->m_pelanggan->ModelhpsMember($id);
		$this->session->set_flashdata('status', 'Member Berhasil Dihapus');
		redirect('C_pelanggan/TampilkanMember');
	}

	public function EditMember($id)
	{
		$data = $this->m_pelanggan->ModeleditMember($id);
		$this->render_backend('crud/form_edit', ['data' => $data, 'judul' => 'form Ubah Member']);
	}

	public function ProsesEditMember($id_member)
	{
		$id = $id_member;
		$nm_member = $this->input->post('input_nm_member');
		$tlp_member = $this->input->post('input_tlp_member');
		$alamat_member = $this->input->post('input_alamat_member');
		$jk = $this->input->post('input_jk_member');

		$hasil = $this->m_pelanggan->MProsesEditMember($nm_member, $tlp_member, $alamat_member, $jk, $id);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Member ');
		} else {
			$this->session->set_flashdata('status', 'Gagal Merubah Member');
		}
		redirect('C_pelanggan/TampilkanMember');
	}
}

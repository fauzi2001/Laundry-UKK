<?php

class C_outlet extends MY_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('m_outlet');
		$this->load->helper('url');
	}
	public function Tampilkanoutlet()
	{
		$data = $this->m_outlet->MTampiloutlet();
		$this->render_backend('outlet', ['data' => $data, 'judul' => 'Data Outlet']);
	}

	public function Tambahkanoutlet()
	{
		$this->render_backend('outlet/tambah_outlet', ['judul' => 'Form Tambah Outlet']);
	}

	public function CTambahoutlet()
	{
		$nm_outlet = $this->input->post('input_nm_outlet');
		$alamat_outlet = $this->input->post('input_alamat_outlet');
		$tlp_outlet = $this->input->post('input_tlp_outlet');

		$data = [
			'nm_outlet' => $nm_outlet,
			'alamat_outlet' => $alamat_outlet,
			'tlp_outlet' => $tlp_outlet,
		];

		$hasil = $this->m_outlet->MTambahoutlet($data);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Outlet');
		} else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Outlet');
		}
		redirect('C_outlet/Tampilkanoutlet');
	}
	public function Houtlet($id)
	{
		$this->m_outlet->Modelhpsoutlet($id);
		$this->session->set_flashdata('status', 'Berhasil Menghapus Outlet');
		redirect('C_outlet/Tampilkanoutlet');
	}

	public function Editoutlet($id)
	{
		$data = $this->m_outlet->Modeleditoutlet($id);
		$this->render_backend('outlet/edit_outlet', ['data' => $data, 'judul' => 'Form Edit Outlet']);
	}

	public function ProsesEditoutlet($id_outlet)
	{
		$id = $id_outlet;
		$nm_outlet = $this->input->post('nm_outlet');
		$alamat_outlet = $this->input->post('alamat_outlet');
		$tlp_outlet = $this->input->post('tlp_outlet');

		$hasil = $this->m_outlet->MProsesEditoutlet($nm_outlet, $alamat_outlet, $tlp_outlet, $id);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Outlet');
		} else {
			$this->session->set_flashdata('status', 'Gagal Merubah Member');
		}
		redirect('C_outlet/Tampilkanoutlet');
	}
}

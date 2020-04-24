<?php

class C_service extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('m_service');
		$this->load->helper('url');
	}
	public function TampilkanService()
	{
		$ambil_jenis = $this->m_service->MAmbilJenis();
		$id_outlet = $this->session->userdata('id_outlet');

		foreach ($ambil_jenis as $j) {
			if ($j['jenis_paket'] == 'paketan') {
				$paketan = $this->m_service->MTampilPaket('paketan', $id_outlet);
				$paketan2 = $this->load->view('paket/paket', ['data' => $paketan], true);
			} elseif ($j['jenis_paket'] == 'standar') {
				$standar = $this->m_service->MTampilPaket('standar', $id_outlet);
				$standar2 = $this->load->view('paket/paketA', ['data' => $standar], true);
			}
		}
		$this->load->view('template/backend/header');
		$this->load->view('paket/service', ['standar' => $standar2, 'paketan' => $paketan2]);
	}

	public function MasukanKeranjang($id)
	{

		$id_paket = $id;
		$id_user = $this->session->userdata('id_user');
		$qty = $this->input->post('kuantitas');


		$hasil = $this->m_service->MMasukKeranjang($qty, $id_paket, $id_user);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Masuk Keranjang ');
		} else {
			$this->session->set_flashdata('status', 'Gagal Masuk Keranjang');
		}
		redirect('C_service/TampilkanService');
	}

	public function TampilkanKeranjang()
	{
		$data = $this->m_service->MTampilKeranjang($this->session->userdata('id_user'));
		$this->load->view('template/backend/header');
		$this->load->view('keranjang/keranjang', ['data' => $data]);
	}

	public function ProsesKeranjang()
	{
		$total_harga = $this->input->post('total_bayar');
		$id_member = $this->input->post('id_member');
		$biaya_tambahan = $this->input->post('biaya_tambahan');
		$pajak = $this->input->post('pajak');
		$diskon = $this->input->post('diskon');
		$keterangan = $this->input->post('keterangan');
		$batas_waktu = $this->input->post('batas_waktu');
		$id_user = $this->session->userdata('id_user');
		$id_outlet = $this->session->userdata('id_outlet');
		$hasil = $this->m_service->MProsesKeranjang($id_member, $biaya_tambahan, $pajak, $diskon, $id_user, $id_outlet, $batas_waktu, $total_harga);
		$hasil2 = $this->m_service->MUpdateKeranjang($id_user, $keterangan, $id_member);
		$invoice = $this->m_service->MAmbilDataTransaksi($id_member);
		$invoice2 = array(
			'kode_invoice' => $invoice['kode_invoice']
		);
		$updateStatus = $this->m_service->MUpdateStatus($invoice2['kode_invoice']);


		if ($hasil == true) {
			$this->session->set_userdata($invoice2);
			$this->session->set_flashdata('status', 'Berhasil Checkout, dengan Kode Invoice : ' . $invoice2['kode_invoice']);
		} else {
			$this->session->set_flashdata('status', 'Gagal Checkout');
		}
		redirect('C_service/TampilkanKeranjang');
	}


	public function TampilkanPembayaran()
	{
		$where = [
			'id_outlet' => $this->session->userdata('id_outlet')
		];
		$data = $this->m_service->MTampilPembayaran($where);
		$this->load->view('template/backend/header');
		$this->load->view('proses/pembayaran', ['data' => $data]);
	}

	public function CProsesTampilPembayaran($id_transaksi)
	{
		$data = $this->m_service->MProsesTampilBayar($id_transaksi);
		$this->render_backend('proses/ppembayaran', ['data' => $data, 'judul' => 'Proses Pembayaran']);
	}

	public function CHapusPembayaran($id_transaksi)
	{
		$data = $this->m_service->MHapusPembayaran($id_transaksi);
		redirect('C_service/TampilkanPembayaran');
	}

	public function CProsesBayar($id_transaksi)
	{


		$bayar = $this->input->post('bayar');
		$ambil_total_harga = $this->m_service->MAmbilTotal($id_transaksi);
		$total_harga = $ambil_total_harga['total_harga'];
		$total_bayar = $ambil_total_harga['bayar_transaksi'];
		$total = $bayar + $total_bayar;
		$hasil = $this->m_service->MProsesBayar($id_transaksi, $total, $total_harga);




		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Pembayaran Berhasil ');
		} else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembayaran');
		}

		redirect('C_service/CProsesTampilPembayaran/' . $id_transaksi);
	}

	public function CTampilSelesai($id_transaksi)
	{
		$hasil = $this->m_service->MTampilSelesai($id_transaksi);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Data Berhasil Diperbaharui ');
		} else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembaharuan');
		}

		redirect('C_service/TampilkanPembayaran/');
	}

	public function CProsesTampilPengambilan($id_transaksi)
	{
		$data = $this->m_service->MProsesTampilBayar($id_transaksi);
		$this->render_backend('proses/ppengambilan', ['data' => $data]);
	}

	public function CProsesPengambilan($id_transaksi)
	{
		$hasil = $this->m_service->MProsesPengambilan($id_transaksi);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Data Berhasil Diperbaharui ');
		} else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembaharuan');
		}

		redirect('C_service/TampilkanPembayaran/');
	}
	public function CHapusKeranjang($id_detail_transaksi)
	{
		$this->m_service->MHapusKeranjang($id_detail_transaksi);
		$this->session->set_flashdata('status', 'Cucian berhasil dihapus');
		redirect('C_service/TampilkanKeranjang');
	}
}

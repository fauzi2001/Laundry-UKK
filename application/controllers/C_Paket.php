<?php

class C_paket extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('m_paket');
        $this->load->helper('url');
    }
    public function index()
    {
        $data = $this->m_paket->tampilpaket();
        $this->render_backend('paket/data_paket', ['data' => $data, 'judul' => 'Data Paket']);
    }
    public function formtambahpaketan()
    {
        $outlet = $this->m_paket->tampiloutlet();
        $this->render_backend('paket/tambahpaketan', ['judul' => 'Form Tambah Paketan', 'outlet' => $outlet]);
    }
    public function tambahpaketan()
    {
        $data = [
            'nm_Paket' => $this->input->post('nama'),
            'jenis_paket' => 'paketan',
            'deskripsi_paket' => $this->input->post('deskripsi'),
            'harga_paket' => $this->input->post('harga'),
            'id_outlet' => $this->input->post('outlet')
        ];
        $this->m_paket->tambahpaket($data);
        $this->session->set_flashdata('status', 'Berhasil Menambahkan paket jenis Paketan');
        redirect('C_Paket');
    }
    public function hapus($id)
    {
        $data = $this->m_paket->get_gambar($id);
        unlink(FCPATH . 'assets/image/' . $data['gambar_paket']);
        $this->m_paket->hapuspaket($id);
        $this->session->set_flashdata('status', 'Berhasil Menghapus Paket');
        redirect('C_Paket');
    }
    public function formtambahstandar()
    {
        $outlet = $this->m_paket->tampiloutlet();
        $this->render_backend('paket/tambahstandar', ['judul' => 'Form Tambah standar', 'outlet' => $outlet]);
    }
    public function tambahstandar()
    {
        $gambar = $_FILES['gambar']['name'];
        if ($gambar) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/image/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data = [
                    'nm_Paket' => $this->input->post('nama'),
                    'jenis_paket' => 'standar',
                    'deskripsi_paket' => $this->input->post('deskripsi'),
                    'harga_paket' => $this->input->post('harga'),
                    'id_outlet' => $this->input->post('outlet'),
                    'gambar_paket' => $this->upload->data('file_name')
                ];
                $this->m_paket->tambahpaket($data);
                $this->session->set_flashdata('status', 'Berhasil Menambah Paket jenis paketan');
                redirect('C_Paket');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
    public function formedit($id)
    {
        $outlet = $this->m_paket->tampiloutlet();
        $data = $this->m_paket->get_gambar($id);
        $this->render_backend('paket/editpaket', ['data' => $data, 'judul' => 'Form Edit Paket', 'outlet' => $outlet]);
    }
    public function editpaket($id)
    {
        $gg = $this->m_paket->get_gambar($id);
        $gambar = $_FILES['gambar']['name'];
        if ($gambar) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/image/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gl = $gg['gambar_paket'];
                if ($gl) {
                    unlink(FCPATH . 'assets/image/' . $gl);
                }
                $gb = $this->upload->data('file_name');
                $this->db->set('gambar_paket', $gb);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'nm_Paket' => $this->input->post('nama'),
            'deskripsi_paket' => $this->input->post('deskripsi'),
            'harga_paket' => $this->input->post('harga'),
            'id_outlet' => $this->input->post('outlet')
        ];
        $this->m_paket->editpaket($data, $id);
        $this->session->set_flashdata('status', 'Berhasil Mengedit Paket');
        redirect('C_Paket');
    }
}

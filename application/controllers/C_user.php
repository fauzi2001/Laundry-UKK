<?php

class C_user extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    public function index()
    {
        $data = $this->m_user->tampiluser();
        $this->render_backend('user/data_user', ['user' => $data, 'judul' => 'Data User']);
    }
    public function formtambah()
    {
        $outlet = $this->m_user->tampiloutlet();
        $role = ['admin', 'owner', 'kasir'];
        $this->render_backend('user/tambah_user', ['judul' => 'Form Tambah User', 'outlet' => $outlet, 'role' => $role]);
    }
    public function tambahuser()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]', [
            'required' => 'Tidak Boleh Kosong',
            'is_unique' =>  'username sudah ada'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password1]', [
            'required' => 'Tidak Boleh Kosong',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('outlet', 'Outlet', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $outlet = $this->m_user->tampiloutlet();
            $role = ['admin', 'owner', 'kasir'];
            $this->render_backend('user/tambah_user', ['judul' => 'Form Tambah User', 'outlet' => $outlet, 'role' => $role]);
        } else {
            $data = [
                'nm_user' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'id_outlet' => $this->input->post('outlet'),
                'role' => $this->input->post('role')
            ];
            $this->m_user->tambah($data);
            $this->session->set_flashdata('status', 'Berhasil Menambahkan User');
            redirect('C_user');
        }
    }
    public function hapus($id)
    {
        $this->m_user->hapus($id);
        $this->session->set_flashdata('status', 'Berhasil Menghapus User');
        redirect('C_user');
    }
    public function formedit($id)
    {
        $data['outlet'] = $this->m_user->tampiloutlet();
        $data['role'] = ['admin', 'kasir', 'owner'];
        $data['user'] = $this->m_user->formedit($id);
        $data['judul'] = 'Form Edit User';
        $this->render_backend('user/edit_user', $data);
    }
    public function edituser($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('outlet', 'Outlet', 'trim|required', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        if ($this->form_validation->run() == FALSE) {
        } else {
            $data = [
                'nm_user' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'id_outlet' => $this->input->post('outlet'),
                'role' => $this->input->post('role')
            ];
            $this->m_user->edituser($data, $id);
            $this->session->set_flashdata('status', 'Berhasil Mengedit User');
            redirect('C_user');
        }
    }
}

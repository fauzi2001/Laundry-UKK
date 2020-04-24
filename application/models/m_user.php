<?php
class m_user extends CI_Model
{
    public function tampiluser()
    {
        return $this->db->select('*')
            ->from('tb_user')
            ->join('tb_outlet', 'tb_user.id_outlet = tb_outlet.id_outlet', 'left')
            ->get()->result_array();
    }
    public function tambah($data)
    {
        $this->db->insert('tb_user', $data);
    }
    public function formedit($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }
    public function edituser($data, $id)
    {
        return $this->db->where('id_user', $id)->update('tb_user', $data);
    }
    public function tampiloutlet()
    {
        return $this->db->get('tb_outlet')->result_array();
    }
    public function hapus($id)
    {
        return $this->db->delete('tb_user', ['id_user' => $id]);
    }
}

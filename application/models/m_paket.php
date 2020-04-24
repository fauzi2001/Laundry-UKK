<?php
class m_paket extends CI_Model
{
    public function tampilpaket()
    {
        return $this->db->select('*')
            ->from('tb_paket')
            ->join('tb_outlet', 'tb_outlet.id_outlet = tb_paket.id_outlet', 'left')
            ->get()
            ->result_array();
    }
    public function tampiloutlet()
    {
        return $this->db->get('tb_outlet')->result_array();
    }
    public function tambahpaket($data)
    {
        return $this->db->insert('tb_paket', $data);
    }
    public function hapuspaket($id)
    {
        return $this->db->delete('tb_paket', ['id_paket' => $id]);
    }
    public function get_gambar($id)
    {
        return $this->db->get_where('tb_paket', ['id_paket' => $id])->row_array();
    }
    public function editpaket($data, $id)
    {
        return $this->db->where('id_paket', $id)->update('tb_paket', $data);
    }
}

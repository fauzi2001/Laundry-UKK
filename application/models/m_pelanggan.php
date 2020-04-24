<?php
class m_pelanggan extends CI_Model
{

	public function MTampilMember()
	{
		return $this->db->get('tb_member')->result_array();
	}
	public function MTambahMember($data)
	{
		return $this->db->insert('tb_member', $data) > 0;
	}

	public function ModelhpsMember($id)
	{
		$this->db->where('id_member', $id);
		return $hasil = $this->db->delete('tb_member');
	}

	public function ModeleditMember($id)
	{
		$this->db->where('id_member', $id);
		return $hasil = $this->db->get('tb_member')->row_array();
	}

	public function MProsesEditMember($nm_member, $tlp_member, $alamat_member, $jk, $id)
	{
		$this->db->where('id_member', $id);
		return $this->db->update('tb_member', [
			'id_member' => $id,
			'nm_member' => $nm_member,
			'tlp_member' => $tlp_member,
			'alamat_member' => $alamat_member,
			'jk_member' => $jk
		]) > 0;
	}
}

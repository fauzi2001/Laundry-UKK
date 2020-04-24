<?php 
class m_outlet extends CI_Model
{
	
	public function MTampiloutlet()
	{
		return $this->db->get('tb_outlet')->result_array();
	}
	public function MTambahoutlet($data)
	{
		return $this->db->insert('tb_outlet', $data) > 0;
	}

	public function Modelhpsoutlet($id)
	{
		$this->db->where('id_outlet', $id);
		return $hasil = $this->db->delete('tb_outlet');
	}

	public function Modeleditoutlet($id)
	{
		$this->db->where('id_outlet', $id);
		return $hasil = $this->db->get('tb_outlet')->row_array();
	}

	public function MProsesEditoutlet($nm_outlet, $alamat_outlet, $tlp_outlet, $id)
	{
		$this->db->where('id_outlet', $id);
		return $hasil = $this->db->update('tb_outlet',[
			'id_outlet' => $id,
			'nm_outlet' => $nm_outlet,
			'alamat_outlet' => $alamat_outlet,
			'tlp_outlet'=> $tlp_outlet
		]) > 0;
	}
}
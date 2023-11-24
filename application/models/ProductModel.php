<?php
class ProductModel extends CI_Model
{
	public function getProducts()
	{
		$query = $this->db->get('product');
		return $query->result();
	}
	public function insertProduct($data)
	{
		$this->db->insert('product', $data);
	}

	public function editProduct($id)
	{
		$query = $this->db->get_where('product', ['id' => $id]);
		return $query->row();
	}
	public function updateProduct($id, $data)
	{
		$this->db->update('product', $data, ['id' => $id]);
	}

	public function deleteProduct($id)
	{
		$this->db->delete('product', ['id' => $id]);
	}
}

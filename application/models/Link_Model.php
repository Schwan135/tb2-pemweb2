<?php
class Link_Model extends CI_Model
{
	private $_table = 'link';

    public function tambah_link($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function get_data($email) {
        $this->db->where('email', $email);
        $this->db->group_by('id');
        $query = $this->db->get($this->_table);
        $links = $query->result();
        return $links;
    }

    public function get_links($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);
        $links = $query->result();
        return $links;
    }
}
?>
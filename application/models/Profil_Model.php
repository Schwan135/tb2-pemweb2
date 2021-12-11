<?php
class Profil_Model extends CI_Model {
    const SESSION_KEY = 'user_id';

    public function get_data() {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where('akun', ['email' => $user_id]);
        return $query->row();
    }
}
?>
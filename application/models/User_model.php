<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserTerakhir()
    {
        $query = "SELECT id_user FROM `user` ORDER BY `id_user` DESC LIMIT 1
                    ";
        return $this->db->query($query)->row_array();
    }
}

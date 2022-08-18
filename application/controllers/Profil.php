<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
        $this->load->view('profil/index.php', $data);
        $this->load->view('template/footer.php');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
        $this->load->view('report/index.php');
        $this->load->view('template/footer.php');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dompet'] = $this->db->get_where('dompet', ['id_user' => $data['user']['id_user']])->result_array();
        $this->form_validation->set_rules('dompet', 'Dompet', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header.php');
            $this->load->view('template/sidebar.php');
            $this->load->view('wallet/index.php', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'id_user' => $data['user']['id_user'],
                'nama_dompet' => htmlspecialchars($this->input->post('dompet', true))
            ];
            $this->db->insert('dompet', $data);
            redirect('wallet');
        }
    }
    public function getWallet()
    {
        $id = $this->input->post('id');
        $dompet = $this->db->get_where('dompet', ['id_dompet' => $id])->row_array();
        echo json_encode($dompet);
    }
    public function ubahWallet()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dompet'] = $this->db->get_where('dompet', ['id_user' => $data['user']['id_user']])->result_array();
        $this->form_validation->set_rules('dompet', 'Dompet', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header.php');
            $this->load->view('template/sidebar.php');
            $this->load->view('wallet/index.php', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'id_dompet' => htmlspecialchars($this->input->post('id_dompet', true)),
                'nama_dompet' => htmlspecialchars($this->input->post('dompet', true))
            ];
            $this->db->where('id_dompet', $this->input->post('id_dompet'));
            $this->db->update('dompet', $data);
            redirect('wallet');
        }
    }
    public function hapusWallet($id)
    {
        $this->db->where('id_dompet', $id);
        $this->db->delete('dompet');
        redirect('wallet');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['kategori'] = $this->data->getKategori();
        $data['tanggal'] = $this->data->getTanggal($data['user']['id_user']);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header.php');
            $this->load->view('template/sidebar.php');
            $this->load->view('transaksi/index.php', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'id_user' => $data['user']['id_user'],
                'id_wallet' => htmlspecialchars($this->input->post('dompet', true)),
                'id_kategori' => htmlspecialchars($this->input->post('kategori', true)),
                'tgl' => strtotime($this->input->post('tanggal')),
                'nominal' => htmlspecialchars($this->input->post('nominal', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
            ];
            $this->db->insert('transaksi', $data);
            redirect('transaksi');
        }
    }
    public function getTransaksiId()
    {
        $id = $this->input->post('id');
        $transaksi = $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
        echo json_encode($transaksi);
    }
    public function ubahTransaksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dompet'] = $this->db->get_where('dompet', ['id_user' => $data['user']['id_user']])->result_array();
        $data['kategori'] = $this->data->getKategori();
        $data['tanggal'] = $this->data->getTanggal($data['user']['id_user']);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header.php');
            $this->load->view('template/sidebar.php');
            $this->load->view('transaksi/index.php', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'id_wallet' => htmlspecialchars($this->input->post('dompet', true)),
                'id_kategori' => htmlspecialchars($this->input->post('kategori', true)),
                'tgl' => strtotime($this->input->post('tanggal')),
                'nominal' => htmlspecialchars($this->input->post('nominal', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
            ];
            $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
            $this->db->update('transaksi', $data);
            redirect('transaksi');
        }
    }
    public function hapusTransaksi($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
        redirect('transaksi');
    }
}

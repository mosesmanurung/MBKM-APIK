<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function getKategori()
    {
        $query = "SELECT `kategori`.*, `jenis`.`jenis`
                    FROM `kategori` JOIN `jenis`
                    ON `kategori`.`id_jenis` = `jenis`.`id_jenis`";
        return $this->db->query($query)->result_array();
    }
    public function getTransaksi($tgl)
    {
        $query = "SELECT `transaksi`.*, `kategori`.`nama_kategori`, `kategori`.`icon`, `kategori`.`id_jenis`
                    FROM `transaksi` JOIN `kategori`
                    ON `transaksi`.`id_kategori` = `kategori`.`id_kategori`
                    WHERE `transaksi`.`tgl` = $tgl";
        return $this->db->query($query)->result_array();
    }
    public function getTanggal($id_user)
    {
        $query = "SELECT DISTINCT tgl
                    FROM `transaksi` 
                    WHERE `transaksi`.`id_user` = $id_user";
        return $this->db->query($query)->result_array();
    }
    public function getPemasukkan($tgl)
    {
        $query = "SELECT SUM(transaksi.nominal) AS Pemasukkan, kategori.id_jenis 
        FROM transaksi JOIN kategori 
        WHERE transaksi.id_kategori = kategori.id_kategori AND id_jenis = 1 AND tgl = $tgl";
        return $this->db->query($query)->row_array();
    }
    public function getPengeluaran($tgl)
    {
        $query = "SELECT SUM(transaksi.nominal) AS Pengeluaran, kategori.id_jenis 
        FROM transaksi JOIN kategori 
        WHERE transaksi.id_kategori = kategori.id_kategori AND id_jenis = 2 AND tgl = $tgl";
        return $this->db->query($query)->row_array();
    }
    public function getPemasukkanWallet()
    {
        $query = "SELECT dompet.*, SUM(transaksi.nominal) AS nominal, kategori.id_jenis 
        FROM transaksi, kategori, dompet
        WHERE transaksi.id_kategori = kategori.id_kategori AND transaksi.id_wallet = dompet.id_dompet AND id_jenis = 1 GROUP BY id_dompet";
        return $this->db->query($query)->row_array();
    }
    public function getPengeluaranWallet()
    {
        $query = "SELECT dompet.*, SUM(transaksi.nominal) AS nominal, kategori.id_jenis 
        FROM transaksi, kategori, dompet
        WHERE transaksi.id_kategori = kategori.id_kategori AND transaksi.id_wallet = dompet.id_dompet AND id_jenis = 2 GROUP BY id_dompet";
        return $this->db->query($query)->row_array();
    }
    public function getPemasukkanByWallet($id)
    {
        $query = "SELECT dompet.*, SUM(transaksi.nominal) AS nominal, kategori.id_jenis 
        FROM transaksi, kategori, dompet
        WHERE transaksi.id_kategori = kategori.id_kategori AND transaksi.id_wallet = dompet.id_dompet AND id_jenis = 1 AND id_dompet = $id";
        return $this->db->query($query)->row_array();
    }
    public function getPengeluaranByWallet($id)
    {
        $query = "SELECT dompet.*, SUM(transaksi.nominal) AS nominal, kategori.id_jenis 
        FROM transaksi, kategori, dompet
        WHERE transaksi.id_kategori = kategori.id_kategori AND transaksi.id_wallet = dompet.id_dompet AND id_jenis = 2 AND id_dompet = $id";
        return $this->db->query($query)->row_array();
    }
}

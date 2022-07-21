<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $mobil     = $this->db->query("SELECT * FROM mobil");
        $customer  = $this->db->query("SELECT * FROM customer WHERE role_id='2'");
        $transaksi = $this->db->query("SELECT * FROM transaksi");
        $laporan   = $this->db->query("SELECT * FROM transaksi WHERE status_rental = 'Selesai'");

        $data['mobil']      = $mobil->num_rows();
        $data['customer']   = $customer->num_rows();
        $data['transaksi']  = $transaksi->num_rows();
        $data['laporan']    = $laporan->num_rows();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}

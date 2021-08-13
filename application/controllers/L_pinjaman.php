<?php
Class L_pinjaman extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('M_Laporan');
    }
    public function index() {
        $orders = $this->db->query("SELECT * FROM tbl_pinjam where status='Dipinjam' ");
        $tanggal = date('d-m-Y');
 
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Pinjaman - ".$tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(60, 8, "Pinjam ID", 1, 0, 'C');
        $pdf->Cell(40, 8, "Anggota ID", 1, 0, 'C');
        $pdf->Cell(55, 8, "Buku ID", 1, 0, 'C');
        $pdf->Cell(30, 8, "Status", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach($orders->result_array() as $k => $buku) {
            $this->addRow($pdf, $k+1, $buku);
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - '.$tanggal.'.pdf'); 
    }
 
    private function addRow($pdf, $no, $buku) {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(60, 8, $buku['pinjam_id'], 1, 0, '');
        $pdf->Cell(40, 8, $buku['anggota_id'], 1, 0, '');
        $pdf->Cell(55, 8, $buku['buku_id'], 1, 0, '');
        $pdf->Cell(30, 8, $buku['status'], 1, 0, '');
       
    }
}
    
    
    
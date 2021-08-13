<?php
Class L_buku extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('M_Laporan');
    }
    public function index() {
        $orders = $this->M_Laporan->get_all();
        $tanggal = date('d-m-Y');
 
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Buku - ".$tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(60, 8, "title", 1, 0, 'C');
        $pdf->Cell(40, 8, "Tanggal Masuk", 1, 0, 'C');
        $pdf->Cell(55, 8, "Lampiran", 1, 0, 'C');
        $pdf->Cell(30, 8, "Jumlah", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach($orders->result_array() as $k => $buku) {
            $this->addRow($pdf, $k+1, $buku);
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - '.$tanggal.'.pdf'); 
    }
 
    private function addRow($pdf, $no, $buku) {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(60, 8, $buku['title'], 1, 0, '');
       
        $pdf->Cell(40, 8, date('d-m-Y', strtotime($buku['tgl_masuk'])), 1, 0, 'C');
        $pdf->Cell(55, 8, $buku['pengarang'], 1, 0, 'C');
        $pdf->Cell(30, 8, $buku['jml'], 1, 0, '');
    }
}
    
    
    
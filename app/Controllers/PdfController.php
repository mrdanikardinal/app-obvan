<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;
use App\Models\OutBroadcastModel;
use App\Models\NomorSuratTugasModel;
use App\Models\CrewObModel;
use CodeIgniter\Controller;
use TCPDF;
use TCPDF_FONTS;

class PdfController extends Controller
{

    protected $peminjamanAlatModel;
    protected $outBroadcast;
    protected $allUser;
    protected $crewOb;
    protected $nomorSuratTugasModel;
    protected $varFontPDF;



    public function __construct()
    {
        $this->outBroadcast = new OutBroadcastModel();
        $this->peminjamanAlatModel = new PeminjamanAlatModel();
        $this->allUser = new UsersModel();
        $this->crewOb = new CrewObModel();
        $this->nomorSuratTugasModel = new NomorSuratTugasModel();
        $this->varFontPDF = new TCPDF_FONTS();
    }
    public function index()
    {
        // Panggil metode untuk membuat PDF
        // $this->generatePdf();

    }


    // public function print_penerima_pinjam($idPjm)
    // {
    //     // dd($this->users->proceduregetParentMerkFromIdPjm(200));
    //     $data = [
    //         'testing' => $this->allUser->proceduregetPrintIdPJMNamaPenerima($idPjm),
    //         'dataBarangDipinjam' => $this->allUser->proceduregetParentMerkFromIdPjm($idPjm)
    //     ];

    //     $test = view('user/penerima_pinjam', $data);
    //     // $test = view('user/index');
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

    //     $pdf->AddPage();
    //     $pdf->writeHTML($test);
    //     // $pdf->writeHTML($test, true, false, false, false, '');
    //     // $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
    //     $this->response->setContentType('application/pdf');
    //     return $pdf->Output('sample.pdf', 'I');
    // }
    public function print_penerima_pinjam($idPjm)
    {
        // dd($this->users->proceduregetParentMerkFromIdPjm(200));
        $data = [
            'testing' => $this->allUser->proceduregetPrintIdPJMNamaPenerima($idPjm),
            'dataBarangDipinjam' => $this->allUser->proceduregetParentMerkFromIdPjm($idPjm)
        ];

        $test = view('user/penerima_pinjam', $data);
        // $test = view('user/index');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->AddPage();
        $pdf->writeHTML($test);
        // $pdf->writeHTML($test, true, false, false, false, '');
        // $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('sample.pdf', 'I');
    }
    // public function print_pemberi_pinjam($idPjm)
    // {
    //     // $test=0001;
    //     // dd($this->users->proceduregetPrintIdPJMNamaPemberi('pjs'.'-'.$test));
    //     $data = [
    //         'testing' => $this->allUser->proceduregetPrintIdPJMNamaPemberi($idPjm),
    //         'dataBarangDipinjam' => $this->allUser->proceduregetParentMerkFromIdPjm($idPjm)
    //     ];

    //     $test = view('user/pemberi_pinjam', $data);
    //     // $test = view('user/index');
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //     $pdf->AddPage();
    //     $pdf->writeHTML($test);
    //     // $pdf->writeHTML($test, true, false, false, false, '');
    //     // $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
    //     $this->response->setContentType('application/pdf');
    //     return $pdf->Output('sample.pdf', 'I');
    // }
    public function print_pemberi_pinjam($idPeminjamanAlat)
    {
        // dd($this->peminjamanAlatModel->getOBJoinNamaPemberiJoinNamaPenerima($idOb));
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinPeminjamanJoinUsers = $this->peminjamanAlatModel->getOBJoinNamaPemberiJoinNamaPenerima($idPeminjamanAlat);
        foreach ($varprocedureGetShowJoinPeminjamanJoinUsers as $valueOb) {
            if ($valueOb['nomor_surat'] == null) {
                $this->peminjamanAlatModel->save([
                    'id_pinjam' => $idPeminjamanAlat,
                    'nomor_surat' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
        }
            // $data = [
            //     'testing' => $this->allUser->proceduregetPrintIdPJMNamaPemberi($idPjm),
            //     'dataBarangDipinjam' => $this->allUser->proceduregetParentMerkFromIdPjm($idPjm)
            // ];


        $data = [
            'showGetPeminjamanAlatJoinUsers' => $varprocedureGetShowJoinPeminjamanJoinUsers,
            // 'allUsers' => $this->allUser->getUsers(),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 11);

        // $pdf->SetFont('verdana_bold', 'B', 12);
        // $fontname=$pdf->addTTFfont('ssets/font/times new roman.ttf/times new roman.ttf', '', '', 32);
        // $pdf->SetFont('times new roman', null, 12,'assets/font/times new roman.ttf');
        // set default monospaced font
        // $pdf->setDefaultMonospacedFont($fontname);
        // set default font subsetting mode
        // $pdf->setFontSubsetting(false);
        // Set font

        // $pdf->SetFont('times new roman', '', 12,'assets/font/times new roman.ttf');


        $test = view('user/pemberi_pinjam', $data);
        // $pdf->writeHTML($test, true, 0, true, true);
        $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('pemberi pinjam.pdf', 'I');
    }
    // public function out_broadcast()
    // {
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    //     // $test=0001;
    //     // dd($this->users->proceduregetPrintIdPJMNamaPemberi('pjs'.'-'.$test));
    //     // $data = [
    //     //     'testing' => $this->users->proceduregetPrintIdPJMNamaPemberi($idPjm),
    //     //     'dataBarangDipinjam' => $this->users->proceduregetParentMerkFromIdPjm($idPjm)
    //     // ];

    //     // $test = view('user/pemberi_pinjam', $data);

    //     $test = view('user/out_broadcast');
    //     // $test = view('user/credit_note_sample');
    //     // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //     $pdf->AddPage();
    //     $pdf->writeHTML($test);
    //     $pdf->setPrintHeader(false);
    //     $pdf->setPrintFooter(false);
    //     // $pdf->writeHTML($test, true, false, false, false, '');
    //     // $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
    //     $this->response->setContentType('application/pdf');
    //     return $pdf->Output('sample.pdf', 'I');
    // }
    //dibawah adalah function OK no Header
    // public function out_broadcast()
    // {
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //     $pdf->setPrintHeader(false);
    //     $pdf->setPrintFooter(false);

    //     $pdf->AddPage();
    //     $test = view('user/out_broadcast');
    //     $pdf->writeHTML($test);
    //     $this->response->setContentType('application/pdf');
    //     return $pdf->Output('example_002.pdf', 'I');
    // }
    //diatas adalah function OK no Header
    //sample ini juga OK
    //=============================================================
    public function out_broadcast_preview($idOb)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->outBroadcast->procedureGetShowObJoinKategoriCariById($idOb);
        foreach ($varprocedureGetShowJoinKategoriByIdOb as $valueOb) {
            if ($valueOb['nomor_surat'] == null) {
                $this->outBroadcast->save([
                    'id_ob' => $idOb,
                    'nomor_surat' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
        }

        $data = [
            'showAllJoinsOBKategoriByIDOB' => $varprocedureGetShowJoinKategoriByIdOb,
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            'allUsers' => $this->allUser->getUsers(),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 11);

        // $pdf->SetFont('verdana_bold', 'B', 12);
        // $fontname=$pdf->addTTFfont('ssets/font/times new roman.ttf/times new roman.ttf', '', '', 32);
        // $pdf->SetFont('times new roman', null, 12,'assets/font/times new roman.ttf');
        // set default monospaced font
        // $pdf->setDefaultMonospacedFont($fontname);
        // set default font subsetting mode
        // $pdf->setFontSubsetting(false);
        // Set font

        // $pdf->SetFont('times new roman', '', 12,'assets/font/times new roman.ttf');


        $test = view('user/out_broadcast', $data);
        // $pdf->writeHTML($test, true, 0, true, true);
        $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('out broadcast.pdf', 'I');
    }
    //==============================================================
    public function out_broadcast_download($idOb)
    {
        // dd($this->nomorSuratTugasModel->autoNomorSurat());
        // dd($this->outBroadcast->procedureGetShowObJoinKategoriCariById($idOb));
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->outBroadcast->procedureGetShowObJoinKategoriCariById($idOb);

        // if ($varNomorSuratAuto == null) {
        //     $this->outBroadcast->save([
        //         'id_ob' => $idOb,
        //         'nomor_surat' => $varNomorSuratAuto
        //     ]);
        // }
        $acara = null;
        $lokasi = null;
        // $nomorSuratPdf = null;
        foreach ($varprocedureGetShowJoinKategoriByIdOb as $valueOb) {
            if ($valueOb['nomor_surat'] == null) {
                $this->outBroadcast->save([
                    'id_ob' => $idOb,
                    'nomor_surat' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }

            $acara = $valueOb['acara'];
            $lokasi = $valueOb['lokasi'];
            // $nomorSuratPdf = $valueOb['nomor_surat'];
        }

        $data = [
            // 'allShowOutBroadcast' => $this->outBroadcast->procedureGetAllShowOutBroadcast(),
            'showAllJoinsOBKategoriByIDOB' => $varprocedureGetShowJoinKategoriByIdOb,
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            'allUsers' => $this->allUser->getUsers(),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $userLogin = user();
        // $filename = 'testing';
        // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->AddPage();
        $test = view('user/out_broadcast', $data);
        // $pdf->writeHTML($test);
        $pdf->writeHTML($test, true, 0, true, true);
        // output the HTML content
        // $pdf->writeHTML($test, true, false, true, false, '');
        // $pdf->lastPage();
        // $pdf->Write(0, 'Example of HTML Justification', '', 0, 'L', true, 0, false, false, 0);
        $this->response->setContentType('application/pdf');
        // return file_put_contents($filename . '.pdf', $pdf->Output('I'));
        return $pdf->Output($acara . '_lokasi_' . $lokasi . '_out broadcast.pdf', 'D');
    }

    //end sample ini juga OK



}

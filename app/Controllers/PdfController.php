<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;
use App\Models\OutBroadcastModel;
use App\Models\NomorSuratTugasModel;
use App\Models\CrewObModel;
use App\Models\DinasShiftingModel;
use App\Models\ParentAlatObModel;
use App\Models\ParentMerkModel;
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
    protected $parenMerkPeminjaman;
    protected $parentPeralatanOB;
    protected $dinasShiftingModel;



    public function __construct()
    {
        $this->outBroadcast = new OutBroadcastModel();
        $this->peminjamanAlatModel = new PeminjamanAlatModel();
        $this->allUser = new UsersModel();
        $this->crewOb = new CrewObModel();
        $this->nomorSuratTugasModel = new NomorSuratTugasModel();
        $this->varFontPDF = new TCPDF_FONTS();
        $this->parenMerkPeminjaman = new ParentMerkModel();
        $this->parentPeralatanOB = new ParentAlatObModel();
        $this->dinasShiftingModel = new DinasShiftingModel();
    }
    public function index()
    {
        // Panggil metode untuk membuat PDF
        // $this->generatePdf();

    }
    // ================================================= Start Permberi Pinjam
    public function print_pemberi_pinjam_preview($idPeminjamanAlat)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinPeminjamanJoinUsers = $this->peminjamanAlatModel->getOBJoinNamaPemberiJoinNamaPemberi($idPeminjamanAlat);
        // strat function auto
        foreach ($varprocedureGetShowJoinPeminjamanJoinUsers as $valueOb) {
            if ($valueOb['nomor_surat_pemberi'] == null) {
                $this->peminjamanAlatModel->save([
                    'id_pinjam' => $idPeminjamanAlat,
                    'nomor_surat_pemberi' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
        }
        // end function auto
   
        $data = [
            'showGetPeminjamanAlatJoinUsers' => $varprocedureGetShowJoinPeminjamanJoinUsers,
            'showAllDataPeminjamanAlat' => $this->parenMerkPeminjaman->getParentViews($idPeminjamanAlat),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
    

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/pemberi_pinjam', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        // return $pdf->Output('Penerima pinjam.pdf', 'I');
        return $pdf->Output('pemberi pinjam.pdf', 'I');
    }
    public function print_pemberi_pinjam_download($idPeminjamanAlat)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinPeminjamanJoinUsers = $this->peminjamanAlatModel->getOBJoinNamaPemberiJoinNamaPemberi($idPeminjamanAlat);
        $acara = null;
        $tempat = null;
        // $id = null;
        $pemberiPinjam = null;
        foreach ($varprocedureGetShowJoinPeminjamanJoinUsers as $valueOb) {
            if ($valueOb['nomor_surat_pemberi'] == null) {
                $this->peminjamanAlatModel->save([
                    'id_pinjam' => $idPeminjamanAlat,
                    'nomor_surat_pemberi' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }

            $acara = $valueOb['acara'];
            $tempat = $valueOb['tempat'];
            $pemberiPinjam = $valueOb['fullname'];
        }

        $data = [
            'showGetPeminjamanAlatJoinUsers' => $varprocedureGetShowJoinPeminjamanJoinUsers,
            'showAllDataPeminjamanAlat' => $this->parenMerkPeminjaman->getParentViews($idPeminjamanAlat),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->SetFont('times', 'B', 11);

        // $html = view('user/pemberi_pinjam', $data);
        // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // $this->response->setContentType('application/pdf');
        // // return $pdf->Output('pemberi pinjam.pdf', 'I');
        // return $pdf->Output('ID_' . $idPeminjamanAlat . '_' . $acara . '_' . $tempat . '_' . $pemberiPinjam . '_pemberi pinjam.pdf', 'D');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/pemberi_pinjam', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        // return $pdf->Output('Penerima pinjam.pdf', 'I');
        return $pdf->Output('ID_' . $idPeminjamanAlat . '_' . $acara . '_' . $tempat . '_' . $pemberiPinjam . '_pemberi pinjam.pdf', 'D');
    }
    // =================================================End Permberi Pinjam

    public function print_penerima_pinjam_preview($idPeminjamanAlat)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinPeminjamanJoinUsers = $this->peminjamanAlatModel->getOBJoinNamaPemberiJoinNamaPenerima($idPeminjamanAlat);
        foreach ($varprocedureGetShowJoinPeminjamanJoinUsers as $valueOb) {
            if ($valueOb['nomor_surat_penerima'] == null) {
                $this->peminjamanAlatModel->save([
                    'id_pinjam' => $idPeminjamanAlat,
                    'nomor_surat_penerima' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
        }

        $data = [
            'showGetPeminjamanAlatJoinUsers' => $varprocedureGetShowJoinPeminjamanJoinUsers,
            'showAllDataPeminjamanAlat' => $this->parenMerkPeminjaman->getParentViews($idPeminjamanAlat),
            'autoNomorSurat' => $varNomorSuratAuto

        ];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/penerima_pinjam', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        return $pdf->Output('Penerima pinjam.pdf', 'I');
    }
    public function print_penerima_pinjam_download($idPeminjamanAlat)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $acara = null;
        $tempat = null;
        $PenerimaPinjam = null;
        $varprocedureGetShowJoinPeminjamanJoinUsers = $this->peminjamanAlatModel->getOBJoinNamaPemberiJoinNamaPenerima($idPeminjamanAlat);
        foreach ($varprocedureGetShowJoinPeminjamanJoinUsers as $valueOb) {
            if ($valueOb['nomor_surat_penerima'] == null) {
                $this->peminjamanAlatModel->save([
                    'id_pinjam' => $idPeminjamanAlat,
                    'nomor_surat_penerima' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
            $acara = $valueOb['acara'];
            $tempat = $valueOb['tempat'];
            $PenerimaPinjam = $valueOb['fullname'];
        }

        $data = [
            'showGetPeminjamanAlatJoinUsers' => $varprocedureGetShowJoinPeminjamanJoinUsers,
            'showAllDataPeminjamanAlat' => $this->parenMerkPeminjaman->getParentViews($idPeminjamanAlat),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->SetFont('times', 'B', 11);

        // $html = view('user/penerima_pinjam', $data);
        // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // $this->response->setContentType('application/pdf');
        // // return $pdf->Output('Penerima pinjam.pdf', 'I');
        // return $pdf->Output('ID_' . $idPeminjamanAlat . '_' . $acara . '_' . $tempat . '_' . $PenerimaPinjam . '_penerima pinjam.pdf', 'D');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/penerima_pinjam', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        // return $pdf->Output('dinas Shifting.pdf', 'I');
        // return $pdf->Output('ID_' . $idDinasShitf . '_Tanggal_' . $tanggal . '_' . $shif . '_dinas Shifting.pdf', 'D');
        return $pdf->Output('ID_' . $idPeminjamanAlat . '_' . $acara . '_' . $tempat . '_' . $PenerimaPinjam . '_penerima pinjam.pdf', 'D');
    }

    public function peralatan_out_outbroadcast_preview($idOb)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->outBroadcast->procedureGetShowObJoinKategoriCariById($idOb);
        // dd($this->outBroadcast->procedureGetShowObJoinKategoriCariById($idOb));
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
            'showAllJoinsOBKategoriByIDOB' => $this->parentPeralatanOB->getJoinOBAndAlatINV($idOb),
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            // 'allUsers' => $this->allUser->getUsers(),
            'autoNomorSurat' => $varNomorSuratAuto,
            'getShowObByIdOB' => $this->outBroadcast->getShowOutBroadcast($idOb)

        ];



        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 11);
        $html = view('user/peralatan_out_broadcast', $data);
        // $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
        $pdf->writeHTML($html, true, false, false, false, '');
        // $pdf->writeHTML($tbl, true, false, false, false, '');

        $this->response->setContentType('application/pdf');
        return $pdf->Output('peralatan_out_broadcast.pdf', 'I');
    }
    public function peralatan_out_outbroadcast_download($idOb)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->outBroadcast->procedureGetShowObJoinKategoriCariById($idOb);
        $acara = null;
        $lokasi = null;
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
        }
        // dd($this->outBroadcast->getShowOutBroadcast($idOb));
        // dd($this->parentPeralatanOB->getJoinOBAndAlatINV($idOb));

        $data = [
            'showAllJoinsOBKategoriByIDOB' => $this->parentPeralatanOB->getJoinOBAndAlatINV($idOb),
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            // 'allUsers' => $this->allUser->getUsers(),
            'autoNomorSurat' => $varNomorSuratAuto,
            'getShowObByIdOB' => $this->outBroadcast->getShowOutBroadcast($idOb)

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


        $test = view('user/peralatan_out_broadcast', $data);
        // $pdf->writeHTML($test, true, 0, true, true);
        $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
        $this->response->setContentType('application/pdf');
        // return $pdf->Output('peralatan_out_broadcast.pdf', 'D');
        return $pdf->Output('ID_' . $idOb . '_' . $acara . '_lokasi_' . $lokasi . '_pemakaian_peralatan_out_broadcast.pdf', 'D');
    }

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
        $pdf->SetFont('times', 'B', 11);
        $pdf->AddPage();
        $html = view('user/out_broadcast', $data);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
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
        $pdf->SetFont('times', 'B', 11);
        $pdf->AddPage();
        $htlm = view('user/out_broadcast', $data);
        $pdf->writeHTML($htlm, true, 0, true, true);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('ID_' . $idOb . '_' . $acara . '_lokasi_' . $lokasi . '_out broadcast.pdf', 'D');
    }


    public function dinas_shifting_preview($idDinasShitf)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->dinasShiftingModel->getDinasShiftDanLemburJoinCrewDinasShifAcara($idDinasShitf);

        foreach ($varprocedureGetShowJoinKategoriByIdOb as $valueOb) {
            if ($valueOb['nomor_surat'] == null) {
                $this->dinasShiftingModel->save([
                    'id_dinas_shifting' => $idDinasShitf,
                    'nomor_surat' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
        }

        $data = [
            'showAllDinasShiftingJoinIdDinasIdShifIdAcara' => $varprocedureGetShowJoinKategoriByIdOb,
            'allDataCrewShiftingJoinUsers' => $this->dinasShiftingModel->procedureGetShowCrewDinasShifting($idDinasShitf),
            'autoNomorSurat' => $varNomorSuratAuto

        ];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // $pdf->writeHTML($html, true, false, true, false, '');
        // $jumlah_halaman = $pdf->getNumPages();


        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/shifting', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        return $pdf->Output('dinas Shifting.pdf', 'I');
    }
    public function dinas_shifting_download($idDinasShitf)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->dinasShiftingModel->getDinasShiftDanLemburJoinCrewDinasShifAcara($idDinasShitf);

        $tanggal = null;
        $shif = null;

        foreach ($varprocedureGetShowJoinKategoriByIdOb as $valueOb) {
            if ($valueOb['nomor_surat'] == null) {
                $this->dinasShiftingModel->save([
                    'id_dinas_shifting' => $idDinasShitf,
                    'nomor_surat' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }

            $tanggal = $valueOb['tanggal'];
            $shif = $valueOb['nama_acara_shift'];
        }



        $data = [
            'showAllDinasShiftingJoinIdDinasIdShifIdAcara' => $varprocedureGetShowJoinKategoriByIdOb,
            'allDataCrewShiftingJoinUsers' => $this->dinasShiftingModel->procedureGetShowCrewDinasShifting($idDinasShitf),
            'autoNomorSurat' => $varNomorSuratAuto

        ];


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/shifting', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        // return $pdf->Output('dinas Shifting.pdf', 'I');
        return $pdf->Output('ID_' . $idDinasShitf . '_Tanggal_' . $tanggal . '_' . $shif . '_dinas Shifting.pdf', 'D');
    }
    //=======================================================End Dinas Shifting
    public function dinas_lembur_preview($idDinasShitf)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->dinasShiftingModel->getDinasShiftDanLemburJoinCrewDinasShifAcara($idDinasShitf);

        foreach ($varprocedureGetShowJoinKategoriByIdOb as $valueOb) {
            if ($valueOb['nomor_surat_lembur'] == null) {
                $this->dinasShiftingModel->save([
                    'id_dinas_shifting' => $idDinasShitf,
                    'nomor_surat_lembur' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
        }

        $data = [
            'showAllDinasShiftingJoinIdDinasIdShifIdAcara' => $varprocedureGetShowJoinKategoriByIdOb,
            'allDataCrewShiftingJoinUsers' => $this->dinasShiftingModel->procedureGetShowCrewDinasShifting($idDinasShitf),
            'autoNomorSurat' => $varNomorSuratAuto

        ];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // $pdf->writeHTML($html, true, false, true, false, '');
        // $jumlah_halaman = $pdf->getNumPages();


        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/lembur', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        // $pdf->setTextColor(0, 0, 108); // biru navy
        $pdf->setTextColor(12, 75, 146); // biru navy 
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);

        $this->response->setContentType('application/pdf');
        return $pdf->Output('dinas Lembur.pdf', 'I');
    }
    public function dinas_lembur_download($idDinasShitf)
    {
        $varNomorSuratAuto = $this->nomorSuratTugasModel->autoNomorSurat();
        $varprocedureGetShowJoinKategoriByIdOb = $this->dinasShiftingModel->getDinasShiftDanLemburJoinCrewDinasShifAcara($idDinasShitf);
        // dd($varprocedureGetShowJoinKategoriByIdOb['tanggal']);
        $tanggal = null;
        $shif = null;
        foreach ($varprocedureGetShowJoinKategoriByIdOb as $valueOb) {
            if ($valueOb['nomor_surat_lembur'] == null) {
                $this->dinasShiftingModel->save([
                    'id_dinas_shifting' => $idDinasShitf,
                    'nomor_surat_lembur' => $varNomorSuratAuto
                ]);
                $this->nomorSuratTugasModel->save([
                    'nomor_surat' => $varNomorSuratAuto
                ]);
            }
            $tanggal = $valueOb['tanggal'];
            $shif = $valueOb['nama_acara_shift'];
        }

        $data = [
            'showAllDinasShiftingJoinIdDinasIdShifIdAcara' => $varprocedureGetShowJoinKategoriByIdOb,
            'allDataCrewShiftingJoinUsers' => $this->dinasShiftingModel->procedureGetShowCrewDinasShifting($idDinasShitf),
            'autoNomorSurat' => $varNomorSuratAuto

        ];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // $pdf->writeHTML($html, true, false, true, false, '');
        // $jumlah_halaman = $pdf->getNumPages();


        $pdf->setPrintHeader(false);
        $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));
        // Atur margin
        $pdf->SetMargins(15, 15, 15); // Atur margin atas, kiri, dan kanan
        $pdf->SetAutoPageBreak(true, 4); // Atur auto page break dan margin bawah
        // Tambahkan halaman
        $pdf->SetFont('helvetica', 'B', 11);

        $html = view('user/lembur', $data);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-20); // Geser posisi ke atas agar ada ruang untuk footer
        $pdf->SetFont('helvetica', 'B', 7);
        // $pdf->setTextColor(51, 49, 112); // Warna biru tua
        $pdf->setTextColor(0, 0, 108); // Warna biru tua
        // Kolom 1
        $pdf->MultiCell(60, 5, 'LEMBAGA PENYIARAN PUBLIK
TELEVISI REPUBLIK INDONESIA
', 0, 'L', false, 0, '', '', true, 0, false, true, 0);
        // $pdf->setTextColor(255, 255, 255); // Mengembalikan warna fill ke default
        // Kolom 2
        $pdf->SetXY(112, -20); // Geser posisi ke kolom 2
        $pdf->MultiCell(60, 5, 'Jl.Gerbang Pemuda,No. 8,
Senayan, Jakarat 10270
', 0, 'C', false, 0, '', '', true, 0, false, true, 0);

        // Kolom 3
        $pdf->SetXY(140, -20); // Geser posisi ke kolom 3
        $pdf->MultiCell(60, 5, 'P 021-570 4720
P 021-570 4740
F 021-573 3122
www.tvri.go.id
', 0, 'R', false, 0, '', '', true, 0, false, true, 0);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('ID_' . $idDinasShitf . '_Tanggal_' . $tanggal . '_' . $shif . '_dinas Lembur.pdf', 'D');
    }
}

<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;
use App\Models\OutBroadcastModel;
use App\Models\CrewObModel;

use CodeIgniter\Controller;
use TCPDF;

class PdfController extends Controller
{

    protected $peminjamanAlatModel;
    protected $outBroadcast;
    protected $allUser;
    protected $crewOb;



    public function __construct()
    {
        $this->outBroadcast = new OutBroadcastModel();
        $this->peminjamanAlatModel = new PeminjamanAlatModel();
        $this->allUser = new UsersModel();
        $this->crewOb = new CrewObModel();
    }
    public function index()
    {
        // Panggil metode untuk membuat PDF
        // $this->generatePdf();

    }
    //versi 1
    // private function generatePdf()
    // {
    //     // Buat objek TCPDF
    //     $pdf = new TCPDF();

    //     // Atur propertis dokumen
    //     $pdf->SetCreator('Your Name');
    //     $pdf->SetAuthor('Your Name');
    //     $pdf->SetTitle('Sample PDF');

    //     // Tambahkan konten ke PDF
    //     $pdf->AddPage();
    //     $pdf->SetFont('dejavusans', 'B', 16);
    //     $pdf->Cell(40, 10, 'Hello, World!');
    //     // penting
    //     $this->response->setContentType('application/pdf');
    //     // header('Content-Type: application/pdf');

    //     // endpenting
    //     // Simpan atau tampilkan PDF
    //     $pdf->Output('sample.pdf', 'I');
    // }
    //End Versi 1
    //versi 2
    //     private function generatePdf()
    //     {
    //         // Buat objek TCPDF
    //         $pdf = new TCPDF();
    //         // set document information
    //         $pdf->SetCreator(PDF_CREATOR);
    //         $pdf->SetAuthor('Nicola Asuni');
    //         $pdf->SetTitle('TCPDF Example 001');
    //         $pdf->SetSubject('TCPDF Tutorial');
    //         $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    //         // set default header data
    //         $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
    //         $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

    //         // set header and footer fonts
    //         $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    //         $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    //         // set default monospaced font
    //         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //         // set margins
    //         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    //         $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //         $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //         // set auto page breaks
    //         $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //         // set image scale factor
    //         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //         // set some language-dependent strings (optional)
    //         if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    //             require_once(dirname(__FILE__) . '/lang/eng.php');
    //             $pdf->setLanguageArray($l);
    //         }

    //         // ---------------------------------------------------------

    //         // set default font subsetting mode
    //         $pdf->setFontSubsetting(true);

    //         // Set font
    //         // dejavusans is a UTF-8 Unicode font, if you only need to
    //         // print standard ASCII chars, you can use core fonts like
    //         // helvetica or times to reduce file size.
    //         $pdf->SetFont('dejavusans', '', 14, '', true);

    //         // Add a page
    //         // This method has several options, check the source code documentation for more information.
    //         $pdf->AddPage();

    //         // set text shadow effect
    //         $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    //         // Set some content to print
    //         $html = <<<EOD
    // <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    // <i>This is the first example of TCPDF library.</i>
    // <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    // <p>Please check the source code documentation and other examples for further information.</p>
    // <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
    // EOD;

    //         // Print text using writeHTMLCell()
    //         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    //         // ---------------------------------------------------------
    //         $this->response->setContentType('application/pdf');

    //         // Close and output PDF document
    //         // This method has several options, check the source code documentation for more information.
    //         $pdf->Output('example_001.pdf', 'I');

    //         //============================================================+
    //         // END OF FILE
    //         //============================================================+

    //     }
    //End Versi 2
    //     public function generatePdf()
    //     {
    //         // create new PDF document
    //         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //         // set document information
    //         $pdf->SetCreator(PDF_CREATOR);
    //         $pdf->SetAuthor('Nicola Asuni');
    //         $pdf->SetTitle('TCPDF Example 048');
    //         $pdf->SetSubject('TCPDF Tutorial');
    //         $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    //         // set default header data
    //         $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 048', PDF_HEADER_STRING);

    //         // set header and footer fonts
    //         $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    //         $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    //         // set default monospaced font
    //         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //         // set margins
    //         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    //         $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //         $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //         // set auto page breaks
    //         $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //         // set image scale factor
    //         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //         // set some language-dependent strings (optional)
    //         if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    //             require_once(dirname(__FILE__) . '/lang/eng.php');
    //             $pdf->setLanguageArray($l);
    //         }

    //         // ---------------------------------------------------------

    //         // set font
    //         $pdf->SetFont('helvetica', 'B', 20);

    //         // add a page
    //         $pdf->AddPage();

    //         $pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

    //         $pdf->SetFont('helvetica', '', 8);

    //         // -----------------------------------------------------------------------------

    //         $tbl = <<<EOD
    //     <table cellspacing="0" cellpadding="1" border="1">
    //     <tr>
    //         <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
    //         <td>COL 2 - ROW 1</td>
    //         <td>COL 3 - ROW 1</td>
    //     </tr>
    //     <tr>
    //         <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    //         <td>COL 3 - ROW 2</td>
    //     </tr>
    //     <tr>
    //        <td>COL 3 - ROW 3</td>
    //     </tr>

    // </table>
    // EOD;
    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------

    //         $tbl = <<<EOD
    //             <table cellspacing="0" cellpadding="1" border="1">
    //     <tr>
    //         <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
    //         <td>COL 2 - ROW 1</td>
    //         <td>COL 3 - ROW 1</td>
    //     </tr>
    //     <tr>
    //         <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    //          <td>COL 3 - ROW 2</td>
    //     </tr>
    //     <tr>
    //        <td>COL 3 - ROW 3</td>
    //     </tr>

    // </table>
    // EOD;

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------

    //         $tbl = <<<EOD
    // <table cellspacing="0" cellpadding="1" border="1">
    //     <tr>
    //         <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
    //         <td>COL 2 - ROW 1</td>
    //         <td>COL 3 - ROW 1</td>
    //     </tr>
    //     <tr>
    //         <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    //          <td>COL 3 - ROW 2<br />text line<br />text line</td>
    //     </tr>
    //     <tr>
    //        <td>COL 3 - ROW 3</td>
    //     </tr>

    // </table>
    // EOD;

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------

    //         $tbl = <<<EOD
    // <table border="1">
    // <tr>
    // <th rowspan="3">Left column</th>
    // <th colspan="5">Heading Column Span 5</th>
    // <th colspan="9">Heading Column Span 9</th>
    // </tr>
    // <tr>
    // <th rowspan="2">Rowspan 2<br />This is some text that fills the table cell.</th>
    // <th colspan="2">span 2</th>
    // <th colspan="2">span 2</th>
    // <th rowspan="2">2 rows</th>
    // <th colspan="8">Colspan 8</th>
    // </tr>
    // <tr>
    // <th>1a</th>
    // <th>2a</th>
    // <th>1b</th>
    // <th>2b</th>
    // <th>1</th>
    // <th>2</th>
    // <th>3</th>
    // <th>4</th>
    // <th>5</th>
    // <th>6</th>
    // <th>7</th>
    // <th>8</th>
    // </tr>
    // </table>
    // EOD;

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------

    //         // Table with rowspans and THEAD
    //         $tbl = <<<EOD
    // <table border="1" cellpadding="2" cellspacing="2">
    // <thead>
    //  <tr style="background-color:#FFFF00;color:#0000FF;">
    //   <td width="30" align="center"><b>A</b></td>
    //   <td width="140" align="center"><b>XXXX</b></td>
    //   <td width="140" align="center"><b>XXXX</b></td>
    //   <td width="80" align="center"> <b>XXXX</b></td>
    //   <td width="80" align="center"><b>XXXX</b></td>
    //   <td width="45" align="center"><b>XXXX</b></td>
    //  </tr>
    //  <tr style="background-color:#FF0000;color:#FFFF00;">
    //   <td width="30" align="center"><b>B</b></td>
    //   <td width="140" align="center"><b>XXXX</b></td>
    //   <td width="140" align="center"><b>XXXX</b></td>
    //   <td width="80" align="center"> <b>XXXX</b></td>
    //   <td width="80" align="center"><b>XXXX</b></td>
    //   <td width="45" align="center"><b>XXXX</b></td>
    //  </tr>
    // </thead>
    //  <tr>
    //   <td width="30" align="center">1.</td>
    //   <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
    //   <td width="140">XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td width="80">XXXX</td>
    //   <td align="center" width="45">XXXX<br />XXXX</td>
    //  </tr>
    //  <tr>
    //   <td width="30" align="center" rowspan="3">2.</td>
    //   <td width="140" rowspan="3">XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td align="center" width="45">XXXX<br />XXXX</td>
    //  </tr>
    //  <tr>
    //   <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td align="center" width="45">XXXX<br />XXXX</td>
    //  </tr>
    //  <tr>
    //   <td width="80" rowspan="2" >RRRRRR<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td align="center" width="45">XXXX<br />XXXX</td>
    //  </tr>
    //  <tr>
    //   <td width="30" align="center">3.</td>
    //   <td width="140">XXXX1<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td align="center" width="45">XXXX<br />XXXX</td>
    //  </tr>
    //  <tr>
    //   <td width="30" align="center">4.</td>
    //   <td width="140">XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td width="80">XXXX<br />XXXX</td>
    //   <td align="center" width="45">XXXX<br />XXXX</td>
    //  </tr>
    // </table>
    // EOD;

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------

    //         // NON-BREAKING TABLE (nobr="true")

    //         $tbl = <<<EOD
    // <table border="1" cellpadding="2" cellspacing="2" nobr="true">
    //  <tr>
    //   <th colspan="3" align="center">NON-BREAKING TABLE</th>
    //  </tr>
    //  <tr>
    //   <td>1-1</td>
    //   <td>1-2</td>
    //   <td>1-3</td>
    //  </tr>
    //  <tr>
    //   <td>2-1</td>
    //   <td>3-2</td>
    //   <td>3-3</td>
    //  </tr>
    //  <tr>
    //   <td>3-1</td>
    //   <td>3-2</td>
    //   <td>3-3</td>
    //  </tr>
    // </table>
    // EOD;

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------

    //         // NON-BREAKING ROWS (nobr="true")

    //         $tbl = <<<EOD
    // <table border="1" cellpadding="2" cellspacing="2" align="center">
    //  <tr nobr="true">
    //   <th colspan="3">NON-BREAKING ROWS</th>
    //  </tr>
    //  <tr nobr="true">
    //   <td>ROW 1<br />COLUMN 1</td>
    //   <td>ROW 1<br />COLUMN 2</td>
    //   <td>ROW 1<br />COLUMN 3</td>
    //  </tr>
    //  <tr nobr="true">
    //   <td>ROW 2<br />COLUMN 1</td>
    //   <td>ROW 2<br />COLUMN 2</td>
    //   <td>ROW 2<br />COLUMN 3</td>
    //  </tr>
    //  <tr nobr="true">
    //   <td>ROW 3<br />COLUMN 1</td>
    //   <td>ROW 3<br />COLUMN 2</td>
    //   <td>ROW 3<br />COLUMN 3</td>
    //  </tr>
    // </table>
    // EOD;

    //         $pdf->writeHTML($tbl, true, false, false, false, '');

    //         // -----------------------------------------------------------------------------
    //         $this->response->setContentType('application/pdf');

    //         //Close and output PDF document
    //         $pdf->Output('example_048.pdf', 'I');

    //         //============================================================+
    //         // END OF FILE
    //         //============================================================+
    //     }


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
    public function print_pemberi_pinjam($idPjm)
    {
        // $test=0001;
        // dd($this->users->proceduregetPrintIdPJMNamaPemberi('pjs'.'-'.$test));
        $data = [
            'testing' => $this->allUser->proceduregetPrintIdPJMNamaPemberi($idPjm),
            'dataBarangDipinjam' => $this->allUser->proceduregetParentMerkFromIdPjm($idPjm)
        ];

        $test = view('user/pemberi_pinjam', $data);
        // $test = view('user/index');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->AddPage();
        $pdf->writeHTML($test);
        // $pdf->writeHTML($test, true, false, false, false, '');
        // $pdf->writeHTMLCell(0, 0, '', '', $test, 0, 1, 0, true, '', true);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('sample.pdf', 'I');
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
    public function out_broadcast()
    {
        $data = [
            // 'allShowOutBroadcast' => $this->outBroadcast->procedureGetAllShowOutBroadcast(),
            'showAllJoinsOBKategori' => $this->outBroadcast->getOBJointKategori(),
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            'allUsers' => $this->allUser->getUsers()
           
        ];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);


        // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->AddPage();
        $test = view('user/out_broadcast',$data);
        // $pdf->writeHTML($test);
        $pdf->writeHTML($test, true, 0, true, true);
        // $pdf->Write(0, 'Example of HTML Justification', '', 0, 'L', true, 0, false, false, 0);
        $this->response->setContentType('application/pdf');
        return $pdf->Output('example_002.pdf', 'I');
    }


    //end sample ini juga OK

//     public function out_broadcast()
//     {
//         // Initialize TCPDF object
//         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//         // Set document information
//         $pdf->SetCreator(PDF_CREATOR);
//         $pdf->SetAuthor('Your Name');
//         $pdf->SetTitle('Two Tables in One Page PDF');
//         $pdf->SetSubject('Rendering two tables in one page PDF');
//         $pdf->SetKeywords('HTML, PDF, TCPDF');

//         // Set default header data
//         $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 003', PDF_HEADER_STRING);

//         // Set header and footer fonts
//         $pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
//         $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

//         // Set default monospaced font
//         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//         // Set margins
//         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//         $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//         $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//         // Set auto page breaks
//         $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

//         // Set image scale factor
//         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//         // Add a page
//         $pdf->AddPage();

//         // Create first table (50% width)
//         $html1 = '';

//         // Create second table (remaining width)
//         $html2 = '
//   <table border="1" style="width: calc(100% - 50%)">
//       <tr>
//           <th colspan="2">Remaining Width Table</th>
//       </tr>
//       <tr>
//           <td>Row 1, Column 1</td>
//           <td>Row 1, Column 2</td>
//       </tr>
//       <tr>
//           <td>Row 2, Column 1</td>
//           <td>Row 2, Column 2</td>
//       </tr>
//   </table>';

//         // Write both tables to PDF
//         $pdf->writeHTML($html2 . $html1, true, false, true, false, '');

//         $this->response->setContentType('application/pdf');
//         return $pdf->Output('example_002.pdf', 'I');
//     }
}

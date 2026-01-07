<?php
include 'conn.php';
session_start();
$email = $_SESSION['email-id'];

if(!isset($email))
{
    header("location: login.php");
}

require('fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{ 
    // Arial bold 15
    $this->SetFont('Times','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(35,10,'NGO Report',1,0,'C');
    // Line break
    $this->Ln(20);

    $this->Cell(60,10,'Request Id',0,0,'C');
    $this->Cell(20,10,'Donor Email',0,0,'C');
    // $this->Cell(50,20,'NGO Email',0,0,'C');
    $this->Cell(60,10,'Item Detail',0,0,'C');
    $this->Cell(40,10,'Request Date',0,1,'C');
    $y = $this->GetY();
    $this->Line(20,30,200,30);//top
    $this->Line(20,30,20,250);//left
    $this->Line(200,30,200,250);//right
    $this->Line(20,250,200,250);//bottom
    $this->Line(20,$y,200,$y);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$select = mysqli_query($con, "SELECT * FROM `donation_req_donor` WHERE `N_email` = '$email' ");

if(mysqli_num_rows($select) > 0)
{
while($raw = mysqli_fetch_array($select))
{
    if($raw['request_status'] == "Approved")
    {
        $pdf->Cell(60,15,$raw['request_id'],0,0,'C');
        $pdf->Cell(20,15,$raw['email-id'],0,0,'C');
        // $pdf->Cell(50,15,$raw['N_email'],0,0,'C');
        $pdf->Cell(60,15,$raw['item_detail'],0,0,'C');
        $pdf->Cell(40,15,$raw['request_date'],0,1,'c');
    }
}
}

$pdf->Output();
?>
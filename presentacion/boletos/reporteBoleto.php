<?php
require ('fpdf/fpdf.php');
include ("phpqrcode/qrlib.php"); //libreria qr

error_reporting(E_ALL);
ini_set('display_errors', '1');

// --- inicio del PDF ---
$pdf = new FPDF("P", "mm", "Letter");
$pdf->AddPage();

// Título principal centrado
$pdf->SetFont("Times", "B", 20);
$pdf->Cell(0, 12, "Boleto", 0, 1, "C");

QRcode::png('http://g6.itiud.org/', 'imagenes/qr.png'); 

// Logo
$pdf->Image("img/AltairAir.png", 10, 18, 40);
$pdf -> Image("imagenes/qr.png", 166, 10, 40);

// Mover cursor abajo del logo
$pdf->SetY(18 + 40 + 6);

// Encabezados
$pdf->SetFont("Times", "B", 12);
$pdf->SetFillColor(11,102,35);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(0,0,0);

// Columnas
$w = [
  'id'     => 20,
  'asiento'=> 30,
  'clase'  => 40,
  'hora'   => 25,
  'fecha'  => 30,
  'precio' => 35
];

$pdf->Cell($w['id'],     10, "#",      1, 0, "C", true);
$pdf->Cell($w['asiento'],10, "Asiento", 1, 0, "C", true);
$pdf->Cell($w['clase'],  10, "Clase",   1, 0, "C", true);
$pdf->Cell($w['hora'],   10, "Hora",    1, 0, "C", true);
$pdf->Cell($w['fecha'],  10, "Fecha",   1, 0, "C", true);
$pdf->Cell($w['precio'], 10, "Precio",  1, 1, "C", true);

// Volver a colores normales
$pdf->SetFont("Times", "", 12);
$pdf->SetTextColor(0,0,0);

$id     = $_POST['id'];
$asiento = $_POST['asiento'];
$clase   = $_POST['clase'];
$hora    = $_POST['hora'];
$fecha   = $_POST['fecha'];
$precio  = $_POST['precio'];


$pdf->Cell($w['id'],     10, $id,      1, 0, "C");
$pdf->Cell($w['asiento'],10, $asiento, 1, 0, "C");
$pdf->Cell($w['clase'],  10, iconv("UTF-8","ISO-8859-1",$clase), 1, 0, "C");
$pdf->Cell($w['hora'],   10, $hora,    1, 0, "C");
$pdf->Cell($w['fecha'],  10, $fecha,   1, 0, "C");
$pdf->Cell($w['precio'], 10, $precio,  1, 1, "C");

// Salida PDF
if (ob_get_length()) { ob_end_clean(); }
$pdf->Output("I", "Boleto.pdf");
?>

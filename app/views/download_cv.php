<?php
session_start();
require_once 'app/config/db-conn.php';
require_once 'app/models/ResumeModel.php';
require('fpdf/fpdf.php');

$db = new DbConn('localhost', 'root', '', 'yllusion-portal');
$db->connect();

$resumeModel = new ResumeModel($db);
$resume = $resumeModel->getResume($_SESSION['user_id']);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Mon CV', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nom: ' . $resume['full_name'], 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $resume['email'], 0, 1);
$pdf->Cell(0, 10, 'Téléphone: ' . $resume['phone'], 0, 1);
$pdf->Cell(0, 10, 'Expérience: ' . $resume['experience'], 0, 1);
$pdf->Cell(0, 10, 'Éducation: ' . $resume['education'], 0, 1);
$pdf->Cell(0, 10, 'Compétences: ' . $resume['skills'], 0, 1);

$pdf->Output('D', 'mon_cv.pdf');

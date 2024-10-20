<?php
require_once '../models/ResumeModel.php';
require_once '../../vendor/setasign/fpdf/fpdf.php';

class ResumeController {
    private $resumeModel;
    private $conn;

    public function __construct($dbConnection) {
        session_start();
        $this->conn = $dbConnection;
        $this->resumeModel = new Resume($this->conn);
    }

    public function getResumesByUserId($user_id) {
        return $this->resumeModel->getUserResumes($user_id);
    }

    public function showResumes() {
        if (!isset($_SESSION['emailLog_id'])) {
            echo "Erreur : Vous devez être connecté pour voir vos CVs.";
            return [];
        }

        $user_id = $_SESSION['emailLog_id'];
        return $this->resumeModel->getUserResumes($user_id);
    }

    public function addNewResume($data) {
        if (!isset($_SESSION['emailLog_id'])) {
            echo "Erreur : Vous devez être connecté pour ajouter un CV.";
            return false;
        }

        $user_id = $_SESSION['emailLog_id'];
        return $this->resumeModel->addResume($user_id, $data['full_name'], $data['email'], $data['phone'], 
            $data['experience'], $data['education'], $data['skills'], $data['style']);
    }

    public function deleteResume($cv_id) {
        if (!isset($_SESSION['emailLog_id'])) {
            echo "Erreur : Vous devez être connecté pour supprimer un CV.";
            return false;
        }

        $user_id = $_SESSION['emailLog_id'];
        return $this->resumeModel->deleteResume($cv_id, $user_id);
    }

    public function getCvForEdit($cv_id) {
        if (!isset($_SESSION['emailLog_id'])) {
            echo "Erreur : Vous devez être connecté pour modifier un CV.";
            return false;
        }

        $user_id = $_SESSION['emailLog_id'];
        return $this->resumeModel->getUserResumeById($cv_id, $user_id);
    }

    public function updateResume($cv_id, $data) {
        if (!isset($_SESSION['emailLog_id'])) {
            echo "Erreur : Vous devez être connecté pour modifier un CV.";
            return false;
        }

        $user_id = $_SESSION['emailLog_id'];
        return $this->resumeModel->updateResume($cv_id, $user_id, $data['full_name'], $data['email'], $data['phone'], 
            $data['experience'], $data['education'], $data['skills'], $data['style']);
    }

    public function downloadResumeAsPdf($cv_id) {
        if (!isset($_SESSION['emailLog_id'])) {
            echo "Erreur : Vous devez être connecté pour télécharger un CV.";
            return;
        }

        $user_id = $_SESSION['emailLog_id'];
        $cv = $this->resumeModel->getUserResumeById($cv_id, $user_id);
        if ($cv) {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'CV de ' . $cv['full_name'], 0, 1, 'C');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, 'Email: ' . $cv['email'], 0, 1);
            $pdf->Cell(0, 10, 'Téléphone: ' . $cv['phone'], 0, 1);
            $pdf->Cell(0, 10, 'Expérience:', 0, 1);
            $pdf->MultiCell(0, 10, $cv['experience']);
            $pdf->Cell(0, 10, 'Éducation:', 0, 1);
            $pdf->MultiCell(0, 10, $cv['education']);
            $pdf->Cell(0, 10, 'Compétences:', 0, 1);
            $pdf->MultiCell(0, 10, $cv['skills']);
            $pdf->Output('D', 'cv_' . $cv['full_name'] . '.pdf');
            exit;
        } else {
            echo "Le CV n'a pas été trouvé.";
        }
    }
}

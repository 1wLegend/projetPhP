<?php

class ResumeController {
    private $resumeModel;

    public function __construct($db) {
        $this->resumeModel = new ResumeModel($db);
    }

    public function showResume($userId) {
        $resume = $this->resumeModel->getResume($userId);
        require 'app/views/resume.php'; 
    }

    public function editResume($userId, $data) {
        return $this->resumeModel->updateResume($userId, $data);
    }

    public function createResume($userId, $data) {
        return $this->resumeModel->createResume($userId, $data);
    }
}

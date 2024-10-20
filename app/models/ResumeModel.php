<?php

require_once '../config/db-conn.php';

class Resume {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserResumes($user_id) {
        $sql = "SELECT * FROM resumes WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addResume($user_id, $full_name, $email, $phone, $experience, $education, $skills, $style) {
        $sql = "INSERT INTO resumes (user_id, full_name, email, phone, experience, education, skills, style) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('isssssss', $user_id, $full_name, $email, $phone, $experience, $education, $skills, $style);
        return $stmt->execute();
    }

    public function deleteResume($cv_id, $user_id) {
        $sql = "DELETE FROM resumes WHERE cv_id = ? AND user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $cv_id, $user_id);
        return $stmt->execute();
    }

    public function updateResume($cv_id, $user_id, $full_name, $email, $phone, $experience, $education, $skills, $style) {
        $sql = "UPDATE resumes SET full_name = ?, email = ?, phone = ?, experience = ?, education = ?, skills = ?, style = ?
                WHERE cv_id = ? AND user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssssssssi', $full_name, $email, $phone, $experience, $education, $skills, $style, $cv_id, $user_id);
        return $stmt->execute();
    }

    public function getUserResumeById($cv_id, $user_id) {
        $sql = "SELECT * FROM resumes WHERE cv_id = ? AND user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $cv_id, $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}

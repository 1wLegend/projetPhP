<?php

class ResumeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getResume($userId) {
        $stmt = $this->db->prepare("SELECT * FROM resumes WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateResume($userId, $data) {
        $stmt = $this->db->prepare("UPDATE resumes SET full_name=?, email=?, phone=?, experience=?, education=?, skills=?, style=? WHERE user_id=?");
        $stmt->bind_param("sssssssi", $data['full_name'], $data['email'], $data['phone'], $data['experience'], $data['education'], $data['skills'], $data['style'], $userId);
        return $stmt->execute();
    }

    public function createResume($userId, $data) {
        $stmt = $this->db->prepare("INSERT INTO resumes (user_id, full_name, email, phone, experience, education, skills, style) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssss", $userId, $data['full_name'], $data['email'], $data['phone'], $data['experience'], $data['education'], $data['skills'], $data['style']);
        return $stmt->execute();
    }
}

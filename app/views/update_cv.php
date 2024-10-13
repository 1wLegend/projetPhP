<?php
session_start();
require_once 'app/config/db-conn.php';
require_once 'app/models/ResumeModel.php';


$db = new DbConn('localhost', 'root', '', 'yllusion-portal');
$db->connect();


$resumeController = new ResumeController($db);


$resumeController->editResume($_SESSION['user_id'], $_POST); 


header("Location: resume.php");
exit(); 

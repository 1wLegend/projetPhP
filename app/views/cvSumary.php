<?php
require_once '../config/main.php'; 
require_once '../controllers/ResumeController.php'; 
$cvController = new ResumeController($conn);

$cvs = $cvController->showResumes();
if (isset($_GET['download_cv'])) {
    $cvController->downloadResumeAsPdf($_GET['download_cv']);
}

if (isset($_GET['delete_cv'])) {
    $cvController->deleteResume($_GET['delete_cv']);
    header("Location: cvSumary.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes CVs</title>
    <style>
        body {
            background-color: black;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        h1 {
            text-align: center;
            color: #c315fd;
            padding: 20px 0;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #1e1e1e;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        th {
            background-color: #c315fd;
            color: white;
        }

        td {
            background-color: #2c2c2c;
        }

        a {
            color: #c315fd;
            text-decoration: none;
        }

        a:hover {
            color: #8a3ccc;
            text-decoration: underline;
        }

        .table-container {
            margin-top: 50px;
        }

        .empty-message {
            text-align: center;
            margin-top: 50px;
        }

        .action-links a {
            margin: 0 10px;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
        }

        .action-links a:hover {
            background-color: #45a049;
        }

        .create-new {
            text-align: center;
            margin-top: 30px;
        }

        .create-new a {
            background-color: #a314d3;
            padding: 10px 20px;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        .create-new a:hover {
            background-color: #8a3ccc;
        }
    </style>
</head>
<body>

    <h1>Mes CVs</h1>

    <div class="table-container">
        <?php if (empty($cvs)): ?>
            <p class="empty-message">Vous n'avez pas encore de CV. <a href="resume.php">Créer un CV</a></p>
        <?php else: ?>
            <table border="0">
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Style</th>
                        <th>Date de création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cvs as $cv): ?>
                        <tr>
                            <td><?= htmlspecialchars($cv['full_name']) ?></td>
                            <td><?= htmlspecialchars($cv['email']) ?></td>
                            <td><?= htmlspecialchars($cv['phone']) ?></td>
                            <td><?= htmlspecialchars($cv['style']) ?></td>
                            <td><?= htmlspecialchars($cv['created_at']) ?></td>
                            <td class="action-links">
                                <a href="cvSumary.php?download_cv=<?= $cv['cv_id'] ?>">Télécharger</a> | 
                                <a href="edit_resume.php?cv_id=<?= $cv['cv_id'] ?>">Modifier</a> | 
                                <a href="cvSumary.php?delete_cv=<?= $cv['cv_id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce CV ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="create-new">
        <a href="resume.php">Créer un nouveau CV</a>
    </div>
    <div class="create-new">
        <a href="accueil.php">Accueil</a>
    </div>

</body>
</html>


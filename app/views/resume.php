<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon CV</title>
    <link rel="stylesheet" href="../../public/css/resume.css">
</head>
<body>
    <div class="register-container">
        <h1>Mon CV</h1>
        <form method="POST" action="update_cv.php">
            <label for="full_name">Nom complet :</label>
            <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($resume['full_name']) ?>" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($resume['email']) ?>" required>

            <label for="phone">Téléphone :</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($resume['phone']) ?>">

            <label for="experience">Expérience :</label>
            <textarea id="experience" name="experience" required><?= htmlspecialchars($resume['experience']) ?></textarea>

            <label for="education">Éducation :</label>
            <textarea id="education" name="education" required><?= htmlspecialchars($resume['education']) ?></textarea>

            <label for="skills">Compétences :</label>
            <textarea id="skills" name="skills" required><?= htmlspecialchars($resume['skills']) ?></textarea>

            <label for="style">Choisir un style :</label>
            <select id="style" name="style">
                <option value="style1" <?= $resume['style'] === 'style1' ? 'selected' : '' ?>>Style 1</option>
                <option value="style2" <?= $resume['style'] === 'style2' ? 'selected' : '' ?>>Style 2</option>

            </select>

            <button type="submit" class="submit-btn">Modifier</button>
        </form>
        <button onclick="window.location.href='download_cv.php'" class="submit-btn">Télécharger en PDF</button>
    </div>
</body>
</html>

<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $instagram = $_POST['instagram'];
    $introduction = $_POST['introduction'];
    $education = $_POST['education'];
    $skills_hard = $_POST['skills_hard'];
    $skills_soft = $_POST['skills_soft'];
    $tools = $_POST['tools'];

    $photo = 'default.jpg';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $photo = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/' . $photo);
        }
    }

    $stmt = $pdo->prepare("INSERT INTO portfolio (name, location, birth_date, email, instagram, introduction, education, skills_hard, skills_soft, tools, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $location, $birth_date, $email, $instagram, $introduction, $education, $skills_hard, $skills_soft, $tools, $photo]);

    header("Location: ./index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Portfolio</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        .container { display: block; padding: 20px; max-width: 600px; margin: 20px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #28a745; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; font-size: 16px; width: 100%; }
        button:hover { background: #218838; }
        a.btn { display: inline-block; margin-top: 10px; text-align: center; padding: 8px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        a.btn:hover { background: #545b62; }
        .file-input { display: flex; align-items: center; gap: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Portfolio</h2>
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="location">Lokasi:</label>
                <input type="text" id="location" name="location">
            </div>

            <div class="form-group">
                <label for="birth_date">Tanggal Lahir:</label>
                <input type="date" id="birth_date" name="birth_date">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram (@username):</label>
                <input type="text" id="instagram" name="instagram">
            </div>

            <div class="form-group">
                <label for="introduction">Introduction (Tentang Saya):</label>
                <textarea id="introduction" name="introduction" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="experience">Pengalaman :</label>
                <textarea id="experience" name="experience" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="skills_hard">Hard Skills :</label>
                <textarea id="skills_hard" name="skills_hard" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="skills_soft">Soft Skills :</label>
                <textarea id="skills_soft" name="skills_soft" rows="4"></textarea>
            </div>

    

            <div class="form-group">
                <label for="photo">Ganti Foto Profil (Opsional):</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>

            <button type="submit">✅ Save Portfolio</button>
        </form>
        <a href="./index.php" class="btn">← Kembali ke Portofolio</a>
    </div>
</body>
</html>
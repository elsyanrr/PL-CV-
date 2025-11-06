<?php
include 'config.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM portfolio WHERE id = ?");
$stmt->execute([$id]);
$port = $stmt->fetch();

if (!$port) {
    die("Data tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $instagram = $_POST['instagram'];
    $introduction = $_POST['introduction'];
    $experience = $_POST['experience'];
    $skills_hard = $_POST['skills_hard'];
    $skills_soft = $_POST['skills_soft'];

    $photo = $port['photo'];
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            if ($port['photo'] != 'default.jpg' && file_exists('./uploads/' . $port['photo'])) {
                unlink('./uploads/' . $port['photo']);
            }
            $photo = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/' . $photo);
        }
    }

    // ✅ tools dihapus karena tidak ada di form & menyebabkan parameter error
    $stmt = $pdo->prepare("UPDATE portfolio 
        SET name=?, location=?, birth_date=?, email=?, instagram=?, introduction=?, experience=?, skills_hard=?, skills_soft=?, photo=? 
        WHERE id=?"
    );

    $stmt->execute([
        $name, $location, $birth_date, $email, $instagram,
        $introduction, $experience, $skills_hard, $skills_soft,
        $photo, $id
    ]);

    header("Location: ./index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Portfolio</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        .container { display: block; padding: 20px; max-width: 600px; margin: 20px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007bff; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; font-size: 16px; }
        button:hover { background: #0056b3; }
        a.btn { display: inline-block; margin-top: 10px; text-align: center; padding: 8px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        a.btn:hover { background: #545b62; }
        .current-photo { margin: 10px 0; }
        .current-photo img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 2px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Portfolio</h2>
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Nama Lengkap:</laabel>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($port['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="location">Lokasi :</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($port['location']); ?>">
            </div>

            <div class="form-group">
                <label for="birth_date">Tanggal Lahir:</label>
                <input type="date" id="birth_date" name="birth_date" value="<?php echo $port['birth_date']; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($port['email']); ?>">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram (@username):</label>
                <input type="text" id="instagram" name="instagram" value="<?php echo htmlspecialchars($port['instagram']); ?>">
            </div>

            <div class="form-group">
                <label for="introduction">Introduction (Tentang Saya):</label>
                <textarea id="introduction" name="introduction" rows="4" required><?php echo htmlspecialchars($port['introduction']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="experience">Pengalaman :</label>
                <textarea id="experience" name="experience" rows="4"><?php echo htmlspecialchars($port['education']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="skills_hard">Hard Skills :</label>
                <textarea id="skills_hard" name="skills_hard" rows="4"><?php echo htmlspecialchars($port['skills_hard']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="skills_soft">Soft Skills :</label>
                <textarea id="skills_soft" name="skills_soft" rows="4"><?php echo htmlspecialchars($port['skills_soft']); ?></textarea>
            </div>


            <div class="form-group">
                <label for="photo">Ganti Foto Profil (Opsional):</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>

            <div class="current-photo">
                <label>Current Photo:</label>
                <img src="./uploads/<?php echo htmlspecialchars($port['photo']); ?>" alt="Current Photo">
            </div>

            <button type="submit">✅ Update Portfolio</button>
        </form>
        <a href="./index.php" class="btn">← Kembali ke Portofolio</a>
    </div>
</body>
</html>
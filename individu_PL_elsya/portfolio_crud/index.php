<?php
include 'config.php';

// Ambil data terbaru
$stmt = $pdo->query("SELECT * FROM portfolio ORDER BY id DESC LIMIT 1");
$port = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo htmlspecialchars($port['name']); ?></title>
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <!-- SIDEBAR KIRI -->
        <div class="sidebar">
            <div class="profile-pic">
                <img src="./uploads/<?php echo htmlspecialchars($port['photo']); ?>" alt="Profile Picture">
            </div>
            <h2><?php echo htmlspecialchars($port['name']); ?></h2>
            <div class="contact-info">
                <p><strong>📍</strong> <?php echo htmlspecialchars($port['location']); ?></p>
                <p><strong>🎂</strong> <?php echo date('F jS, Y', strtotime($port['birth_date'])); ?></p>
                <p><strong>✉️</strong> <?php echo htmlspecialchars($port['email']); ?></p>
                <p><strong>📸</strong> <?php echo htmlspecialchars($port['instagram']); ?></p>
            </div>
            <div class="actions">
                <a href="./add.php" class="btn">➕ Add New</a>
                <?php if ($port['id'] > 0): ?>
                    <a href="./edit.php?id=<?php echo $port['id']; ?>" class="btn">✏️ Edit</a>
                    <a href="./delete.php?id=<?php echo $port['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-delete">🗑️ Delete</a>
                <?php else: ?>
                    <span class="btn btn-disabled">✏️ Edit</span>
                    <span class="btn btn-disabled">🗑️ Delete</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- CONTENT KANAN -->
        <div class="content">
            <section class="section">
                <h3>Tentang Saya</h3>
                <p><?php echo nl2br(htmlspecialchars($port['introduction'])); ?></p>
            </section>

           <section class="section">
    <h3>PENGALAMAN</h3>
    <div class="experience-text">
        <?php 
        $lines = explode("\n", $port['experience']);
        foreach ($lines as $line) {
            if (trim($line) !== '') {
                echo '<p>' . htmlspecialchars(trim($line)) . '</p>';
            }
        }
        ?>
    </div>
</section>

            <section class="section">
                <h3>SKILLS</h3>
                <div class="skills-container">
                    <div class="skill-column">
                        <h4>Hard Skills</h4>
                        <ul>
                            <?php foreach(explode("\n", $port['skills_hard']) as $skill): 
                                if (trim($skill) !== ''): ?>
                                    <li><?php echo htmlspecialchars(trim($skill)); ?></li>
                                <?php endif;
                            endforeach; ?>
                        </ul>
                    </div>
                    <div class="skill-column">
                        <h4>Soft Skills</h4>
                        <ul>
                            <?php foreach(explode("\n", $port['skills_soft']) as $skill): 
                                if (trim($skill) !== ''): ?>
                                    <li><?php echo htmlspecialchars(trim($skill)); ?></li>
                                <?php endif;
                            endforeach; ?>
                        </ul>
                    </div>
                    <div class="skill-column">
                
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
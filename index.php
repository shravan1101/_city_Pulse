<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Web Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Your PHP Web Application</h1>
        </header>
        
        <main>
            <div class="info-card">
                <h2>🚀 Your App is Running!</h2>
                <p>This is a PHP-based web application running on PHP <?php echo phpversion(); ?></p>
                <p>Server time: <?php echo date('Y-m-d H:i:s'); ?></p>
            </div>

            <div class="features">
                <h3>Get Started:</h3>
                <ul>
                    <li>Edit <code>index.php</code> to modify this page</li>
                    <li>Add your styles in <code>css/style.css</code></li>
                    <li>Create new pages in the root directory</li>
                    <li>Use Composer to add PHP packages</li>
                </ul>
            </div>
        </main>

        <footer>
            <p>Built with PHP <?php echo phpversion(); ?></p>
        </footer>
    </div>
</body>
</html>

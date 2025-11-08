<?php
require_once 'functions.php';
session_start();
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';

    if (check_admin($u, $p)) {
        $_SESSION['is_admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $err = '❌ Invalid username or password';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>FunctionalCity — Admin Login</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
* {margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}

body {
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
  color:#fff;
  overflow:hidden;
}

.login-container {
  width:90%;
  max-width:400px;
  background:rgba(255,255,255,0.08);
  padding:2rem;
  border-radius:20px;
  backdrop-filter:blur(12px);
  box-shadow:0 10px 25px rgba(0,0,0,0.4);
  border:1px solid rgba(255,255,255,0.1);
  text-align:center;
  animation:fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
  from {opacity:0; transform:translateY(30px);}
  to {opacity:1; transform:translateY(0);}
}

h1 {
  color:#00e1ff;
  font-size:1.8rem;
  letter-spacing:1px;
  margin-bottom:0.5rem;
}

h2 {
  font-size:1.3rem;
  color:#fff;
  opacity:0.9;
  margin-bottom:1.5rem;
}

.error {
  background:rgba(255,0,60,0.15);
  color:#ff4b7d;
  padding:0.8rem;
  border-radius:10px;
  border:1px solid rgba(255,0,60,0.3);
  margin-bottom:1rem;
  font-size:0.9rem;
}

label {
  display:block;
  text-align:left;
  font-weight:500;
  margin-top:1rem;
  color:rgba(255,255,255,0.9);
}

input {
  width:100%;
  margin-top:0.4rem;
  padding:0.8rem;
  border:none;
  border-radius:10px;
  background:rgba(255,255,255,0.1);
  color:#fff;
  outline:none;
  transition:0.3s;
}

input:focus {
  background:rgba(0,198,255,0.15);
  box-shadow:0 0 10px rgba(0,198,255,0.3);
}

button {
  width:100%;
  margin-top:1.5rem;
  padding:0.9rem;
  border:none;
  border-radius:10px;
  background:linear-gradient(135deg,#00e1ff,#007aff);
  color:#fff;
  font-size:1rem;
  font-weight:600;
  letter-spacing:0.5px;
  cursor:pointer;
  transition:0.3s;
}

button:hover {
  transform:translateY(-3px);
  box-shadow:0 5px 15px rgba(0,198,255,0.4);
}

footer {
  text-align:center;
  margin-top:2rem;
  color:rgba(255,255,255,0.7);
  font-size:0.85rem;
}
footer a {color:#00e1ff;text-decoration:none;}
footer a:hover {text-decoration:underline;}
</style>
</head>
<body>

<div class="login-container">
  <h1>FunctionalCity</h1>
  <h2>Admin Portal 🔒</h2>

  <?php if ($err): ?>
    <div class="error"><?= $err ?></div>
  <?php endif; ?>

  <form method="post">
    <label>Username
      <input type="text" name="username" required>
    </label>
    <label>Password
      <input type="password" name="password" required>
    </label>
    <button type="submit">Login</button>
  </form>

  <footer>
    <p>🌍 Keep <strong>FunctionalCity</strong> running clean and safe.</p>
    <p><a href="index.php">← Back to Home</a></p>
  </footer>
</div>

</body>
</html>

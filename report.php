<?php
require_once 'functions.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $desc = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? 'Other');

    $img = save_image('image');

    $arr = read_issues();
    $id = new_id($arr);
    $issue = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'title' => $title,
        'description' => $desc,
        'category' => $category,
        'image' => $img,
        'status' => 'Pending',
        'date' => date('Y-m-d H:i:s')
    ];
    $arr[] = $issue;
    write_issues($arr);
    $msg = '✅ Your issue has been reported successfully!';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>FunctionalCity — Report Issue</title>
<link rel="stylesheet" href="style.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}

body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  color:#fff;
  min-height:100vh;
  display:flex;
  flex-direction:column;
}

header {
  width:100%;
  padding:1rem 2rem;
  display:flex;
  justify-content:space-between;
  align-items:center;
  background:rgba(255,255,255,0.07);
  backdrop-filter:blur(10px);
  box-shadow:0 2px 10px rgba(0,0,0,0.3);
}

header h1 {
  color:#00e1ff;
  font-size:1.8rem;
  letter-spacing:1px;
  font-weight:600;
}

header nav a {
  color:#fff;
  text-decoration:none;
  margin-left:1rem;
  transition:0.3s;
}

header nav a:hover {
  color:#00e1ff;
}

main {
  flex:1;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  padding:3rem 1rem;
}

h2 {
  font-size:2rem;
  margin-bottom:1rem;
  color:#00e1ff;
  text-shadow:0 0 10px rgba(0,198,255,0.4);
}

.success {
  background:rgba(0,255,127,0.15);
  color:#00ff95;
  padding:1rem 2rem;
  border-radius:10px;
  margin-bottom:1.5rem;
  border:1px solid rgba(0,255,127,0.4);
  box-shadow:0 0 12px rgba(0,255,127,0.2);
}

.form {
  width:90%;
  max-width:600px;
  background:rgba(255,255,255,0.08);
  padding:2rem;
  border-radius:20px;
  backdrop-filter:blur(12px);
  box-shadow:0 10px 25px rgba(0,0,0,0.4);
  border:1px solid rgba(255,255,255,0.1);
  animation:fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
  from {opacity:0; transform:translateY(20px);}
  to {opacity:1; transform:translateY(0);}
}

label {
  display:block;
  margin-bottom:1.3rem;
  color:#fff;
  font-weight:500;
  letter-spacing:0.5px;
}

input, select, textarea {
  width:100%;
  margin-top:0.3rem;
  padding:0.8rem;
  border:none;
  border-radius:10px;
  background:rgba(255,255,255,0.1);
  color:#fff;
  outline:none;
  font-size:0.95rem;
  transition:0.3s;
}

input:focus, select:focus, textarea:focus {
  background:rgba(0,198,255,0.15);
  box-shadow:0 0 10px rgba(0,198,255,0.3);
}

textarea {
  height:100px;
  resize:none;
}

button {
  width:100%;
  padding:0.9rem;
  border:none;
  border-radius:10px;
  background:linear-gradient(135deg, #00e1ff, #007aff);
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
  padding:1.5rem;
  font-size:0.9rem;
  color:rgba(255,255,255,0.7);
  background:rgba(255,255,255,0.05);
  border-top:1px solid rgba(255,255,255,0.1);
}
footer a {
  color:#00e1ff;
  text-decoration:none;
}
footer a:hover {
  text-decoration:underline;
}
</style>
</head>
<body>

<header>
  <h1>FunctionalCity</h1>
  <nav>
    <a href="index.php">Home</a>
    <a href="report.php" style="color:#00e1ff;">Report</a>
    <a href="login.php">Admin</a>
  </nav>
</header>

<main>
  <h2>Report an Issue 🛠️</h2>
  <p style="max-width:600px;text-align:center;color:rgba(255,255,255,0.75);margin-bottom:2rem;">
    Help us make <strong>FunctionalCity</strong> cleaner, greener, and smarter 🌍  
    Report civic issues like <em>potholes, garbage, broken streetlights, or road damage</em>.  
    Together, we can build a sustainable and efficient city.
  </p>

  <?php if($msg) echo "<div class='success'>$msg</div>"; ?>

  <form method="post" enctype="multipart/form-data" class="form">
    <label>Name<input name="name" required></label>
    <label>Email<input type="email" name="email" required></label>
    <label>Title<input name="title" required></label>
    <label>Category
      <select name="category">
        <option>Pothole</option>
        <option>Garbage</option>
        <option>Streetlight</option>
        <option>Water supply</option>
        <option>Traffic</option>
        <option>Drainage</option>
        
        <option>Tree Cutting</option>
        <option>Other</option>
      </select>
    </label>
    <label>Description<textarea name="description" required></textarea></label>
    <label>Image<input type="file" name="image"></label>
    <label ><h2>Find My Location</h2>
    <button  onclick="getLocation()">Get My Location</button>
    <p id="output"></p></label>
    <button>Submit Report</button>
  </form>
</main>

<footer>
  <p>🌱 <strong>FunctionalCity</strong> — Our goal: A cleaner, brighter Earth for all.</p>
  <p>© <?= date('Y') ?> |  By FunctionalCity Team</p>
</footer>

</body>
<script>
  const API_URL = "https://api-inference.huggingface.co/models/google/vit-base-patch16-224";
const API_KEY = "AlzaSyCkG_qVBLbdKOBJ_6KZi49fBqDB7_Qxyh4";

const image = await fetch("https://example.com/cat.jpg")
  .then(res => res.blob());

fetch(API_URL, {
  method: "POST",
  headers: { "Authorization": `Bearer ${API_KEY}` },
  body: image
})
  .then(res => res.json())
  .then(data => console.log(data))
  .catch(err => console.error(err));


</script>
</html>

<?php
require_once 'functions.php';
$issues = read_issues();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>FunctionalCity — Together for a Cleaner Tomorrow</title>
  <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    * {margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif;}

    body {
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color:#fff;
      overflow-x:hidden;
    }

    header {
      width:100%;
      padding:1rem 2rem;
      display:flex;
      justify-content:space-between;
      align-items:center;
      background:rgba(255,255,255,0.07);
      backdrop-filter:blur(10px);
      position:sticky;top:0;z-index:10;
      box-shadow:0 2px 10px rgba(0,0,0,0.3);
    }

    header h1 {
      color:#00e1ff;
      font-size:1.8rem;
      font-weight:600;
      letter-spacing:1px;
    }

    nav a {
      color:#fff;
      margin-left:1.2rem;
      text-decoration:none;
      font-weight:500;
      transition:0.3s;
      padding:0.4rem 0.8rem;
      border-radius:6px;
    }

    nav a:hover {background:rgba(255,255,255,0.15); color:#00e1ff;}

    .hero {
      text-align:center;
      padding:6rem 1rem;
      background:linear-gradient(135deg, rgba(0,198,255,0.1), rgba(255,255,255,0.03));
      backdrop-filter:blur(10px);
    }

    .hero h2 {
      font-size:2.8rem;
      margin-bottom:0.5rem;
      color:#00d9ff;
      text-shadow:0 0 20px rgba(0,198,255,0.4);
    }

    .hero p {
      font-size:1.1rem;
      color:rgba(255,255,255,0.8);
      max-width:700px;
      margin:auto;
    }

    .mission {
      text-align:center;
      margin:3rem auto;
      padding:2rem 1rem;
      max-width:900px;
    }

    .mission h3 {
      color:#00e1ff;
      font-size:1.8rem;
      margin-bottom:1rem;
      text-shadow:0 0 10px rgba(0,198,255,0.3);
    }

    .mission p {
      color:rgba(255,255,255,0.85);
      line-height:1.7;
      font-size:1rem;
    }

    .features {
      display:flex;
      flex-wrap:wrap;
      justify-content:center;
      gap:1.5rem;
      margin:3rem auto;
      max-width:1100px;
    }

    .feature {
      background:rgba(255,255,255,0.08);
      border-radius:15px;
      padding:2rem;
      flex:1 1 280px;
      text-align:center;
      transition:0.3s;
      border:1px solid rgba(255,255,255,0.1);
      backdrop-filter:blur(10px);
    }

    .feature:hover {
      transform:translateY(-6px);
      box-shadow:0 0 20px rgba(0,198,255,0.3);
    }

    .feature h4 {
      color:#00e1ff;
      margin-bottom:0.6rem;
      font-size:1.2rem;
    }

    .feature p {
      color:rgba(255,255,255,0.85);
      font-size:0.9rem;
    }

    section {
      width:90%;
      max-width:1200px;
      margin:3rem auto;
    }

    h3.title {
      text-align:center;
      color:#00e1ff;
      font-size:1.8rem;
      margin-bottom:1.5rem;
      text-shadow:0 0 10px rgba(0,198,255,0.3);
    }

    .grid {
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
      gap:1.5rem;
    }

    .card {
      background:rgba(255,255,255,0.08);
      border-radius:18px;
      overflow:hidden;
      backdrop-filter:blur(10px);
      box-shadow:0 8px 20px rgba(0,0,0,0.3);
      transition:0.3s;
      border:1px solid rgba(255,255,255,0.1);
    }

    .card:hover {transform:translateY(-8px);box-shadow:0 10px 25px rgba(0,198,255,0.3);}
    .card img {
      width:100%;height:180px;object-fit:cover;filter:brightness(90%);
      border-bottom:1px solid rgba(255,255,255,0.1);
    }

    .card h4 {padding:0.8rem 1rem 0.3rem;color:#00e1ff;font-size:1.1rem;}
    .card p {padding:0 1rem;color:rgba(255,255,255,0.85);font-size:0.9rem;line-height:1.4;}
    .card small {display:block;padding:0 1rem;color:rgba(255,255,255,0.7);margin-bottom:0.4rem;}
    .card .status {padding:0.5rem 1rem 1rem;font-weight:600;}
    .card .status span {
      padding:0.3rem 0.6rem;
      border-radius:8px;
      font-size:0.75rem;
      background:linear-gradient(135deg,#f39c12,#f1c40f);
      box-shadow:0 0 8px rgba(241,196,15,0.5);
    }
    .card .status span.Resolved {
      background:linear-gradient(135deg,#27ae60,#2ecc71);
      box-shadow:0 0 8px rgba(46,204,113,0.5);
    }

    footer {
      background:rgba(255,255,255,0.05);
      text-align:center;
      padding:2rem 1rem;
      color:rgba(255,255,255,0.7);
      font-size:0.9rem;
      line-height:1.5;
    }

    footer a {
      color:#00e1ff;
      text-decoration:none;
    }

    .no-data {
      text-align:center;
      color:rgba(255,255,255,0.7);
      margin-top:1rem;
      font-size:1.1rem;
    }

    @media(max-width:700vh){
      .hero h2{font-size:2rem;}
      .features{flex-direction:column;align-items:center;}
    }
  </style>
</head>
<body>

<header>
  <h1>FunctionalCity</h1>
  <nav>
    <a href="index.php">Home</a>
    <a href="report.php">Report Issue</a>
    <a href="login.php">Admin</a>
  </nav>
</header>

<section class="hero">
  <h2>Together for a Cleaner, Smarter Earth 🌍</h2>
  <p>FunctionalCity helps communities report potholes, waste, and infrastructure issues — building cleaner, greener cities through citizen action.</p>
</section>

<section class="mission">
  <h3>Our Mission</h3>
  <p>
    Our goal is simple — make cities functional, sustainable, and clean. Every report contributes to a smarter infrastructure, fewer accidents, and a better environment.
    <br><br>
    🌿 <strong>Clean Earth.</strong> 🌆 <strong>Connected City.</strong> 💡 <strong>Empowered People.</strong>
  </p>
</section>

<div class="features">
  <div class="feature">
    <h4>📸 Report Issues Easily</h4>
    <p>Snap a photo, describe the issue, and submit in seconds. Your report helps local authorities act faster.</p>
  </div>
  <div class="feature">
    <h4>🌍 Community Impact</h4>
    <p>Each complaint you make brings us closer to a cleaner city — where roads are smooth, streets are bright, and waste is managed.</p>
  </div>
  <div class="feature">
    <h4>⚡ Real-Time Transparency</h4>
    <p>Track your reports, see others’ complaints, and know when action is taken. Together, we’re driving accountability.</p>
  </div>
</div>

<section>
  <h3 class="title">Recent Reports</h3>
  <?php if(empty($issues)): ?>
    <p class="no-data">No reports yet. Be the first to make your city shine 🌟</p>
  <?php else: ?>
    <div class="grid">
      <?php foreach(array_reverse($issues) as $issue): ?>
        <div class="card">
          <?php if(!empty($issue['image'])): ?>
            <img src="<?= htmlspecialchars($issue['image']) ?>" alt="Issue image">
          <?php else: ?>
            <img src="https://via.placeholder.com/400x200?text=No+Image" alt="No image">
          <?php endif; ?>
          <h4><?= htmlspecialchars($issue['title']) ?></h4>
          <p><?= nl2br(htmlspecialchars($issue['description'])) ?></p>
          <small>Reported by <?= htmlspecialchars($issue['name']) ?> on <?= htmlspecialchars($issue['date']) ?></small>
          <div class="status">
            Status: <span class="<?= htmlspecialchars($issue['status']) ?>"><?= htmlspecialchars($issue['status']) ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<footer>
  <p><strong>FunctionalCity</strong> — Connecting People and Cities for a Sustainable Future 🌱</p>
  <p>&copy; <?= date('Y') ?> | Built with 💙 by City Innovators | <a href="report.php">Submit a Report</a></p>
</footer>

</body>
</html>

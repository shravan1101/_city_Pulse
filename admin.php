<?php
require_once 'functions.php';
require_admin();
$issues = read_issues();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard | FunctionalCity</title>
  <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background: radial-gradient(circle at top left, #0f2027, #203a43, #2c5364);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    header {
      width: 100%;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    header h1 {
      font-size: 1.8rem;
      letter-spacing: 1px;
      font-weight: 600;
      color: #00d9ff;
    }

    header a {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: white;
      text-decoration: none;
      padding: 0.5rem 1.2rem;
      border-radius: 10px;
      font-weight: 500;
      transition: all 0.3s;
    }

    header a:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px #00c6ff;
    }

    main {
      width: 90%;
      max-width: 1200px;
      margin-top: 2rem;
    }

    h2 {
      text-align: center;
      font-size: 1.8rem;
      color: #00c6ff;
      margin-bottom: 1.5rem;
      text-shadow: 0 0 10px rgba(0, 198, 255, 0.5);
    }

    .issue-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 1.8rem;
    }

    .issue-card {
      background: rgba(255, 255, 255, 0.08);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      backdrop-filter: blur(15px);
      transition: all 0.4s ease;
      border: 1px solid rgba(255,255,255,0.1);
      position: relative;
    }

    .issue-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 10px 30px rgba(0, 198, 255, 0.3);
    }

    .issue-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      filter: brightness(90%);
      transition: 0.4s;
    }

    .issue-card:hover img {
      filter: brightness(100%) saturate(120%);
    }

    .issue-card .content {
      padding: 1.2rem;
    }

    .issue-card h3 {
      margin-bottom: 0.4rem;
      color: #00e1ff;
      font-size: 1.1rem;
      text-shadow: 0 0 6px rgba(0,198,255,0.4);
    }

    .issue-card p {
      font-size: 0.9rem;
      color: rgba(255,255,255,0.85);
      margin-bottom: 0.5rem;
      line-height: 1.4;
    }

    .badge {
      display: inline-block;
      padding: 0.3rem 0.7rem;
      border-radius: 12px;
      font-size: 0.75rem;
      font-weight: 600;
      margin-bottom: 0.6rem;
      color: #fff;
      text-shadow: 0 0 5px rgba(0,0,0,0.4);
    }

    .badge.Pending {
      background: linear-gradient(135deg, #f39c12, #f1c40f);
      box-shadow: 0 0 10px #f1c40f;
    }

    .badge.Resolved {
      background: linear-gradient(135deg, #2ecc71, #27ae60);
      box-shadow: 0 0 10px #2ecc71;
    }

    .actions {
      margin-top: 1rem;
      display: flex;
      justify-content: space-between;
      gap: 0.6rem;
    }

    .actions a {
      flex: 1;
      text-align: center;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: white;
      text-decoration: none;
      padding: 0.5rem;
      border-radius: 10px;
      font-weight: 500;
      transition: 0.3s;
      font-size: 0.85rem;
    }

    .actions a.delete {
      background: linear-gradient(135deg, #ff4e50, #f44336);
    }

    .actions a:hover {
      box-shadow: 0 0 10px #00c6ff;
      transform: translateY(-2px);
    }

    .actions a.delete:hover {
      box-shadow: 0 0 10px #ff4e50;
    }

    .nodata {
      text-align: center;
      color: rgba(255,255,255,0.7);
      font-size: 1.2rem;
      margin-top: 3rem;
    }
  </style>
</head>
<body>
  <header>
    <h1>CityPulse Admin</h1>
    <a href="logout.php">Logout</a>
  </header>

  <main>
    <h2>All Reported Issues</h2>

    <?php if (empty($issues)): ?>
      <p class="nodata">No reports found 🚧</p>
    <?php else: ?>
      <div class="issue-grid">
        <?php foreach ($issues as $i): ?>
          <div class="issue-card">
            <?php if (!empty($i['image'])): ?>
              <img src="<?= htmlspecialchars($i['image']) ?>" alt="Issue image">
            <?php else: ?>
              <img src="https://via.placeholder.com/400x200?text=No+Image" alt="No image">
            <?php endif; ?>
            <div class="content">
              <h3><?= htmlspecialchars($i['title']) ?></h3>
              <span class="badge <?= htmlspecialchars($i['status']) ?>">
                <?= htmlspecialchars($i['status']) ?>
              </span>
              <p><strong>Category:</strong> <?= htmlspecialchars($i['category']) ?></p>
              <p><?= htmlspecialchars($i['description']) ?></p>
              <small><strong>Date:</strong> <?= htmlspecialchars($i['date']) ?></small>

              <div class="actions">
                <a href="toggle.php?id=<?= $i['id'] ?>">Toggle Status</a>
                <a href="delete.php?id=<?= $i['id'] ?>" class="delete" onclick="return confirm('Delete this report?')">Delete</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>
</body>
</html>

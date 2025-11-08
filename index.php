<?php
require_once 'functions.php';
$issues = read_issues();
?><!doctype html><html><head><meta charset="utf-8"><title>CityPulse (JSON) — Home</title><link rel="stylesheet" href="style.css"></head>
<body><header><h1>CityPulse</h1><nav><a href="index.php">Home</a><a href="report.php">Report Issue</a><a href="login.php">Admin</a></nav></header>
<main><section class="hero"><h2>Report local issues</h2><p>Simple JSON-based app</p></section><section><h3>Recent Reports</h3>
<?php if(empty($issues)): ?><p>No reports yet</p><?php else: ?><div class="grid">
<?php foreach(array_reverse($issues) as $issue): ?><div class="card"><?php if(!empty($issue['image'])): ?><img src="<?=htmlspecialchars($issue['image'])?>" alt="image"><?php endif; ?><h4><?=htmlspecialchars($issue['title'])?></h4><p><?=nl2br(htmlspecialchars($issue['description']))?></p><small><?=htmlspecialchars($issue['name'])?> on <?=htmlspecialchars($issue['date'])?></small><div>Status: <?=htmlspecialchars($issue['status'])?></div></div><?php endforeach; ?></div><?php endif; ?>
</section></main></body></html>

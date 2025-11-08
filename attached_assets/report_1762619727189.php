<?php
require_once 'functions.php';
$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
$name=trim($_POST['name']??'');$email=trim($_POST['email']??'');$title=trim($_POST['title']??'');$desc=trim($_POST['description']??'');$category=trim($_POST['category']??'Other');$img=save_image($_FILES['image']??null);$arr=read_issues();$id=new_id($arr);$issue=['id'=>$id,'name'=>$name,'email'=>$email,'title'=>$title,'description'=>$desc,'category'=>$category,'image'=>$img,'status'=>'Pending','date'=>date('Y-m-d H:i:s')];$arr[]=$issue;write_issues($arr);$msg='Reported!';}
?><!doctype html><html><head><meta charset="utf-8"><title>Report Issue</title><link rel="stylesheet" href="style.css"></head>
<body><header><h1>CityPulse</h1></header><main><h2>Report an Issue</h2><?php if($msg)echo"<div class='success'>$msg</div>";?><form method="post" enctype="multipart/form-data" class="form">
<label>Name<input name="name" required></label><label>Email<input type="email" name="email" required></label><label>Title<input name="title" required></label>
<label>Category<select name="category"><option>Pothole</option><option>Garbage</option><option>Streetlight</option><option>Other</option></select></label>
<label>Description<textarea name="description" required></textarea></label><label>Image<input type="file" name="image"></label><button>Submit</button></form></main></body></html>
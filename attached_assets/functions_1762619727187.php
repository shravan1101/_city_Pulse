<?php
define('DATA_FILE', __DIR__ . '/data.json');
define('ADMIN_FILE', __DIR__ . '/admin.json');
define('UPLOAD_DIR', __DIR__ . '/uploads/');
if(!file_exists(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);
function read_issues(){if(!file_exists(DATA_FILE)) file_put_contents(DATA_FILE, json_encode([]));$json=file_get_contents(DATA_FILE);$arr=json_decode($json,true);if(!is_array($arr))$arr=[];return $arr;}
function write_issues($arr){file_put_contents(DATA_FILE,json_encode(array_values($arr),JSON_PRETTY_PRINT));}
function new_id($arr){$max=0;foreach($arr as $a)if(isset($a['id'])&&$a['id']>$max)$max=$a['id'];return $max+1;}
function save_image($file){if(!$file||$file['error']!==UPLOAD_ERR_OK)return ''; $allowed=['image/png','image/jpeg','image/jpg','image/gif'];if(!in_array($file['type'],$allowed))return ''; $ext=pathinfo($file['name'],PATHINFO_EXTENSION);$name=time().'_'.bin2hex(random_bytes(5)).'.'.$ext;$dest=UPLOAD_DIR.$name;if(move_uploaded_file($file['tmp_name'],$dest))return 'uploads/'.$name;return '';}
function ensure_admin(){if(!file_exists(ADMIN_FILE)){$default=['username'=>'admin','password'=>password_hash('admin123',PASSWORD_DEFAULT)];file_put_contents(ADMIN_FILE,json_encode($default,JSON_PRETTY_PRINT));}}
function check_admin($user,$pass){ensure_admin();$j=json_decode(file_get_contents(ADMIN_FILE),true);if(!$j)return false;if($j['username']!==$user)return false;return password_verify($pass,$j['password']);}
function require_admin(){session_start();if(empty($_SESSION['is_admin'])){header('Location: login.php');exit;}}
function delete_image_file($relpath){$p=__DIR__.'/'.$relpath;if(file_exists($p)&&is_file($p))@unlink($p);}
?>
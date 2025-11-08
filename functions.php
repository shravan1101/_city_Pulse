<?php
// ===============================
// Admin check & auto-create logic
// ===============================
function check_admin($username, $password) {
    $file = __DIR__ . '/admin.json';

    // If missing or empty, auto-create default admin
    if (!file_exists($file) || filesize($file) == 0) {
        $default = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT)
        ];
        file_put_contents($file, json_encode($default, JSON_PRETTY_PRINT));
    }

    $adminData = json_decode(file_get_contents($file), true);

    if (!$adminData || !isset($adminData['username'], $adminData['password'])) {
        return false;
    }

    return $username === $adminData['username'] &&
           password_verify($password, $adminData['password']);
}

// ===============================
// Complaint (Issue) Handling
// ===============================

// Read all complaints from data.json
function read_issues() {
    $file = __DIR__ . '/data.json';

    // Create file if missing
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));
    }

    $json = file_get_contents($file);
    $data = json_decode($json, true);

    if (!is_array($data)) {
        $data = [];
    }

    return $data;
}

// Save a new complaint
function save_issue($issue) {
    $file = __DIR__ . '/data.json';
    $issues = read_issues();
    $issues[] = $issue;
    file_put_contents($file, json_encode($issues, JSON_PRETTY_PRINT));
}

// Delete a complaint by its index
function delete_issue($index) {
    $file = __DIR__ . '/data.json';
    $issues = read_issues();

    if (isset($issues[$index])) {
        unset($issues[$index]);
        file_put_contents($file, json_encode(array_values($issues), JSON_PRETTY_PRINT));
    }
}

// ===============================
// Image Upload Helper
// ===============================
function handle_upload($fileField) {
    if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $uploadsDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }

    $filename = uniqid() . '_' . basename($_FILES[$fileField]['name']);
    $target = $uploadsDir . $filename;

    if (move_uploaded_file($_FILES[$fileField]['tmp_name'], $target)) {
        return 'uploads/' . $filename;
    }

    return null;
}



// ===============================
// Require admin login check
// ===============================
function require_admin() {
    session_start();
    if (empty($_SESSION['is_admin'])) {
        header('Location: login.php');
        exit;
    }
}
// ===============================
// Write (update) all issues to data.json
// ===============================
function write_issues($issues) {
    $file = __DIR__ . '/data.json';
    file_put_contents($file, json_encode($issues, JSON_PRETTY_PRINT));
}

// ===============================
// Backward compatibility alias for old name
// ===============================
function save_image($field) {
    return handle_upload($field);
}

// ===============================
// Generate a new unique ID for each issue
// ===============================
function new_id($issues) {
    if (empty($issues)) return 1;

    // Get all existing IDs
    $ids = array_column($issues, 'id');
    return max($ids) + 1;
}

// ===============================
// Delete the image file from uploads folder if it exists
// ===============================
function delete_image_file($path) {
    if (!$path) return;
    $full = __DIR__ . '/' . $path;
    if (file_exists($full)) {
        unlink($full);
    }
}

?>

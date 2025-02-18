<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$collegeObj = new Colleges();

// Get and sanitize input
$collegeId = clean_input($_GET['collegeId'] ?? '');

if($collegeObj->deleteCollege($collegeId)) {
    echo json_encode(['status' => 'success', 'message' => 'College deleted successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete college.']);
}
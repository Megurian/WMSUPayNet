<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$organizationObj = new Organizations();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $organization_id = clean_input($data['organization_id'] ?? null);

    if (empty($organization_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        exit();
    }

    $result = $organizationObj->deleteOrganization($organization_id);
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => $result]);
    } else {
        echo json_encode(['status' => 'error', 'message' => $result]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
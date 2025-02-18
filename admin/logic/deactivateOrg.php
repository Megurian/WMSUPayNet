<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$organizationObj = new Organizations();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $organization_id = clean_input($_POST['organization_id']?? null);
    $name = clean_input($_POST['organizationName']?? null);
    $reason = clean_input($_POST['deactivationReason']?? null);

    if (empty($organization_id) || empty($name) || empty($reason)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        exit();
    }

    if ($organizationObj->confirmOrganizationName($organization_id) !== $name){
        echo json_encode(['status' => 'error', 'message' => 'Invalid organization name']);
        exit();
    }

    $result = $organizationObj->deactivateOrganization($organization_id, $name, $reason);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => $result]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update primary organization']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
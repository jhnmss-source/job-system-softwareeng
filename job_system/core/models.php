<?php 
require_once 'dbConfig.php';

function insertDeveloper($pdo, $first_name, $last_name, $specialization) {
    $sql = "INSERT INTO developers (first_name, last_name, specialization) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $specialization]);
}

function getAllDevelopers($pdo) {
    $sql = "SELECT * FROM developers";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
        return $stmt->fetchAll();
    }
}
function getDeveloperByID($pdo, $dev_id) {
    $sql = "SELECT * FROM developers WHERE dev_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$dev_id])) {
        return $stmt->fetch();
    }
}



function insertProject($pdo, $dev_id, $project_title, $tech_stack) {
    $sql = "INSERT INTO developer_projects (dev_id, project_title, tech_stack) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$dev_id, $project_title, $tech_stack]);
}


function getProjectsByDeveloper($pdo, $dev_id) {
    $sql = "SELECT 
                developer_projects.project_id,
                developer_projects.project_title,
                developer_projects.tech_stack,
                developers.first_name AS owner
            FROM developer_projects
            JOIN developers ON developer_projects.dev_id = developers.dev_id
            WHERE developer_projects.dev_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$dev_id])) {
        return $stmt->fetchAll();
    }
}

function updateDeveloper($pdo, $first_name, $last_name, $specialization, $dev_id) {
    $sql = "UPDATE developers SET first_name = ?, last_name = ?, specialization = ? WHERE dev_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $specialization, $dev_id]);
}

function updateProject($pdo, $project_title, $tech_stack, $project_id) {
    $sql = "UPDATE developer_projects SET project_title = ?, tech_stack = ? WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$project_title, $tech_stack, $project_id]);
}


function deleteDeveloper($pdo, $dev_id) {
    $sql = "DELETE FROM developers WHERE dev_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$dev_id]);
}

function deleteProject($pdo, $project_id) {
    $sql = "DELETE FROM developer_projects WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$project_id]);
}
?>
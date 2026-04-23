<?php 
require_once 'dbConfig.php';
require_once 'models.php';

// Handle inserting a new Developer
if (isset($_POST['insertDevBtn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $specialization = $_POST['specialization'];

    if (!empty($first_name) && !empty($last_name) && !empty($specialization)) {
        $query = insertDeveloper($pdo, $first_name, $last_name, $specialization);
        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Please fill out all fields";
    }
}

// Handle adding a project to a developer
if (isset($_POST['insertProjectBtn'])) {
    $dev_id = $_POST['dev_id'];
    $project_title = $_POST['project_title'];
    $tech_stack = $_POST['tech_stack'];

    if (!empty($dev_id) && !empty($project_title) && !empty($tech_stack)) {
        $query = insertProject($pdo, $dev_id, $project_title, $tech_stack);
        if ($query) {
            header("Location: ../viewprojects.php?dev_id=" . $dev_id);
        } else {
            echo "Project insertion failed";
        }
    }
}
// Handle Updating Developer
if (isset($_POST['editDevBtn'])) {
    $query = updateDeveloper($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['specialization'], $_GET['dev_id']);
    if ($query) { header("Location: ../index.php"); }
}

// Handle Deleting Developer
if (isset($_POST['deleteDevBtn'])) {
    $query = deleteDeveloper($pdo, $_GET['dev_id']);
    if ($query) { header("Location: ../index.php"); }
}

// Handle Updating Project
if (isset($_POST['editProjectBtn'])) {
    $query = updateProject($pdo, $_POST['project_title'], $_POST['tech_stack'], $_GET['project_id']);
    if ($query) { header("Location: ../viewprojects.php?dev_id=" . $_GET['dev_id']); }
}

// Handle Deleting Project
if (isset($_POST['deleteProjectBtn'])) {
    $query = deleteProject($pdo, $_GET['project_id']);
    if ($query) { header("Location: ../viewprojects.php?dev_id=" . $_GET['dev_id']); }
}
?>
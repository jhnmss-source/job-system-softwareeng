<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
</head>
<body>
    <h1>Edit the Project Details</h1>
    <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&dev_id=<?php echo $_GET['dev_id']; ?>" method="POST">
        <p>
            <label for="project_title">Project Title</label>
            <input type="text" name="project_title">
        </p>
        <p>
            <label for="tech_stack">Technologies Used</label>
            <input type="text" name="tech_stack">
        </p>
        <input type="submit" name="editProjectBtn" value="Update Project">
    </form>
</body>
</html>
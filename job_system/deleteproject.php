<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Project</title>
</head>
<body>
    <h1>Are you sure you want to delete this project?</h1>
    <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&dev_id=<?php echo $_GET['dev_id']; ?>" method="POST">
        <input type="submit" name="deleteProjectBtn" value="Yes, Delete">
        <a href="viewprojects.php?dev_id=<?php echo $_GET['dev_id']; ?>">Cancel</a>
    </form>
</body>
</html>
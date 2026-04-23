<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job System - Developer Registry</title>
</head>
<body>
    <h1>Register as a Developer</h1>
    <form action="core/handleForms.php" method="POST">
        <p><label>First Name:</label> <input type="text" name="first_name"></p>
        <p><label>Last Name:</label> <input type="text" name="last_name"></p>
        <p><label>Specialization:</label> <input type="text" name="specialization"></p>
        <input type="submit" name="insertDevBtn">
    </form>

    <hr>

    <h2>Current Developers</h2>
    <?php $allDevs = getAllDevelopers($pdo); ?>
    <?php foreach ($allDevs as $row) { ?>
    <div style="border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <h3>Name: <?php echo $row['first_name'] . " " . $row['last_name']; ?></h3>
        <p>Specialization: <?php echo $row['specialization']; ?></p>
        <p>Date Added: <?php echo $row['date_added']; ?></p>
        
        <a href="viewprojects.php?dev_id=<?php echo $row['dev_id']; ?>">View Projects</a>
        <a href="editdev.php?dev_id=<?php echo $row['dev_id']; ?>">Edit</a>
        <a href="deletedev.php?dev_id=<?php echo $row['dev_id']; ?>">Delete</a>
    </div>
    <?php } ?>
</body>
</html>
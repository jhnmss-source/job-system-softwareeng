<?php 
require_once 'core/models.php'; 
require_once 'core/dbConfig.php'; 

$dev_id = $_GET['dev_id'] ?? null;

if (!$dev_id) {
    header("Location: index.php");
    exit();
}

$currentDeveloper = getDeveloperByID($pdo, $dev_id);

if (!$currentDeveloper) {
    header("Location: index.php");
    exit();
}

$full_name = $currentDeveloper['first_name'] . " " . $currentDeveloper['last_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Projects - <?php echo htmlspecialchars($full_name); ?></title>
</head>
<body>
    <h1>Developer: <?php echo htmlspecialchars($full_name); ?></h1>
    <a href="index.php">Back to Home</a>

    <h3>Add New Project for <?php echo htmlspecialchars($currentDeveloper['first_name']); ?></h3>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="dev_id" value="<?php echo htmlspecialchars($dev_id); ?>">
        
        <p>
            <label for="project_title">Project Title</label>
            <input type="text" name="project_title" required>
        </p>
        <p>
            <label for="tech_stack">Technologies Used</label>
            <input type="text" name="tech_stack" required>
        </p>
        <input type="submit" name="insertProjectBtn" value="Add Project">
    </form>

    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th>Project ID</th>
            <th>Project Title</th>
            <th>Tech Stack</th>
            <th>Action</th>
        </tr>
        <?php 
        $projects = getProjectsByDeveloper($pdo, $dev_id); 
        
        if (!empty($projects)) {
            foreach ($projects as $row) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['project_id']); ?></td>
                <td><?php echo htmlspecialchars($row['project_title']); ?></td>
                <td><?php echo htmlspecialchars($row['tech_stack']); ?></td>
                <td>
                    <a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&dev_id=<?php echo $dev_id; ?>">Edit</a>
                    <a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&dev_id=<?php echo $dev_id; ?>">Delete</a>
                </td>
            </tr>
            <?php } 
        } else { ?>
            <tr>
                <td colspan="4">No projects found for this developer.</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
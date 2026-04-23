<?php require_once 'core/dbConfig.php'; ?>
<h1>Are you sure you want to delete this developer?</h1>
<form action="core/handleForms.php?dev_id=<?php echo $_GET['dev_id']; ?>" method="POST">
    <input type="submit" name="deleteDevBtn" value="Yes, Delete">
    <a href="index.php">Cancel</a>
</form>
<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<h1>Edit Developer</h1>
<form action="core/handleForms.php?dev_id=<?php echo $_GET['dev_id']; ?>" method="POST">
    <p><label>First Name</label> <input type="text" name="first_name"></p>
    <p><label>Last Name</label> <input type="text" name="last_name"></p>
    <p><label>Specialization</label> <input type="text" name="specialization"></p>
    <input type="submit" name="editDevBtn">
</form>
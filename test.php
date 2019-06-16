<form action="test.php" method="get">
 <p>Your name: <input type="text" name="name" /></p>
 <p>Your age: <input type="text" name="age" /></p>
 <p><input type="submit" /></p>
</form>

Hi <?php echo htmlspecialchars($_GET['name']); ?>.
You are <?php echo (int)$_GET['age']; ?> years old.

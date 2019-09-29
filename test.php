<html>

<form action="test1.php">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="submit" value="Submit">
    <select name="UserType">
      <option value="supplier">Supplier</option>
      <option value="client">Client</option>
    </select>
</form>
</html>
<?php
echo nl2br("One line.\nAnother line.");
?>


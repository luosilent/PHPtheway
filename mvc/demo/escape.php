<!DOCTYPE html>
<html>
<head>
    <title>Output escaping</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Output escaping</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "hello " .$_POST['name'];
}
?>
<form method="post">
    <div>
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>
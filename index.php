<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "webteam_intern";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        $message = " Registration Successful!";
    } else {
        $message = " Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body >
    <h2>Student Registration Form</h2>
    <?php if ($message != "") echo "<p>$message</p>"; ?>
    
    <div class="group"><form method="POST" >
        <label >Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Course:</label><br>
        <input type="text" name="course" required><br><br>

<button>register</button>    </form>
    </div>
</body>
</html>

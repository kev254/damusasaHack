<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    // Retrieve form data
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $contact = $_POST["contact"];
    $location = $_POST["location"];


    // Prepare the SQL statement
    $sql = "INSERT INTO patients (name, age, gender, contact, location, checkin_status)
            VALUES ('$name', $age, '$gender', '$contact', '$location', 1)";

    // Execute the statement
    if ($mysqli->query($sql) === TRUE) {
        echo "New patient record inserted successfully.";
        header('Location: patients.php');	
    } else {
        echo "Error: " . $mysqli->error;
    }
    $mysqli->close();
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Patient</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" name="age" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" name="location" required>
            </div>
            <div class="form-group">
                <label for="checkin_status">Check-in Status:</label>
                <input type="text" class="form-control" name="checkin_status" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
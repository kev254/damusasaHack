<!DOCTYPE html>
<html>
<head>
  <title>Patient Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Patient Information</h2>
    <br>
    <a href="add_patient.php"><button type="submit" class="btn btn-info">Add new patient</button></a>
    <br><br>

    <form method="GET" action="">
      <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search by name or ID">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php
    include 'connection.php';

    // Fetch patient data from the database based on search query
    $search = $_GET['search'] ?? '';
    $sql = "SELECT * FROM Patients WHERE name LIKE '%$search%' OR patient_id LIKE '%$search%'";
    $result = mysqli_query($mysqli, $sql);

    // Display patient data in rows with three columns
    if (mysqli_num_rows($result) > 0) {
      $counter = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $patientID = $row['patient_id'];
        $name = $row['name'];
        $age = $row['age'];
        $gender = $row['gender'];
        $contact = $row['contact'];
        $location = $row['location'];
        $checkinStatus = $row['checkin_status'];

        if ($counter % 3 == 0) {
          echo '<div class="row">';
        }
    ?>

    <div class="col-md-4">
      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title"><?php echo $name; ?></h5>
          <p class="card-text">
            <strong>Patient ID:</strong> <?php echo $patientID; ?><br>
            <strong>Age:</strong> <?php echo $age; ?><br>
            <strong>Gender:</strong> <?php echo $gender; ?><br>
            <strong>Contact:</strong> <?php echo $contact; ?><br>
            <strong>Location:</strong> <?php echo $location; ?><br>
            <strong>Check-in Status:</strong> <?php echo $checkinStatus; ?>
          </p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicalHistoryModal-<?php echo $patientID; ?>">
            Add Medical History
          </button>
          <a href="checkin_patient.php?patient_id=<?php echo $patientID; ?>" class="btn btn-success">Check-in</a>
        </div>
      </div>
    </div>

    <!-- Medical History Modal -->
    <div class="modal fade" id="medicalHistoryModal-<?php echo $patientID; ?>" tabindex="-1" role="dialog" aria-labelledby="medicalHistoryModalLabel-<?php echo $patientID; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="medicalHistoryModalLabel-<?php echo $patientID; ?>">Add Medical History - Patient ID: <?php echo $patientID; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <input type="hidden" name="patient_id" value="<?php echo $patientID; ?>">
              <div class="form-group">
                <label for="medical_condition">Medical Condition:</label>
                <textarea class="form-control" id="medical_condition" name="medical_condition" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="treatment">Treatment:</label>
                <textarea class="form-control" id="treatment" name="treatment" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'connection.php';
              // Retrieve the patient ID and medical history data from the form
              $patientID = $_POST['patient_id'];
              $medicalCondition = $_POST['medical_condition'];
              $treatment = $_POST['treatment'];

              // Insert the medical history record into the database
              $sql = "INSERT INTO MedicalHistory (patient_id, medical_condition, treatment) VALUES ('$patientID', '$medicalCondition', '$treatment')";

              if (mysqli_query($mysqli, $sql)) {
                // Medical history record inserted successfully
                echo '<div class="alert alert-success mt-3">Medical history added successfully.</div>';
              } else {
                // Error inserting medical history record
                echo '<div class="alert alert-danger mt-3">Error: ' . mysqli_error($conn) . '</div>';
              }
            }
            ?>
            
          </div>
        </div>
      </div>
    </div>

    <?php
        $counter++;
        if ($counter % 3 == 0) {
          echo '</div>';
        }
      }

      // Check if there are any remaining open row div tags
      if ($counter % 3 != 0) {
        echo '</div>';
      }
    } else {
      echo "No patients found.";
    }

    // Close the database connection
    mysqli_close($mysqli);
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

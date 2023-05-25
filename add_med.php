<?php
            // Check if the form is submitted
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
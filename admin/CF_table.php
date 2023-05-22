<?php
// If the values are sent from the form
if (
  isset($_POST['service'])
  && isset($_POST['status'])
  && isset($_POST['booking_id'])
) {
  // Database connection file
  require_once 'connection.php';

  // Declare variables to get values from the form
  $booking_id = $_POST['booking_id'];
  $status = $_POST['status'];
  $service = $_POST['service'];

  // SQL update
  $stmt = $conn->prepare("UPDATE bookingall SET status=:status, service=:service WHERE booking_id=:booking_id");
  $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
  $stmt->bindParam(':status', $status, PDO::PARAM_STR);
  $stmt->bindParam(':service', $service, PDO::PARAM_STR);
  $stmt->execute();

  // Sweet Alert
  echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  if ($stmt->rowCount() >= 0) {

    echo '<script>
        swal({
          title: "Add Data Success",
          text: "success",
          type: "success",
          timer: 2000,
          showConfirmButton: false
        }, function(){
          window.location = "bookingtable.php";
        });
      </script>';
  } else {
    echo '<script>
        swal({
          title: "Add data fail",
          text: "Add data fail",
          type: "success",
          timer: 2000,
          showConfirmButton: false
        }, function(){
          window.location.href = "bookingtable.php";
        });
      </script>';
  }
  $conn = null; //close connect db
} //isset
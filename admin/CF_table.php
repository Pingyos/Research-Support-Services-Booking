<?php
// Assuming you have established a database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form values
    $timeslot = $_POST['timeslot'];
    $tel = $_POST['tel']; // Change the input name to something unique for service type
    $manutitle = $_POST['manutitle'];
    $meetingOption = $_POST['tel']; // Change the input name to something unique for meeting option
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $status = $_POST['status'];
    $service = $_POST['service'];

    // Update the database
    $query = "UPDATE bookingall SET 
                timeslot = '$timeslot', 
                serviceType = '$serviceType', 
                researchTitle = '$researchTitle', 
                meetingOption = '$meetingOption', 
                name = '$name', 
                email = '$email', 
                tel = '$tel', 
                status = '$status', 
                roomId = '$roomId' 
              WHERE id = $booking_id"; // Replace $bookingId with the ID of the record you want to update

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if the update was successful
    if ($result) {
        // Show success message using SweetAlert
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script>
          swal({
            title: "Add Data Success",
            text: "success",
            type: "success",
            timer: 2000,
            showConfirmButton: false
          }, function(){
            window.location.href = "date_u.php";
          });
        </script>';
    } else {
        // Show failure message using SweetAlert
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script>
          swal({
            title: "Add Data Fail",
            text: "Add data fail",
            type: "error",
            timer: 2000,
            showConfirmButton: false
          }, function(){
            window.location.href = "bookingtable.php";
          });
        </script>';
    }

    // Close the database connection
    mysqli_close($connection);
}

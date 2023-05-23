<?php
if (
    isset($_POST['booking_id'])
    && isset($_POST['manutitle'])
    && isset($_POST['title'])
    && isset($_POST['timeslot'])
    && isset($_POST['option_add'])
    && isset($_POST['name'])
    && isset($_POST['email'])
    && isset($_POST['tel'])
    && isset($_POST['instructor'])
    && isset($_POST['status'])
    && isset($_POST['service'])
) {

    require_once 'connect.php';
    $booking_id = $_POST['booking_id'];
    $manutitle = $_POST['manutitle'];
    $title = $_POST['title'];
    $timeslot = $_POST['timeslot'];
    $option_add = $_POST['option_add'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $status = $_POST['status'];
    $option_add = $_POST['option_add'];
    $service = $_POST['service'];
    //sql update
    $stmt = $conn->prepare("UPDATE  bookingall SET manutitle=:manutitle, title=:title, timeslot=:timeslot, option_add=:option_add, name=:name, email=:email, tel=:tel, instructor=:instructor, status=:status, service=:service WHERE booking_id=:booking_id");
    $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);
    $stmt->bindParam(':manutitle', $manutitle, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':timeslot', $timeslot, PDO::PARAM_STR);
    $stmt->bindParam(':option_add', $option_add, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':instructor', $instructor, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':service', $service, PDO::PARAM_STR);
    $stmt->execute();
    // sweet alert 
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
          window.location = "MC_booking.php";  
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
          window.location.href = "MC_booking.php";
        });
      </script>';
    }
    $conn = null; //close connect db
} //isset

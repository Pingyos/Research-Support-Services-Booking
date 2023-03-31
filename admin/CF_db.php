
<?php
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['name']) && isset($_POST['title']) && isset($_POST['option_add']) && isset($_POST['timeslot']) && isset($_POST['date']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['instructor']) && isset($_POST['manutitle']) && isset($_POST['designation']) && isset($_POST['booking_id'])) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connection.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $booking_id = $_POST['booking_id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $option_add = $_POST['option_add'];
    $timeslot = $_POST['timeslot'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $instructor = $_POST['instructor'];
    $manutitle = $_POST['manutitle'];
    $designation = $_POST['designation'];
    //sql update
    $stmt = $conn->prepare("UPDATE  booking SET name=:name, title=:title, title=:title, option_add=:option_add, timeslot=:timeslot, date=:date, email=:email, tel=:tel, instructor=:instructor, manutitle=:manutitle, designation=:designation WHERE booking_id=:booking_id");
    $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':option_add', $option_add, PDO::PARAM_INT);
    $stmt->bindParam(':timeslot', $timeslot, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_INT);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':instructor', $instructor, PDO::PARAM_STR);
    $stmt->bindParam(':manutitle', $manutitle, PDO::PARAM_STR);
    $stmt->bindParam(':designation', $designation, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() >= 0) {
        echo '<script>
         setTimeout(function() {
          swal({
              title: "แก้ไขข้อมูลสำเร็จ",
              type: "success"
          }, function() {
              window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
    } else {
        echo '<script>
         setTimeout(function() {
          swal({
              title: "เกิดข้อผิดพลาด",
              type: "error"
          }, function() {
              window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
    }
    $conn = null; //close connect db
} //isset
?>
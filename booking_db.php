<?php $mysqli = new mysqli('localhost', 'root', '', 'booking');
    if (isset($_GET['date'])) {
        $date = $_GET['date'];
        $stmt = $mysqli->prepare("select * from booking where date = ?");
        $stmt->bind_param('s', $date);
        $bookings = array();
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $bookings[] = $row['timeslot'];
                }

                $stmt->close();
            }
        }
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $option_add = $_POST['option_add'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $timeslot = $_POST['timeslot'];
        $designation = $_POST['designation'];
        $comments = $_POST['comments'];
        $stmt = $mysqli->prepare("select * from booking where date = ? AND timeslot=?");
        $stmt->bind_param('ss', $date, $timeslot);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $msg = '<script>
                swal({
                  title: "booking failed",
                  text: "booking failed",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                  window.location.href = "booking.php";
                });
              </script>';
            } else {
                $stmt = $mysqli->prepare("INSERT INTO booking (name,title,option_add,timeslot,email,tel,designation,date,comments) VALUES (?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param('sssssssss', $name, $title, $option_add, $timeslot, $email, $tel, $designation, $date, $comments);
                $stmt->execute();
                $msg = '<script>
                swal({
                  title: "booking success",
                  text: "booking success",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                  window.location.href = "Check.php";
                });
              </script>';
                $bookings[] = $timeslot;
                $stmt->close();
                $mysqli->close();
            }
        }
    }

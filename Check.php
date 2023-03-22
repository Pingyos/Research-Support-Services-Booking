<!DOCTYPE html>
<html lang="en">

<?php require_once 'head.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<body>
    <?php require_once 'header.php'; ?>

    <!-- ======= Hero Section ======= -->
    <section class="d-flex flex-column justify-content-center align-items-center">
    </section>
    <!-- End Hero -->
    <div class="container">
        <div class="row">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>name</th>
                        <th>timeslot</th>
                        <th>date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT* FROM booking ");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    $countrow = 1;
                    foreach ($result as $t1) {
                    ?>
                        <tr>
                            <td><?= $countrow ?></td>
                            <td><?= $t1['title']; ?></td>
                            <td><?= $t1['name']; ?></td>
                            <td><?= $t1['timeslot']; ?></td>
                            <td><?= $t1['date']; ?></td>
                            <td><?php
                                $designation = $t1['designation'];
                                $id = $t1['id'];
                                if ($designation == 1) {
                                    echo "<a  href=deactivate.php?id=" . $id . "><button type='button' class='btn btn-outline-danger'>Deactivate</button></a>";
                                } else if ($designation == 0) {
                                    echo "<a href=activate.php?id=" . $id . "><button type='button' class='btn btn-outline-primary'>Activate</button></a>";
                                } ?> </td>
                        </tr>

                    <?php $countrow++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>

</body>

</html>
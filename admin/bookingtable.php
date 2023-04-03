<!doctype html>

<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<?php require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="animated fadeIn"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Type</th>
                                        <th>Booked by</th>
                                        <th>Date</th>
                                        <th>View data </th>
                                        <th>Status</th>
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
                                            <td><?= $t1['timeslot']; ?>/<?= $t1['date']; ?></td>
                                            <td><a href="CFbooking.php?booking_id=<?= $t1['booking_id']; ?>" class="btn btn-outline-success">View</a></td>
                                            <td> <?php
                                                    $designation = $t1['designation'];
                                                    $booking_id = $t1['booking_id'];
                                                    if ($designation == 1) {
                                                        echo "<a  href=deactivate.php?booking_id=" . $booking_id . "><button type='button' class='btn btn-outline-danger'>Confirm</button></a>";
                                                    } else if ($designation == 0) {
                                                        echo "<a href=activate.php?booking_id=" . $booking_id . "><button type='button' class='btn btn-outline-primary'>waiting for confirmation</button></a>";
                                                    } ?></td>

                                        </tr>
                                    <?php $countrow++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>


</body>

</html>
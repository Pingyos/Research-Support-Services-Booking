<?php
require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php require_once 'header.php'; ?>
        <div class="content">
            <div class="animated fadeIn">
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
                                            <th>Detial</th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT * FROM bookingall WHERE instructor = 'Dr-Patompong-Khaw-on'");
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
                                                <td>
                                                    <a href="#?booking_id=<?= $t1['booking_id']; ?>" data-toggle="modal" data-target="#exampleModal<?= $t1['booking_id']; ?>" class="btn btn-success">
                                                        <i class="fa fa-magic"></i>&nbsp; View
                                                    </a>
                                                </td>
                                                <td><a href="del_u.php?booking_id=<?= $t1['booking_id']; ?>" class="btn btn-danger" onclick="return confirm('Confirm Data Deletion !!');">Del</a></td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal<?= $t1['booking_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="card-title">
                                                                    <h3 class="text-center">Details</h3>
                                                                </div>
                                                                <hr>
                                                                <form method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <input type="hidden" name="booking_id" value="<?= $t1['booking_id']; ?>">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="manutitle">Research Title</label>
                                                                                <input type="text" name="manutitle" value="<?= $t1['manutitle']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="date">Date</label>
                                                                                <input type="text" name="date" class="form-control" value="<?= $t1['date']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="timeslot">Time </label>
                                                                                <input type="text" name="timeslot" class="form-control" value="<?= $t1['timeslot']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="title">Service Type</label>
                                                                                <input type="text" name="title" value="<?= $t1['title']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="option_add">Meeting Option</label>
                                                                                <input type="text" name="option_add" value="<?= $t1['option_add']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?= $t1['name']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" name="email" value="<?= $t1['email']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="tel">Tel</label>
                                                                                <input type="text" name="tel" value="<?= $t1['tel']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="instructor">Instructor</label>
                                                                                <input type="text" name="instructor" value="<?= $t1['instructor']; ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="has-warning-form-group">
                                                                                <label for="status" class="form-control-label">Status</label>
                                                                                <select name="status" id="status" class="is-valid form-control-success form-control" required>
                                                                                    <option value="<?= $t1['status']; ?>"><?= $t1['status']; ?></option>
                                                                                    <option value="Waiting for confirmation">Waiting for confirmation</option>
                                                                                    <option value="Confirmed">Confirmed </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="has-warning form-group">
                                                                                <label for="service" class="form-control-label">Room/ID-zoom</label>
                                                                                <input required type="text" name="service" value="<?= $t1['service']; ?>" class="is-valid form-control-success form-control">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div>
                                                                        <button type="submit" class="btn btn-success btn-block">
                                                                            <span type="submit">Confirm</span>
                                                                        </button>
                                                                        <!-- <?php echo '<pre>';
                                                                                print_r($_POST);
                                                                                echo '</pre>';
                                                                                ?> -->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $countrow++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php require_once 'CF_booking.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#exampleModal').trigger('focus')
        })
    </script>

</body>

</html>
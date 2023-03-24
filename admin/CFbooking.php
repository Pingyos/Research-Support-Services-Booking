<!doctype html>

<html class="no-js" lang="">
<?php require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </header>

        <div class="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            require_once 'connection.php';
                            $stmt = $conn->prepare("SELECT* FROM booking WHERE id=?");
                            $stmt->execute([$_GET['id']]);
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() < 1) {
                                header('Location: index.php');
                                exit();
                            }
                        } //isset
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="university" class="control-label mb-1">Name</label>
                                    <input type="text" name="university" value="<?= $row['name']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking" class="control-label mb-1">Title</label>
                                    <input type="text" name="ranking" value="<?= $row['title']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="university" class="control-label mb-1">Option</label>
                                    <input type="text" name="university" value="<?= $row['option_add']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking" class="control-label mb-1">Timeslot</label>
                                    <input type="text" name="ranking" value="<?= $row['timeslot']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="university" class="control-label mb-1">Email</label>
                                    <input type="text" name="university" value="<?= $row['email']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking" class="control-label mb-1">Tel</label>
                                    <input type="text" name="ranking" value="<?= $row['tel']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="comments" class="control-label mb-1">Comments</label>
                                    <input type="text" name="comments" value="<?= $row['comments']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <?php require_once 'script.php'; ?>
</body>

</html>
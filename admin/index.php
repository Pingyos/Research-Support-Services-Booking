<?php require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>

    <div id="right-panel" class="right-panel">
        <?php require_once 'header.php'; ?>

        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <!-- totaU -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaU FROM bookingall");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-server"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">University</div><span class="count"><?php echo $result['totaU']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaU -->
                    <!-- totaC -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaC FROM bookingall");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i>C</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity C</div><span class="count"><?php echo $result['totaC']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaC -->
                    <!-- totaA -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaA FROM bookingall");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i>A</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity A</div><span class="count"><?php echo $result['totaA']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaA -->
                    <!-- totaR -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaR FROM bookingall");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i>R</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity R</div><span class="count"><?php echo $result['totaR']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaR -->
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'scripts.php'; ?>

</html>
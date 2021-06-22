<?php
$conn = mysqli_connect("localhost", "root", "", "universityrankingadmin");
$count = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>University Ranking - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">University Ranking</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin Site</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                University Ranking
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">University Ranking</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add New University Ranking Here!</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4" class="table count">
                                    <div class="card-body">Total University</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"><?php echo $count; ?> University</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                        <h4>Enter all details</h4>
                        <form action="insertdata.php" method="post">
                            <div class="form">
                                <label for="">University</label>
                                <input type="text" placeholder="Enter university name" name="uni_name">
                            </div>
                            <div class="form">
                                <label for="">Overall Score</label>
                                <input type="text" placeholder="Enter overall score" name="overall_score">
                            </div>
                            <div class="form">
                                <label for="">Academic Reputation</label>
                                <input type="text" placeholder="Enter academic reputation" name="academic_reputation">
                            </div>
                            <div class="form">
                                <label for="">Employee Reputation</label>
                                <input type="text" placeholder="Enter employee reputation" name="employee_reputation">
                            </div>
                            <div class="form">
                                <label for="">Student Ratio</label>
                                <input type="text" placeholder="Enter student ratio" name="student_ratio">
                            </div>
                            <div class="class row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Insert</button>
                                </div>
                            </div>
                        </form> 
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                University Ranking Data
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>University</th>
                                            <th>Overall Score (%)</th>
                                            <th>Academic Reputation (%)</th>
                                            <th>Employee Reputation (%)</th>
                                            <th>Student Faculty Ratio (%)</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql = "SELECT * FROM `university_data`";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $count++;
                                            echo '<tbody>
                                            <tr>
                                                <td>'.$row['rank_no'].'</td>
                                                <td>'.$row['uni_name'].'</td>
                                                <td>'.$row['overall_score'].'</td>
                                                <td>'.$row['academic_reputation'].'</td>
                                                <td>'.$row['employee_reputation'].'</td>
                                                <td>'.$row['student_ratio'].'</td>
                                            </tr>
                                            </tbody>';
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="chart-area-demo.js"></script>
        <script src="chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="datatables-simple-demo.js"></script>
    </body>
</html>

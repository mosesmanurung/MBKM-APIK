<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <div class="dropdown col-md-4 my-auto">
                <span class="dropdown-toggle" type="button" data-toggle="modal" data-target="#ModalTransaksiBaru" aria-haspopup="true" aria-expanded="false">
                    Date
                </span>
            </div>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            Report
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="chart-bar">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="chart-pie">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart-pie">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; APIK 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    <div class="modal fade" id="ModalTransaksiBaru" tabindex="-1" role="dialog" aria-labelledby="ModalTransaksiBaruLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action flex-column align-items-start">
                            <h6>Bulan Ini</h6>
                            <span class="">
                                01/07/2022 - 31/07/2022
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action flex-column align-items-start">
                            <h6>Bulan Sebelumnya</h6>
                            <span class="">01/06/2022 - 30/06/2022</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content Wrapper -->
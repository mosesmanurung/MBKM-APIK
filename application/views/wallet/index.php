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

            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Alerts -->
                <li class="nav-item no-arrow mx-1 my-auto">
                    <button class="btn btn-primary tambahWallet" data-toggle="modal" data-target="#ModalWalletBaru">Tambah Wallet</button>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            My Wallet
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <?php foreach ($dompet as $d) : ?>
                                    <?php
                                    $pemasukkanDompet = $this->data->getPemasukkanByWallet($d['id_dompet']);
                                    $pengeluaranDompet = $this->data->getPengeluaranByWallet($d['id_dompet']);
                                    $total = $pemasukkanDompet['nominal'] - $pengeluaranDompet['nominal'];
                                    ?>

                                    <li class="list-group-item">
                                        <a href="#" class="d-flex text-secondary editWallet" data-toggle="modal" data-target="#ModalWalletBaru" data-id="<?= $d['id_dompet'] ?>">
                                            <span class="mr-auto p-2"><?= $d['nama_dompet'] ?></span>
                                            <span class="p2 align-self-center">Rp. <?= $total ?></span>
                                        </a>
                                    </li>

                                <?php endforeach; ?>
                            </ul>
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
    <div class="modal fade" id="ModalWalletBaru" tabindex="-1" role="dialog" aria-labelledby="ModalWalletBaruLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('wallet') ?>">
                    <div class="modal-body">
                        <input type="hidden" name="id_dompet" id="id_dompet">
                        <label class="mr-sm-2">Nama Wallet</label>
                        <input type="text" class="form-control" placeholder="Wallet" name="dompet" id="dompet">
                        <?= form_error('dompet', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="modal-footer">
                        <a href="" onclick="return confirm('Yakin Mau dihapus?')" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Content Wrapper -->
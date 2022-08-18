<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">
            <div class="row mt-5">
                <div class="col-lg-6 mx-auto">
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= base_url('assets/img/profile/default.jpg') ?>" alt="" class="rounded-circle w-50">
                            </div>
                            <div class="d-flex justify-content-center mt-5">
                                <form action="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" value="<?= $user['username'] ?>" name="username" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" id="email" value="<?= $user['email'] ?>" name="email" disabled>
                                    </div>
                                </form>
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
    <div class="modal fade" id="ModalWalletBaru" tabindex="-1" role="dialog" aria-labelledby="ModalWalletBaruLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label class="mr-sm-2">Nama Wallet</label>
                        <input type="text" class="form-control" placeholder="Wallet">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content Wrapper -->
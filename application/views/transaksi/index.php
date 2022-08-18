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
                <span class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dompet
                </span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <?php foreach ($dompet as $d) : ?>
                        <?php
                        $pemasukkanDompet = $this->data->getPemasukkanByWallet($d['id_dompet']);
                        $pengeluaranDompet = $this->data->getPengeluaranByWallet($d['id_dompet']);
                        $total = $pemasukkanDompet['nominal'] - $pengeluaranDompet['nominal'];
                        ?>
                        <button class="dropdown-item d-flex" type="button">
                            <span class="mr-auto p-2"><?= $d['nama_dompet'] ?></span>
                            <span class="p2 align-self-center">Rp. <?= $total ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Alerts -->
                <li class="nav-item no-arrow mx-1 my-auto">
                    <button class="btn btn-primary tambahTransaksi" data-toggle="modal" data-target="#ModalTransaksiBaru">Tambah Transaksi</button>
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
                            <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link " id="tab-bulan-sebelumnya" data-toggle="pill" href="#bulan-sebelumnya" role="tab" aria-controls="bulan-sebelumnya" aria-selected="true">Bulan sebelumnya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-bulan-ini" data-toggle="pill" href="#bulan-ini" role="tab" aria-controls="bulan-ini" aria-selected="false">Bulan Ini</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="tab-bulan-depan" data-toggle="pill" href="#bulan-depan" role="tab" aria-controls="bulan-depan" aria-selected="false">Bulan Depan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="bulan-ini" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <?php $pemasukkanTotal = $this->data->getPemasukkanWallet();
                                    $pengeluaranTotal = $this->data->getPengeluaranWallet();
                                    ?>
                                    <div>
                                        <div class="row justify-content-between">
                                            <span class="col-md-4">Inflow</span>
                                            <span class="col-md-4 text-right">Rp. <?= $pemasukkanTotal['nominal'] ?></span>
                                        </div>
                                        <div class="row justify-content-between">
                                            <span class="col-md-4">Outflow</span>
                                            <span class="col-md-4 text-right">Rp. <?= $pengeluaranTotal['nominal'] ?></span>
                                        </div>
                                        <hr>
                                        <div class="row justify-content-between">
                                            <span class="col-md-4"></span>
                                            <span class="col-md-4 text-right">Rp. <?= $pemasukkanTotal['nominal'] - $pengeluaranTotal['nominal']; ?></span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="" class="font-weight-bold">Lihat Laporan untuk Periode Ini</a>
                                        </div>
                                    </div>
                                    <?php foreach ($tanggal as $tgl) :
                                        $pemasukkan = $this->data->getPemasukkan($tgl['tgl']);
                                        $pengeluaran = $this->data->getPengeluaran($tgl['tgl']);
                                        $total = ((int)$pemasukkan['Pemasukkan']) - ((int)$pengeluaran['Pengeluaran']);
                                    ?>
                                        <hr class="border">
                                        <div>
                                            <div class="row justify-content-between">
                                                <div class="row col-md-4">
                                                    <span class="col-md-5">
                                                        <h1><?= date('d', $tgl['tgl']); ?></h1>
                                                    </span>
                                                    <span class="col-md-7">
                                                        <div class="row">
                                                            <span class="col-md-12"><?= date('l', $tgl['tgl']); ?></span>
                                                            <span class="col-md-12"><?= date('F Y', $tgl['tgl']); ?></span>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="col-md-4 text-right align-self-center">
                                                    <Span>Rp <?= $total ?></Span>
                                                </div>
                                            </div>
                                            <hr>
                                            <ul class="list-group list-group-flush">
                                                <?php $data = $this->data->getTransaksi($tgl['tgl']);
                                                foreach ($data as $dataTransaksi) : ?>
                                                    <li class="list-group-item">
                                                        <a href="#" class="text-secondary EditTransaksi" data-toggle="modal" data-target="#ModalTransaksiBaru" data-id="<?= $dataTransaksi['id_transaksi'] ?>">
                                                            <div class="row justify-content-between">
                                                                <div class="row col-md-4">
                                                                    <span class="col-md-5 text-center align-self-center">
                                                                        <i class="fas <?= $dataTransaksi['icon'] ?>"></i>
                                                                    </span>
                                                                    <span class="col-md-7 align-self-center">
                                                                        <span class=""><?= $dataTransaksi['nama_kategori'] ?></span>
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-4 text-right align-self-center">
                                                                    <Span>
                                                                        <?php
                                                                        if ($dataTransaksi['id_jenis'] == 1) {
                                                                            echo "+ ";
                                                                        } elseif ($dataTransaksi['id_jenis'] == 2) {
                                                                            echo "- ";
                                                                        } ?>
                                                                        Rp. <?= $dataTransaksi['nominal']; ?></Span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="tab-pane fade show" id="bulan-sebelumnya" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <span class="text-center">Belum ada data ;(</span>
                                </div>
                                <div class="tab-pane fade show" id="bulan-depan" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <span class="text-center">Belum ada data ;(</span>
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('transaksi') ?>">
                    <div class="modal-body">
                        <div class="form-row justify-content-between">
                            <input type="hidden" name="id_transaksi" id="id_transaksi">
                            <div class="col-md-4 my-1">
                                <label class="mr-md-2" for="inlineFormCustomSelect">Dompet</label>
                                <select class="custom-select mr-md-2" id="dompet" name="dompet">
                                    <?php foreach ($dompet as $d) : ?>
                                        <option value="<?= $d['id_dompet'] ?>"><?= $d['nama_dompet']; ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-4 my-1">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                                <select class="custom-select mr-sm-2" id="kategori" name="kategori">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori'] ?>"><?= $k['jenis']; ?> - <?= $k['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-4 my-1">
                                <label class="mr-sm-2">Nominal</label>
                                <input type="number" class="form-control" placeholder="Nominal" id="nominal" name="nominal">
                                <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-row justify-content-between">
                            <div class="col-md-4 my-1">
                                <label class="mr-md-2" for="inlineFormCustomSelect">Tanggal</label>
                                <input type="date" class="form-control" placeholder="Note" value="<?= date('Y-m-d'); ?>" id="tanggal" name="tanggal">
                            </div>
                            <div class="col-md-8 my-1">
                                <label class="mr-sm-2">Note</label>
                                <input type="text" class="form-control" placeholder="Note" id="keterangan" name="keterangan">
                            </div>
                        </div>
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
$(document).ready(function () {
    $('.nav-link').on('click', function () {
        console.log(this);
    })
    $('.tambahTransaksi').on('click', function () {
        $('#ModalLabel').html('Tambah Transaksi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'tramsaksi');
        $('#dompet').val('');
        $('#kategori').val('');
        $('#nominal').val('');
        $('#tanggal').val('')
        $('#keterangan').val('');
        $('.modal-footer a').addClass('fade');
        
    });
    $('.EditTransaksi').on('click', function () {
        const id = $(this).data('id');
        $('#ModalLabel').html('Ubah Transaksi');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-content form').attr('action', 'transaksi/ubahTransaksi');
        $('.modal-footer a').attr('href', 'transaksi/hapusTransaksi/'+id);
        $('.modal-footer a').removeClass('fade');
        $.ajax({
            url: "transaksi/getTransaksiId",
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                const unixTime = data.tgl;
                const date = new Date(unixTime * 1000);
                console.log(date.getFullYear() + "-0" + date.getMonth() + "-" + date.getDate())
                $('#id_transaksi').val(data.id_transaksi)
                $('#tanggal').val(date.getFullYear() + "-0" + (date.getUTCMonth()+1) + "-0" + date.getDate())
                $('#dompet').val(data.id_wallet);
                $('#kategori').val(data.id_kategori);
                $('#nominal').val(data.nominal);
                $('#keterangan').val(data.keterangan);
            }
        })
    });
    $('.tambahWallet').on('click', function () {
        $('#ModalLabel').html('Tambah Wallet');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'wallet');
        $('#dompet').val('');
        $('.modal-footer a').addClass('fade');
        
    });
    $('.editWallet').on('click', function () {
        const id = $(this).data('id');
        console.log(id);
        $('#ModalLabel').html('Ubah Wallet');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-content form').attr('action', 'wallet/ubahWallet');
        $('.modal-footer a').attr('href', 'wallet/hapusWallet/'+id);
        $('.modal-footer a').removeClass('fade');
        $.ajax({
            url: "wallet/getWallet",
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_dompet').val(data.id_dompet);
                $('#dompet').val(data.nama_dompet);
            }
        })
    });
});
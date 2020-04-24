<h2 class="text-center mt-3"><?= $judul; ?></h2>
<form id="form" action="" method="POST">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input id="min" type="date" class="form-control" name="tgl_awal" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input id="max" type="date" class="form-control" name="tgl_akhir" required>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="cari">Cari</button>
                    <button type="submit" class="btn btn-danger" id="pdf">Pdf</button>
                    <button type="submit" class="btn btn-success" id="excel">Excel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row mt-3">
    <div class="col-md-12">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead align="center" class="text-white bg-info">
                <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Alamat</th>
                    <th>Kode Invoice</th>
                    <th>Tanggal Transaksi</th>
                    <th>Tanggal Bayar</th>
                    <th>Batas Waktu</th>
                    <th>Total Harga</th>
                    <th>Status Transaksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $a = 0;
                foreach ($data as $d) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $d['nm_member'] ?></td>
                        <td><?= $d['alamat_member'] ?></td>
                        <td><?= $d['kode_invoice'] ?></td>
                        <td><?= $d['tgl_transaksi'] ?></td>
                        <td><?= $d['tgl_bayar'] ?></td>
                        <td><?= $d['batas_waktu'] ?></td>
                        <td><?= $d['total_harga'] ?></td>
                        <td><?= $d['status_transaksi'] ?></td>
                    </tr>
                    <?php $a = $a + $d['total_harga']; ?>
                <?php endforeach ?>
            </tbody>
        </table>
        <label><b>Total Pemasukan adalah <?= number_format($a, 0, ',', '.') ?></b></label>
    </div>
</div>
<script>
    $('#cari').click(function() {
        $('#form').attr('action', "<?= base_url('C_Laporan/cari') ?>");
        $('#form').submit();
    });
    $('#pdf').click(function() {
        $('#form').attr('action', "<?= base_url('C_Laporan/pdf') ?>");
        $('#form').submit();
    });
    $('#excel').click(function() {
        $('#form').attr('action', "<?= base_url('C_Laporan/excel') ?>");
        $('#form').submit();
    });
</script>
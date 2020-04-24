<h2 class="text-center mt-3"><?= $judul; ?></h2>
<?php if ($this->session->flashdata()) : ?>
    <div class="alert alert-success mt-3">
        <?= $this->session->flashdata('status'); ?>
    </div>
<?php endif ?>
<div class="form-inline">
    <a href="<?php echo site_url('C_Paket/formtambahstandar') ?>" class="btn btn-primary"> Tambah Standar</a>
    <a href="<?php echo site_url('C_Paket/formtambahpaketan') ?>" class="btn btn-primary ml-3"> Tambah Paketan</a>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead align="center" class="text-white bg-info">
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>deskripsi</th>
                    <th>jenis</th>
                    <th>Outlet</th>
                    <th>gambar</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $a = 0;
                foreach ($data as $d) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $d['nm_paket'] ?></td>
                        <td><?= $d['deskripsi_paket'] ?></td>
                        <td><?= $d['jenis_paket'] ?></td>
                        <td><?= $d['nm_outlet'] ?></td>
                        <?php if ($d['gambar_paket']) : ?>
                            <td><img src="<?= base_url('assets/image/' . $d['gambar_paket']) ?>" width="70px"></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif ?>
                        <td><?= $d['harga_paket'] ?></td>
                        <td align="center">
                            <a href="<?php echo site_url('C_Paket/formedit/' . $d['id_paket']) ?>" class="btn btn-success">Edit </a>
                            <a href="<?php echo site_url('C_Paket/hapus/' . $d['id_paket']) ?>" class="btn  btn-danger" onclick="return confirm('Yakin ingin menghapus')"> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
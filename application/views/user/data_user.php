<h2 class="text-center mt-3"><?= $judul; ?></h2>
<?php if ($this->session->flashdata()) : ?>
    <div class="alert alert-success mt-3">
        <?= $this->session->flashdata('status'); ?>
    </div>
<?php endif ?>
<a href="<?php echo site_url('C_user/formtambah') ?>" class="btn btn-primary"> Tambah</a>
<div class="row mt-3">
    <div class="col-md-12">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead align="center" class="text-white bg-info">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Nama Outlet</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $a = 0;
                foreach ($user as $d) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $d['nm_user'] ?></td>
                        <td><?= $d['username'] ?></td>
                        <td><?= $d['role'] ?></td>
                        <td><?= $d['nm_outlet'] ?></td>
                        <td align="center">
                            <a href="<?php echo site_url('C_user/formedit/' . $d['id_user']) ?>" class="btn btn-success">Edit </a>
                            <a href="<?php echo site_url('C_user/hapus/' . $d['id_user']) ?>" class="btn  btn-danger" onclick="return confirm('Yakin ingin menghapus')"> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
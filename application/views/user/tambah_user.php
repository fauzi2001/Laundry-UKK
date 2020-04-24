<h1 class="mt-3"><?= $judul; ?></h1>
<hr>
<?php if ($this->session->has_userdata('username')) : ?>
    <?= form_open('C_user/tambahuser', ['method' => 'POST']) ?>
    <table cellpadding="8">
        <tr>
            <td>Nama</td>
            <td>
                <input type="text" class="form-control" name="nama" required>
                <?= form_error('nama', '<div class="text-danger">', '</div>') ?>
            </td>
        </tr>

        <tr>
            <td>Username</td>
            <td>
                <input type="text" class="form-control" name="username" required>
                <?= form_error('username', '<div class="text-danger">', '</div>') ?>
            </td>
        </tr>

        <tr>
            <td>Password</td>
            <td>
                <input type="password" class="form-control" name="password" required>
                <?= form_error('password', '<div class="text-danger">', '</div>') ?>
            </td>
        </tr>


        <tr>
            <td>konfirmasi Password</td>
            <td>
                <input type="password" class="form-control" name="password1" required>
                <?= form_error('password1', '<div class="text-danger">', '</div>') ?>
            </td>
        </tr>
        <tr>
            <td>Outlet</td>
            <td>
                <select name="outlet" class="form-control">
                    <?php foreach ($outlet as $o) : ?>
                        <option value="<?= $o['id_outlet'] ?>"><?= $o['nm_outlet'] ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>
                <select name="role" class="form-control">
                    <?php foreach ($role as $r) : ?>
                        <option value="<?= $r ?>"><?= $r ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>

    </table>

    <hr>
    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
    <a href="<?php echo base_url('C_Pelanggan/TampilkanMember'); ?>"><input type="button" class="btn btn-danger" value="Batal"></a>
    <?php echo form_close(); ?>
<?php else : ?>
    <?= $this->render_login('login'); ?>
<?php endif ?>
</body>
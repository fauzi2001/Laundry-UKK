<h1 class="mt-3"><?= $judul; ?></h1>
<hr>
<?php if ($this->session->has_userdata('username')) : ?>
    <?= form_open('C_user/edituser/' . $user['id_user'], ['method' => 'POST']) ?>
    <table cellpadding="8">
        <tr>
            <td>Nama</td>
            <td>
                <input type="text" class="form-control" name="nama" required value="<?= $user['nm_user'] ?>">
                <?= form_error('nama', '<div class="text-danger">', '</div>') ?>
            </td>
        </tr>

        <tr>
            <td>Username</td>
            <td>
                <input type="text" class="form-control" name="username" required value="<?= $user['username'] ?>">
                <?= form_error('username', '<div class="text-danger">', '</div>') ?>
            </td>
        </tr>

        <tr>
        <tr>
            <td>Outlet</td>
            <td>
                <select name="outlet" class="form-control">
                    <?php foreach ($outlet as $o) : ?>
                        <?php if ($o['id_outlet'] == $user['id_outlet']) : ?>
                            <option value="<?= $o['id_outlet'] ?>" selected><?= $o['nm_outlet'] ?></option>
                        <?php else : ?>
                            <option value="<?= $o['id_outlet'] ?>"><?= $o['nm_outlet'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>
                <select name="role" class="form-control">
                    <?php foreach ($role as $r) : ?>
                        <?php if ($user['role'] == $r) : ?>
                            <option value="<?= $r ?>" selected><?= $r ?></option>
                        <?php else : ?>
                            <option value="<?= $r ?>"><?= $r ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>

    </table>

    <hr>
    <input type="submit" class="btn btn-primary" name="submit" value="Edit">
    <a href="<?php echo base_url('C_User'); ?>"><input type="button" class="btn btn-danger" value="Batal"></a>
    <?php echo form_close(); ?>
<?php else : ?>
    <?= $this->render_login('login'); ?>
<?php endif ?>
</body>
<h1 class="mt-3"><?= $judul; ?></h1>
<hr>
<?php if ($this->session->has_userdata('username')) : ?>
    <?= form_open_multipart('C_Paket/tambahstandar') ?>
    <table cellpadding="8">
        <tr>
            <td>Nama Paket</td>
            <td>
                <input type="text" class="form-control" name="nama" required>
            </td>
        </tr>

        <tr>
            <td>Deskripsi</td>
            <td>
                <textarea name="deskripsi" required class="form-control"></textarea>
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
            <td>harga</td>
            <td>
                <input type="number" class="form-control" name="harga" required>
            </td>
        </tr>
        <tr>
            <td>gambar</td>
            <td>
                <input type="file" name="gambar" required>
            </td>
        </tr>
    </table>

    <hr>
    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
    <a href="<?php echo base_url('C_Paket'); ?>"><input type="button" class="btn btn-danger" value="Batal"></a>
    <?php echo form_close(); ?>
<?php else : ?>
    <?= $this->render_login('login'); ?>
<?php endif ?>
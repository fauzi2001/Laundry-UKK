<h1 class="mt-3"><?= $judul; ?></h1>
<hr>
<?php if ($this->session->has_userdata('username')) : ?>
    <?= form_open_multipart('C_Paket/editpaket/' . $data['id_paket']) ?>
    <table cellpadding="8">
        <tr>
            <td>Nama Paket</td>
            <td>
                <input type="text" class="form-control" name="nama" value="<?= $data['nm_paket'] ?>" required>
            </td>
        </tr>

        <tr>
            <td>Deskripsi</td>
            <td>
                <textarea name="deskripsi" required class="form-control"><?= $data['deskripsi_paket']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Outlet</td>
            <td>
                <select name="outlet" class="form-control">
                    <?php foreach ($outlet as $o) : ?>
                        <?php if ($o['id_outlet'] == $data['id_outlet']) : ?>
                            <option value="<?= $o['id_outlet'] ?>" selected><?= $o['nm_outlet'] ?></option>
                        <?php else : ?>
                            <option value="<?= $o['id_outlet'] ?>"><?= $o['nm_outlet'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>harga</td>
            <td>
                <input type="number" class="form-control" name="harga" value="<?= $data['harga_paket'] ?>" required>
            </td>
        </tr>
        <?php if ($data['jenis_paket'] == 'standar') : ?>
            <tr>
                <td>gambar</td>
                <td>
                    <img src="<?= base_url('assets/image/' . $data['gambar_paket']) ?>" width="70px">
                    <input type="file" name="gambar">
                </td>
            </tr>
        <?php endif ?>
    </table>

    <hr>
    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
    <a href="<?php echo base_url('C_Paket'); ?>"><input type="button" class="btn btn-danger" value="Batal"></a>
    <?php echo form_close(); ?>
<?php else : ?>
    <?= $this->render_login('login'); ?>
<?php endif ?>
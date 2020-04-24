<h1 class="mt-3"><?= $judul; ?></h1>
<hr>
<?php if ($this->session->has_userdata('username')) : ?>
  <?= form_open('C_pelanggan/ProsesEditMember/' . $data['id_member'], ['method' => 'POST']) ?>
  <table cellpadding="8">
    <tr>
      <td>Nama</td>
      <td><input type="text" class="form-control" name="input_nm_member" required value="<?= $data['nm_member'] ?>"></td>
    </tr>

    <tr>
      <td>Alamat</td>
      <td><textarea name="input_alamat_member" class="form-control" required><?= $data['alamat_member'] ?></textarea></td>
    </tr>

    <tr>
      <td>Jenis Kelamin</td>
      <td>
        <?php if ($data['jk_member'] == 'L') : ?>
          <input type="radio" name="input_jk_member" value="L" checked> Laki-laki
          <input type="radio" name="input_jk_member" value="P"> Perempuan
        <?php else : ?>
          <input type="radio" name="input_jk_member" value="L"> Laki-laki
          <input type="radio" name="input_jk_member" value="P" checked> Perempuan
        <?php endif ?>
      </td>
    </tr>


    <tr>
      <td>Telepon</td>
      <td><input type="text" class="form-control" name="input_tlp_member" required value="<?= $data['tlp_member'] ?>"></td>
    </tr>

  </table>

  <hr>
  <input type="submit" class="btn btn-primary" name="submit" value="Edit">
  <a href="<?php echo base_url('C_Pelanggan/TampilkanMember'); ?>"><input type="button" class="btn btn-danger" value="Batal"></a>
  <?php echo form_close(); ?>
<?php else : ?>
  <?= $this->render_login('login'); ?>
<?php endif ?>
</body>
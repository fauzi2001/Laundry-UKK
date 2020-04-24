  <h1 class="mt-3"><?= $judul; ?></h1>
  <hr>
  <?php if ($this->session->has_userdata('username')) : ?>
    <?= form_open('C_pelanggan/CTambahMember', ['method' => 'POST']) ?>
    <table cellpadding="8">
      <tr>
        <td>Nama</td>
        <td><input type="text" class="form-control" name="input_nm_member" required></td>
      </tr>

      <tr>
        <td>Alamat</td>
        <td><textarea name="input_alamat_member" class="form-control" required></textarea></td>
      </tr>

      <tr>
        <td>Jenis Kelamin</td>
        <td>
          <input type="radio" name="input_jk_member" value="L" checked> Laki-laki
          <input type="radio" name="input_jk_member" value="P"> Perempuan
        </td>
      </tr>


      <tr>
        <td>Telepon</td>
        <td><input type="text" class="form-control" name="input_tlp_member" required></td>
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
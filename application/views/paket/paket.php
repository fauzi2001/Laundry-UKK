<div class="container mt-5">
  <div class="row">
    <?php foreach ($data as $d) : ?>
      <?= form_open('C_service/MasukanKeranjang/' . $d['id_paket'], ['method' => 'POST']) ?>
      <div class="col-lg-4 ml-4">
        <div class="card" style="width: 20rem;">
          <h5 class="card-header">Paket : <?= number_format($d['harga_paket'], 2, ',', '.') ?></h5>
          <div class="card-body">
            <p class="card-text"><?= $d['deskripsi_paket'] ?></p>
            <input type="number" name="kuantitas" value="1" class="form-control mb-4">
            <input type="submit" class="btn btn-info" value="Keranjang">
          </div>
        </div>
      </div>
      <?= form_close() ?>
    <?php endforeach ?>
  </div>
</div>
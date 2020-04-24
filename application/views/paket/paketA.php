<div class="container-fluid">

  <div class="row mt-5 ml-4">
    <?php foreach ($data as $d) : ?>
      <?= form_open('C_service/MasukanKeranjang/' . $d['id_paket'], ['method' => 'POST']) ?>
      <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="<?= base_url('assets/image/' . $d['gambar_paket']) ?>" alt="286 x 180">
          <div class="card-body">
            <h5 class="card-title"><?= $d['nm_paket'] ?> Harga : <?= number_format($d['harga_paket'], 2, ',', '.') ?> </h5>
            <p class="card-text"><?= $d['deskripsi_paket'] ?></p>
            <input type="number" name="kuantitas" value="1" class="form-control mb-2">
            <input type="submit" class="btn btn-info" value="Keranjang">
          </div>
        </div>
      </div>
      <?= form_close() ?>
    <?php endforeach ?>
  </div>

</div>
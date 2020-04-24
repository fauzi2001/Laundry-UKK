<nav class="navbar navbar-expand-lg navbar-dark bg-info">

  <a class="navbar-brand" href="#">laundry</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <?php if ($this->session->userdata('role') == 'admin') : // Jika role-nya admin
    ?>
      <ul class="nav navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_Pelanggan/TampilkanMember'); ?>">member</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_service/TampilkanService'); ?>">Paket</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_service/TampilkanKeranjang'); ?>">Keranjang</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_service/TampilkanPembayaran'); ?>">Transaksi</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_laporan'); ?>">Laporan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_user'); ?>">User</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_Paket'); ?>">Data Paket</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_outlet/Tampilkanoutlet'); ?>">Outlet</a></li>
      </ul>

    <?php endif ?>

    <?php if ($this->session->userdata('role') == 'kasir') : // Jika role-nya kasir
    ?>
      <ul class="nav navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_Pelanggan/TampilkanMember'); ?>">member</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_service/TampilkanService'); ?>">Paket</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_service/TampilkanKeranjang'); ?>">Keranjang</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_service/TampilkanPembayaran'); ?>">Transaksi</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_laporan'); ?>">Laporan</a></li>
      </ul>

    <?php endif ?>

    <?php if ($this->session->userdata('role') == 'owner') : ?>
      <ul class="nav navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('C_Laporan'); ?>">Laporan</a></li>
        </li>
      <?php endif ?>
      </ul>
      <a class="btn btn-outline-light ml-auto" href="<?= base_url('Auth/logout') ?>">logout</a>
  </div>

  </div>

</nav>
<?php if ($this->session->has_userdata('username')) : ?>

	<?php if (!empty($this->session->flashdata('status'))) : ?>
		<div class="alert alert-warning">
			<?= $this->session->flashdata('status') ?>
		</div>
	<?php endif ?>
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-12">
				<h2 class="text-center"><?= $judul; ?></h2>
				<a href="<?php echo site_url('C_outlet/Tambahkanoutlet') ?>" class="btn btn-primary mb-3"> Tambah</a>
				<table id="tabelmember" class="table table-striped table-bordered" style="width:100%">
					<thead class="bg-info text-white" allign="center">
						<tr>
							<th>Id outlet</th>
							<th>Nama outlet</th>
							<th>Alamat outlet</th>
							<th>Tlp Outlet</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($data as $d) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $d['nm_outlet'] ?></td>
								<td><?= $d['alamat_outlet'] ?></td>
								<td><?= $d['tlp_outlet'] ?></td>
								<td align="center">
									<a href="<?php echo site_url('C_outlet/Editoutlet/' . $d['id_outlet']) ?>" class="btn btn-success">Edit </a>
									<a href="<?php echo site_url('C_outlet/Houtlet/' . $d['id_outlet']) ?>" class="btn  btn-danger" onclick="return confirm('Yakin ingin menghapus')"> Hapus</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php else : ?>
	<?php $this->load->view('login') ?>
<?php endif ?>

</body>

</html>
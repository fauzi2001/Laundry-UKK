<?php if ($this->session->has_userdata('username')) : ?>

	<?php if (!empty($this->session->flashdata('status'))) : ?>
		<div class="alert alert-success mt-3">
			<?= $this->session->flashdata('status') ?>
		</div>
	<?php endif ?>
	<h2 class="mt-3 text-center"><?= $judul; ?></h2>
	<div class="container">
		<a href="<?php echo site_url('C_pelanggan/TambahkanMember') ?>" class="btn btn-primary"> Tambah</a>
		<div class="row mt-3">
			<div class="col-md-12">
				<table id="table" class="table table-striped table-bordered" style="width:100%">
					<thead class="bg-info text-white" allign="center">
						<tr>
							<th>No</th>
							<th>ID Member</th>
							<th>Nama Member</th>
							<th>Alamat Member</th>
							<th>Jenis Kelamin</th>
							<th>Tlp Member</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($data as $d) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $d['id_member'] ?></td>
								<td><?= $d['nm_member'] ?></td>
								<td><?= $d['alamat_member'] ?></td>
								<td><?= $d['jk_member'] ?></td>
								<td><?= $d['tlp_member'] ?></td>
								<td align="center">
									<a href="<?php echo site_url('C_pelanggan/EditMember/' . $d['id_member']) ?>" class="btn btn-success">Edit </a>
									<a href="<?php echo site_url('C_pelanggan/HMember/' . $d['id_member']) ?>" class="btn  btn-danger" onclick="return confirm('Yakin ingin menghapus')"> Hapus</a>
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
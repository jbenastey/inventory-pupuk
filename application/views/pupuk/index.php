<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pupuk</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						Data Pupuk
						<?php
						$level = $this->session->userdata('pengguna_level');
						if ($level == 'admin supplier' || $level == 'admin' || $level == 'admin gudang'):
							?>
							<a href="<?= base_url('pupuk/tambah') ?>" class="btn btn-primary btn-sm float-right"><i
									class="fa fa-plus"></i> Tambah Data Pupuk</a><span class="float-right">&nbsp;</span>
						<?php
						endif;
						?>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Pupuk</th>
								<th>Kategori</th>
								<th>Stok</th>
								<th>Harga</th>
								<th>Supplier</th>
								<?php
								if ($level == 'admin supplier' || $level == 'admin' || $level == 'admin gudang'):
									?>
									<th>Aksi</th>
								<?php
								endif;
								?>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($pupuk as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['pupuk_nama'] ?></td>
									<td><?= $value['kategori_nama'] ?></td>
									<td><?= $value['pupuk_stok'] ?></td>
									<td>Rp. <?= nominal($value['pupuk_harga']) ?></td>
									<td><?= $value['supplier_nama'] ?></td>
									<?php
									if ($level == 'admin supplier' || $level == 'admin' || $level == 'admin gudang'):
										?>
										<td>
											<a href="<?= base_url('pupuk/edit/' . $value['pupuk_id']) ?>"
											   class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
											<a href="<?= base_url('pupuk/hapus/' . $value['pupuk_id']) ?>"
											   class="btn btn-danger btn-sm" onclick="return confirm('Hapus data? ')"><i
													class="fa fa-trash-o"></i></a>
										</td>
									<?php
									endif;
									?>
								</tr>
								<?php
								$no++;
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

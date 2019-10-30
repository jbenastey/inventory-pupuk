<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Barang Masuk</h1>
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
						Data Barang Masuk
						<?php
						$level = $this->session->userdata('pengguna_level');
						if ($level == 'admin supplier' || $level == 'admin' || $level == 'admin gudang'):
							?>
							<a href="<?= base_url('masuk/tambah') ?>" class="btn btn-primary btn-sm float-right"><i
									class="fa fa-plus"></i> Tambah Data Barang Masuk</a><span
							class="float-right">&nbsp;</span>
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
								<th>Jumlah</th>
								<th>Tanggal</th>
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
							foreach ($masuk as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['pupuk_nama'] ?></td>
									<td><?= $value['masuk_jumlah'] ?></td>
									<td><?= date_indo($value['masuk_tanggal']) ?></td>
									<?php
									if ($level == 'admin supplier' || $level == 'admin' || $level == 'admin gudang'):
										?>
										<td>
											<a href="<?= base_url('masuk/hapus/' . $value['masuk_id']) ?>"
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

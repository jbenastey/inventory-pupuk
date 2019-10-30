<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengguna</h1>
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
						Data Pengguna
						<a href="<?=base_url('pengguna/tambah')?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah Data Pengguna</a><span class="float-right">&nbsp;</span>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 0;
							foreach ($pengguna as $key=>$value):
								?>
								<?php if ($value['pengguna_level'] != 'admin'): ?>
								<tr>
									<td><?=$no?></td>
									<td><?=$value['pengguna_username']?></td>
									<td><?=$value['pengguna_level']?></td>
									<td>
										<a href="<?=base_url('pengguna/hapus/'.$value['pengguna_id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengguna ?')"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php endif ?>
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

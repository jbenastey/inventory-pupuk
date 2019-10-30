<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Supplier</h1>
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
						Tambah Data Supplier
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url('supplier/tambah') ?>">
							<div class="card-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" name="supplier" placeholder="supplier"
										   required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" id="" cols="20" rows="5"></textarea>
								</div>
								<div class="form-group">
									<label>Username Kepala</label>
									<select name="hak_akses_kepala" class="form-control">
										<?php
										if ($kepala != null):
											foreach ($kepala as $key => $value):
												?>
												<option	value="<?= $value['pengguna_id'] ?>"><?= $value['pengguna_username'] ?></option>
											<?php
											endforeach;
											?><?php
										else:
											?>
											<option disabled> Silahkan tambah pengguna supplier</option><?php
										endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Username Admin</label>
									<select name="hak_akses_admin" class="form-control">
										<?php
										if ($admin != null):
											foreach ($admin as $key => $value):
												?>
												<option	value="<?= $value['pengguna_id'] ?>"><?= $value['pengguna_username'] ?></option>
											<?php
											endforeach;
											?><?php
										else:
											?>
											<option disabled> Silahkan tambah pengguna supplier</option><?php
										endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Username Sekretaris</label>
									<select name="hak_akses_sekretaris" class="form-control">
										<?php
										if ($sekretaris != null):
											foreach ($sekretaris as $key => $value):
												?>
												<option	value="<?= $value['pengguna_id'] ?>" ><?= $value['pengguna_username'] ?></option>
											<?php
											endforeach;
											?><?php
										else:
											?>
											<option disabled> Silahkan tambah pengguna supplier</option><?php
										endif; ?>
									</select>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

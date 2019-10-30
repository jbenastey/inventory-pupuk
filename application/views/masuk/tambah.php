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
						Tambah Data Barang Masuk
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('masuk/tambah')?>">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Pupuk</label>
									<select name="pupuk" class="form-control" required>
										<?php
										foreach ($pupuk as $key=>$value):
										?>
											<option value="<?=$value['pupuk_id']?>"><?=$value['pupuk_nama']?></option>
										<?php
										endforeach;
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Jumlah Masuk</label>
									<input type="number" class="form-control" name="jumlah" required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" class="form-control" name="tanggal" required autocomplete="off">
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

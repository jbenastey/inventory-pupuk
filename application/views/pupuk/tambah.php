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
						Tambah Data Pupuk
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('pupuk/tambah')?>">
							<div class="card-body">
								<div class="form-group">
									<label>Kategori</label>
									<select name="kategori" class="form-control" required>
										<?php
										foreach ($kategori as $key=>$value):
										?>
											<option value="<?=$value['kategori_id']?>"><?=$value['kategori_nama']?></option>
										<?php
										endforeach;
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Nama Pupuk</label>
									<input type="text" class="form-control" name="nama" required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Jumlah Stok</label>
									<input type="number" class="form-control" name="stok" required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="number" class="form-control" name="harga" required autocomplete="off">
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

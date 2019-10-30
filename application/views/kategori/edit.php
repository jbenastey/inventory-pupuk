<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Kategori</h1>
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
						Edit Data Kategori
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('kategori/edit/'.$kategori['kategori_id'])?>">
							<div class="card-body">
								<div class="form-group">
									<label>Kategori</label>
									<input type="text" class="form-control" name="kategori" value="<?=$kategori['kategori_nama']?>" placeholder="Kategori" required autocomplete="off">
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

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Faktur</h1>
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
						Pilih supplier
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('keluar/supplier')?>">
							<div class="card-body">
								<div class="form-group">
									<label>Supplier</label>
									<select name="supplier" class="form-control">
										<?php
										foreach ($supplier as $key=>$value):
											?>
											<option value="<?=$value['supplier_admin_id']?>"><?=$value['supplier_nama']?></option>
										<?php
										endforeach;
										?>
									</select>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" name="selanjutnya" class="btn btn-primary">Selanjutnya</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

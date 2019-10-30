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
					<div class="card-header d-print-none">
						Tambah Data Faktur
					</div>
					<div class="card-body d-print-none">
						<form method="post" action="<?=base_url('keluar/tambah/'.$supplier['supplier_admin_id'])?>">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Supplier</label>
									<input type="text" class="form-control" readonly name="supplier" value="<?php echo $supplier['supplier_nama'] ?>">
								</div>
								<div class="form-group">
									<label>Nama Pupuk</label>
									<select name="pupuk" id="pupuk" class="form-control" required>
										<?php
										if ($pupuk == null){
											echo '<option selected disabled>Tidak ada pupuk</option>';
										}
										?>
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
									<label>Jumlah Keluar</label>
									<input type="number" class="form-control" id="jumlah" name="jumlah" required autocomplete="off">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>
					<hr>
					<div class="card-body">
						<h4>Detail Faktur</h4><br>
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Pupuk</th>
								<th>Jumlah</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								$total = 0;
								foreach ($keluar as $key => $value): ?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $value['pupuk_nama'] ?></td>
										<td><?php echo $value['detail_jumlah'] ?></td>
										<td><?php echo $value['detail_total'] ?></td>
									</tr>
								<?php 
								$no++;
								$total = $total + $value['detail_total'];
							endforeach ?>
							</tbody>
							<tfoot>	
								<tr>	
									<td colspan="3">TOTAL</td>
									<td><?php echo 	$total ?></td>
								</tr>
							</tfoot>
						</table>
						<?php if ($total > 0): ?>
						<div class="card-footer d-print-none">
							<form method="post" action="<?=base_url('keluar/selesai')?>">
								<button type="button" onclick="window.print()" class="btn btn-primary">Lihat Faktur</button>
								<input type="hidden" name="total" value="<?php echo $total ?>">
								<input type="hidden" name="supplier" value="<?php echo $supplier['supplier_id'] ?>">
								<button type="submit" name="selesai" class="btn btn-success">Selesai</button>
							</form>
						</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


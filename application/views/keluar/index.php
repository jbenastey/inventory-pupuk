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
						Data Faktur
						<?php if ($this->session->userdata('pengguna_level') == 'admin gudang'):?>
						<a href="<?=base_url('keluar/supplier')?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Ajukan Faktur</a><span class="float-right">&nbsp;</span>
						<?php endif;?>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>No Faktur</th>
								<th>Total</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($keluar as $key=>$value):
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$value['faktur_id']?></td>
									<td>Rp. <?=nominal($value['faktur_total'])?></td>
									<td><?= date_indo($value['faktur_tanggal'])?></td>
									<td>
										<?php
										if ($value['faktur_status'] == null):
											?>
											Belum divalidasi
										<?php
										elseif ($value['faktur_status'] == 'valid_kepala'):
											?>
											Validasi kepala kantor
										<?php
										elseif ($value['faktur_status'] == 'valid_sekretaris'):
											?>
											Validasi sekretaris supplier
										<?php
										elseif ($value['faktur_status'] == 'valid_supplier'):
											?>
											Validasi kepala supplier
										<?php
										endif;
										?>
									</td>
									<td>
										<a href="<?=base_url('keluar/lihat/'.$value['faktur_id'])?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
									</td>
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

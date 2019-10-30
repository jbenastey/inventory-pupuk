<style>
	@media print{
		#printable{
			height:1200px;
		}
	}
</style>
<div class="content-header d-print-none">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
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
					<div class="card-body" id="printable">
						<h2>Faktur</h2>
						<table>
							<tr>
								<td>Nomor Faktur</td>
								<td> :</td>
								<td><?php echo $faktur['faktur_id'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Faktur</td>
								<td> :</td>
								<td><?php echo date_indo($faktur['faktur_tanggal']) ?></td>
							</tr>
							<tr>
								<td>Nama Supplier</td>
								<td> :</td>
								<td><?php echo $faktur['supplier_nama'] ?></td>
							</tr>
							<tr class="d-print-none">
								<td>Status</td>
								<td> :</td>
								<td>
									<?php
									if ($faktur['faktur_status'] == null):
										?>
										Belum divalidasi
									<?php
									elseif ($faktur['faktur_status'] == 'valid_kepala'):
										?>
										Sudah divalidasi kepala kantor
									<?php
									elseif ($faktur['faktur_status'] == 'valid_sekretaris'):
										?>
										Sudah divalidasi sekretaris supplier
									<?php
									elseif ($faktur['faktur_status'] == 'valid_supplier'):
										?>
										Sudah divalidasi kepala supplier
									<?php
									endif;
									?>
								</td>
							</tr>
						</table>
						<br>
						<table class="table ">
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
							foreach ($detail as $key => $value): ?>
								<tr>
									<td><?php echo $no ?></td>
									<td><?php echo $value['pupuk_nama'] ?></td>
									<td><?php echo $value['detail_jumlah'] ?></td>
									<td>Rp. <?php echo nominal($value['detail_total']) ?></td>
								</tr>
								<?php
								$no++;
								$total = $total + $value['detail_total'];
							endforeach ?>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="3" class="text-right">TOTAL</td>
								<td>Rp. <?php echo nominal($total) ?></td>
							</tr>
							</tfoot>
						</table>
						<div class="card-footer d-print-none">
							<?php if ($faktur['faktur_status'] == null): ?>
								<?php if ($this->session->userdata('pengguna_level') == 'kepala kantor'): ?>
									<a href="<?=base_url('keluar/valid-kepala/'.$faktur['faktur_id'])?>" onclick="return confirm('Validasi Faktur?')" class="btn btn-success"> Validasi</a>
								<?php endif ?>
							<?php elseif ($faktur['faktur_status'] == 'valid_kepala'): ?>
								<?php if ($this->session->userdata('pengguna_level') == 'sekretaris' && $this->session->userdata('pengguna_id') == $faktur['supplier_sekretaris_id']): ?>
									<a href="<?=base_url('keluar/valid-sekretaris/'.$faktur['faktur_id'])?>" onclick="return confirm('Validasi Faktur?')" class="btn btn-success"> Validasi</a>
								<?php endif ?>
							<?php elseif ($faktur['faktur_status'] == 'valid_sekretaris'): ?>
								<?php if ($this->session->userdata('pengguna_level') == 'kepala supplier' && $this->session->userdata('pengguna_id') == $faktur['supplier_kepala_id']): ?>
									<a href="<?=base_url('keluar/valid-supplier/'.$faktur['faktur_id'])?>" onclick="return confirm('Validasi Faktur?')" class="btn btn-success"> Validasi</a>
								<?php endif ?>
							<?php else: ?>
								<?php if ($total > 0): ?>
									<button type="button" onclick="window.print()" class="btn btn-primary">Lihat Faktur
									</button>
								<?php endif ?>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

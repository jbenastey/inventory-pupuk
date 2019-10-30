<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Supplier Pupuk</h1>
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
						Data Supplier
						<a href="<?=base_url('supplier/tambah')?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah Data Supplier</a><span class="float-right">&nbsp;</span>

					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Supplier</th>
								<th>Alamat</th>>
								<th>Admin</th>
								<th>Sekretaris</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($supplier as $key=>$value):
							?>
							<tr>
								<td><?=$no?></td>
								<td><?=$value['supplier_nama']?></td>
								<td><?=$value['supplier_alamat']?></td>
								<td><?=$model->lihat_satu_admin($value['supplier_admin_id'])['pengguna_username']?></td>
								<td><?=$model->lihat_satu_sekretaris($value['supplier_sekretaris_id'])['pengguna_username']?></td>
								<td>
									<a href="<?=base_url('supplier/edit/'.$value['supplier_id'])?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
									<a href="<?=base_url('supplier/hapus/'.$value['supplier_id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data? ')"><i class="fa fa-trash-o"></i></a>
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

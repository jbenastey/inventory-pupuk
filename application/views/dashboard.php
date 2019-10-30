<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
    </div>
    <div class="card-body">
        Selamat Datang <?= $this->session->userdata('session_level');?>, <?= $this->session->userdata('session_name');?>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info-gradient">
                <div class="inner">
                    <h3><?= $this->db->count_all_results('sbk_siswa')?></h3>
                    <p>Semua Siswa</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="<?=base_url('siswa')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger-gradient">
                <div class="inner">
                    <h3><?= $this->db->count_all_results('sbk_pelanggaran')?></h3>

                    <p>Semua Pelanggaran</p>
                </div>
                <div class="icon">
                    <i class="fa fa-pie-chart"></i>
                </div>
                <a href="<?=base_url('pelanggaran')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning-gradient">
                <div class="inner">
                    <h3><?= $this->db->count_all_results('sbk_laporan')?></h3>

                    <p>Laporan Pelanggaran</p>
                </div>
                <div class="icon">
                    <i class="fa fa-address-book"></i>
                </div>
                <a href="<?=base_url('laporan')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <?php
        if ($this->session->userdata('session_level') == 'Guru BK'):
        ?>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success-gradient">
                <div class="inner">
                    <h3>.</h3>

                    <p>Rekap Data</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-o"></i>
                </div>
                <a href="<?=base_url('rekap')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <?php
        endif;
        ?>
    </div>

    </div>
</div>

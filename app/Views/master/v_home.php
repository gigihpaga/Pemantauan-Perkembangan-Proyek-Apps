<?= $this->extend('layout/v_index'); ?>
<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Filter Dashboard</h3>
									</div>
									<div class="card-body">
										<form action="<?= base_url('home'); ?>" method="POST">
											<?= csrf_field() ?>
											<div class="form-group">
												<label for="namaproyek">Nama proyek</label>
												<select name="idproyek" id="idproyek" class="form-control">
													<option value="">- Semua -</option>
													<?php foreach ($data_proyek as $data) : ?>
														<option value="<?= $data['idproyek'] ?>" <?= ($r_idproyek == $data['idproyek'] ? 'selected' : '') ?>><?= $data['namaproyek'] ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<button type="submit" class="btn btn-success">Tampilkan</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-6 col-md-3">
								<div class="info-box">
									<span class="info-box-icon bg-info elevation-1"><?= $data_real['jml_modul'] ?></span>
									<div class="info-box-content">
										<span class="info-box-number">Total Modul</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							<div class="col-12 col-sm-6 col-md-3">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-danger elevation-1"><?= $data_real['sts_proses'] ?></span>

									<div class="info-box-content">
										<span class="info-box-number">Proses</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							<div class="clearfix hidden-md-up"></div>

							<div class="col-12 col-sm-6 col-md-3">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-success elevation-1"><?= $data_real['sts_qcaccepted'] ?></span>

									<div class="info-box-content">
										<span class="info-box-number">QC Done</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							<div class="col-12 col-sm-6 col-md-3">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-warning elevation-1"><?= $data_real['sts_useraccepted'] ?></span>

									<div class="info-box-content">
										<span class="info-box-number">User Accepted</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Grafik Business Analyst</h3>
									</div>
									<div class="card-body">
										<div class="chart">
											<canvas id="bar_ba" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Grafik Status Modul</h3>
									</div>
									<div class="card-body">
										<div class="chart">
											<canvas id="bar_status_modul" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(function() {

		/*var areaChartData = {
		  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
		    datasets: [{
		      data: [12, 19, 3, 5, 6, 3],
		      backgroundColor: [
		          'rgba(255, 99, 132, 0.2)',
		          'rgba(54, 162, 235, 0.2)',
		          'rgba(255, 206, 86, 0.2)',
		          'rgba(75, 192, 192, 0.2)',
		          'rgba(153, 102, 255, 0.2)',
		          'rgba(255, 159, 64, 0.2)'
		      ],
		      borderColor: [
		          'rgba(255, 99, 132, 1)',
		          'rgba(54, 162, 235, 1)',
		          'rgba(255, 206, 86, 1)',
		          'rgba(75, 192, 192, 1)',
		          'rgba(153, 102, 255, 1)',
		          'rgba(255, 159, 64, 1)'
		      ],
		      borderWidth: 1
		    }]
		}*/

		var areaChartData = {
			labels: [
				<?php
				foreach ($data_real['data_ba'] as $val) {
					echo "'" . $val['namauser'] . "',";
				}
				?>
			],
			datasets: [{
				data: [
					<?php
					foreach ($data_real['data_ba'] as $val) {
						echo "'" . $val['jml'] . "',";
					}
					?>
				],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		}

		var areaChartData2 = {
			labels: [
				<?php
				foreach ($data_real['data_sts_modul'] as $val) {
					echo "'" . $val['aksi'] . "',";
				}
				?>
			],
			datasets: [{
				data: [
					<?php
					foreach ($data_real['data_sts_modul'] as $val) {
						echo "'" . $val['jml'] . "',";
					}
					?>
				],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		}

		var barChartCanvas = $('#bar_ba').get(0).getContext('2d');
		var barChartCanvas2 = $('#bar_status_modul').get(0).getContext('2d');

		var barChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false,
			legend: {
				display: false
			},
		}

		new Chart(barChartCanvas, {
			type: 'horizontalBar',
			data: areaChartData,
			options: barChartOptions,
		})

		new Chart(barChartCanvas2, {
			type: 'horizontalBar',
			data: areaChartData2,
			options: barChartOptions,
		})
	});
</script>
<?= $this->endSection(); ?>
<?php 

include 'fonksiyonlar.php';

foreach (havaDurumu($_POST['id']) as $key => $value) {

	?>
	<div class="col-md-2">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<?=$key ?>
			</div>
			<div class="card-body">
				<p class="card-text">

					<table class="table">
						<tr>
							<th>Saat</th>
							<th>#</th>
							<th>Sıcaklık</th>
							<th>Hız</th>
						</tr>
						<?php 
						foreach ($value as $key => $val) {
							?>
							<tr>
								<td><?=$key ?></td>
								<td class="p-0"><img src="iconlar/<?=$val['icon']; ?>.png" alt=""></td>
								<td><?=$val['sicaklik']; ?></td>
								<td><?=$val['hiz']; ?></td>
							</tr>
							<?php 
						}
						?>
					</table>

				</p>
			</div>
		</div>
	</div>

	<?php
} 
?>
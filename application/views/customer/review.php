<div class="container">
	<div class="card mx-auto" style="margin-top: 100px; width: 80%">
		<div class="card-header">
			Data Review
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th>Nama Customer</th>
					<th>Id Mobil</th>
					<th>Review</th>
				</tr>

				<?php foreach($review as $rv) : ?>
				<tr>
					<td><?php echo $rv->nama ?></td>
					<td><?php echo $rv->id_mobil ?></td>
					<td><?php echo $rv->bintang ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
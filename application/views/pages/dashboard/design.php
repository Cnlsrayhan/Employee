<div class="row mt-5 mb-5">
	<div class="col">
		<h1 class="page-title">
			Design
		</h1>
	</div>
	<div class="col text-right">
		<a href="<?= BASE_URL('account/design/create'); ?>" class="btn btn-info font-weight-normal">Buat Design Produk</a>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="table-responsive">
				<table class="table card-table table-striped table-vcenter">
					<thead>
						<tr>
							<th width="2%">No</th>
                            <th width="5">ID#</th>
							<th width="25%">Name of Project</th>
                            <th width="15">Nama Request</th>
                            <th width="23%">File</th>
							<th width="20%">Deskripsi</th>
                            <th width="10%">Ket</th>
						</tr>
					</thead>
					<tbody>
						<?php  
		          		$no = 1;
		          		foreach ($content->result() as $row)
						{ ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->id_design ?></td>
                                <td><?php echo $row->nama_produk ?></td>
                                <td><?php echo $row->nama_req ?></td>
                                <td><?php
                                if ($row->file_design != '' && $row->kategori_design == 'img') { ?>
                                    <img height="80" src="<?=base_url()?>assets/uploads/<?php echo $row->file_design ?>" alt="File Content">
                                <?php }elseif ($row->file_design != '' && $row->kategori_design == 'video') { ?>
									<video height="80" controls>
										<source src="<?=base_url()?>assets/uploads/<?php echo $row->file_design ?>" type="video/mp4" type="video/mp4">
									</video>
								<?php }else { ?>
                                    <b><i>file belum ada</i></b>
                                <?php } ?></td>
                                <td><?php echo $row->description_design ?></td>
                            </tr>
										
						<?php }
						if ($no < 2){
							echo '<tr><td colspan="6" class="text-muted text-center font-italic">Belum ada data</td></tr>';
						}
		          	?>
					</tbody>
				</table>
				<hr class="m-0 mt-2">
				<div class="text-right p-3">
					<a href="#" class="btn btn-secondary font-weight-normal">Next <i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(".sorry").click(function (e) {
		e.preventDefault();
		swal('On Development :(', 'Sorry this feature on progress', 'warning');
	});

</script>

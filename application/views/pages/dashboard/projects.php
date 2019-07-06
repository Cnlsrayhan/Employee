<div class="row mt-5 mb-5">
	<div class="col">
  <h1 class="page-title">
    Projects
  </h1>
	</div>
	<div class="col text-right">
		<a href="<?= BASE_URL('account/projects/create'); ?>" class="btn btn-info font-weight-normal">Buat project baru</a>
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
									<th width="5%">ID#</th>
		              <th width="35%">Name of Project</th>
		              <th width="20%">URL</th>
		              <th width="10%">Category</th>
		              <th width="15%">Date</th>
									<th width="15%">Ket</th>
		            </tr>
		          </thead>
		          <tbody>
							<?php  
		          		$no = 1;
		          		foreach ($project->result() as $row)
						{ ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row->id_project ?></td>
							<td><?php echo $row->name ?></td>
							<td><?php echo $row->url ?></td>
							<td><?php echo $row->category ?></td>
							<td><?php echo date('F d, Y', strtotime($row->date_registered)) ?></td>
							<td><b><i><?php
							if ($row->ket != '') {
								echo $row->ket;
							}else{
								echo 'On Proccess';
							}
							?></i></b></td>			
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
	
	$(".sorry").click(function(e){
		e.preventDefault();
		swal('On Development :(', 'Sorry this feature on progress', 'warning');
	});
</script>
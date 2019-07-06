<div style="min-height: 400px;">
<div class="row mt-5 mb-5">
	<div class="col">
  <h1 class="page-title">
    Data Pegawai
  </h1>
	</div>
	<div class="col text-right">
		<a href="<?= BASE_URL('account/employee/create'); ?>" class="btn btn-info font-weight-normal"><i class="fe fe-plus-square"></i> Tambah Pegawai</a>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="table-responsive">
		        <table class="table card-table table-striped table-vcenter">
		          <thead>
		            <tr>
		              <th width="2%">#</th>
		              <th width="8%">Nip</th>
		              <th width="35%">Fullname</th>
		              <th width="16%">Location Work</th>
		              <th width="10%">Registered Date</th>
		              <th width="4%"></th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php  
		          		$no = 1;
		          		foreach ($employees->result() as $row)
						{
						        echo "<tr><td>".$no."</td><td>".$row->nip_current."</td><td>".$row->fullname."</td><td>".$row->location_work."</td><td>".date('F d, Y', strtotime($row->date_registered))."</td><td class='w-1'><a href='#' class='icon'></a></td></tr>"; $no++;
						}
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
</div>
<script>
	
	$(".sorry").click(function(e){
		e.preventDefault();
		swal('On Development :(', 'Sorry this feature on progress', 'warning');
	});
</script>
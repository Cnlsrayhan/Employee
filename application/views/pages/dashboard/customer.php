<div class="row mt-5 mb-5">
	<div class="col">
  <h1 class="page-title">
    Customer
  </h1>
	</div>
	<div class="col text-right">
		<a href="<?= BASE_URL('account/customer/create'); ?>" class="btn btn-info font-weight-normal">Buat customer baru</a>
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
		              <th width="25%">Nama</th>
		              <th width="15%">No.Telp</th>
		              <th width="20%">E-mail</th>
		              <th width="25%">Produk</th>
                      <th width="13%">Tahu kami dari</th>
		            </tr>
		          </thead>
		          <tbody>
							<?php  
		          		$no = 1;
		          		foreach ($customer->result() as $row)
						{ ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><a href="#"><?php echo $row->no_telp ?></a></td>
                                <td><?php echo $row->email ?></td>
                                <td><?php echo $row->produk ?></td>
                                <td><?php echo $row->tau_dari ?></td>
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
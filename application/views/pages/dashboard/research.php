<?php
if ($this->input->post('research') != NULL) {
    if ($this->input->post('search') != NULL) {
        $search = $this->input->post('search');
        $query = "SELECT * FROM `projects` WHERE
        `projects`.`id` LIKE '$search' OR
        `projects`.`name` LIKE '%$search%' OR
        `projects`.`url` LIKE '$search' OR
        `projects`.`category` LIKE '%$search%' OR
        `projects`.`description` LIKE '%$search%' OR
        `projects`.`date_registered`LIKE '$search'";
        $produk = $this->db->query($query)->result();
    }
}

?>

<div class="row">
    <div class="col-6 offset-3" style="margin-top: 80px;">
        <form method="post">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Produk">
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-info font-wight-normal" name="research" value="research">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row mt-5 mb-5">
	<div class="col">
  <h1 class="page-title">
    Research
  </h1>
	</div>
	<!-- <div class="col text-right">
		<a href="<?= BASE_URL('account/projects/create'); ?>" class="btn btn-info font-weight-normal">Buat project baru</a>
	</div> -->
</div>
<div class="row">
    <div class="col">
    <?php if (isset($produk)) { foreach ($produk as $value){ ?>
        <div class="card" style="padding: 16px;">
            <div class="row" style="margin-top: 16px;">
                <div class="col-3">
                    <h6>ID# Produk</h6>
                </div>
                <div class="col-1">
                    <h6>:</h6>
                </div>
                <div class="col-8">
                    <?php echo $value->id ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <h6>Nama Produk</h6>
                </div>
                <div class="col-1">
                    <h6>:</h6>
                </div>
                <div class="col-8">
                    <?php echo $value->name ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <h6>URL</h6>
                </div>
                <div class="col-1">
                    <h6>:</h6>
                </div>
                <div class="col-8">
                    <?php echo $value->url ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <h6>Category Produk</h6>
                </div>
                <div class="col-1">
                    <h6>:</h6>
                </div>
                <div class="col-8">
                    <?php echo $value->category ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <h6>Deskripsi Produk</h6>
                </div>
                <div class="col-1">
                    <h6>:</h6>
                </div>
                <div class="col-8">
                    <?php echo $value->description ?>
                </div>
            </div>

            <div class="row" style="margin-bottom: 16px;">
                <div class="col-3">
                    <h6>Date</h6>
                </div>
                <div class="col-1">
                    <h6>:</h6>
                </div>
                <div class="col-8">
                    <?php echo date('F d, Y', strtotime($value->date_registered)) ?>
                </div>
            </div>
        </div>
    <?php }} ?>
    </div>
</div>
<div class="row" style="display: none;">
	<div class="col">
		<div class="card">
			<div class="table-responsive">
		        <table class="table card-table table-striped table-vcenter">
		          <thead>
		            <tr>
		              <th width="2%">#</th>
		              <th width="43%">Name of Project</th>
		              <th width="25%">URL</th>
		              <th width="16%">Category</th>
		              <th width="10%">Date</th>
		              <th width="4%"></th>
		            </tr>
		          </thead>
		          <tbody>
							<?php  
		          		$no = 1;
		          		foreach ($project->result() as $row)
						{
						        echo "<tr><td>".$no."</td><td>".$row->name."</td><td><a href='#'>".$row->url."</a></td><td>".$row->category."</td><td>".date('F d, Y', strtotime($row->date_registered))."</td><td class='w-1'><a href='#' class='icon'></a></td></tr>"; $no++;
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

<script>
	
	$(".sorry").click(function(e){
		e.preventDefault();
		swal('On Development :(', 'Sorry this feature on progress', 'warning');
	});
</script>
<?php

if ($this->input->post('project')) {
	$name = $this->input->post('name');
	$url = $this->input->post('url');
	$category = $this->input->post('category');
	$description = $this->input->post('description');
	$data = array('name' => $name,
		'url' => $url,
		'category' => $category,
		'description' => $description,
		'date_registered' => gmdate('Y-m-d h:i:s \G\M\T', time()) );

	$insert = $this->db->insert('projects', $data);
	if ($insert) {
		header('Location: ' . base_url('account/projects'));
	} else {
		echo "<script>alert('Data Gagal di pesan !'); window.location.href='" . base_url() . "';</script>";
	}
}
?>
<div class="page-header">
  <h1 class="page-title">
    Create a New Project
  </h1>
</div>
<div class="row">
	<div class="col" id="project">
		<form class="card" method="post">
	        <div class="card-body">
	          <div class="row">
	            <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-label">Name of Project</label>
	                <input type="text" class="form-control" id="iName" name="name">
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-label">URL/Website</label>
	                <input type="text" class="form-control" id="iURL" name="url">
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-label">Category</label>
	                <select class="form-control" id="iCategory" name="category">
					  <option value="">Choose...</option>
					  <option value="AL">Alabama</option>
					  <option value="WY">Wyoming</option>
					</select>
	              </div>
	            </div>
	            <div class="col-lg-12">
	              <div class="form-group mb-0">
	                <label class="form-label">Description</label>
	                <textarea rows="3" class="form-control" id="iDescription" name="description"></textarea>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="card-footer text-right">
        	  <a href="<?= BASE_URL('account/projects'); ?>" class="btn btn-secondary">Cancel</a>
	          <button type="submit" name="project" value="project" class="btn btn-info" id="addProject">Add project</button>
	        </div>
      	</form>
	</div>
</div>


<script>
$(document).ready(function() {

	$(".sorry").click(function(e){
		e.preventDefault();
		swal('On Development :(', 'Sorry this feature on progress', 'warning');
	});

	 // Add Project Action
	 $('#addProject').click(function(e){
	      var isValid = true;
	      // Validation login
	      if ($('#iName').val() == ''){
	        $('#iName').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iURL').val() == ''){
	        $('#iURL').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iCategory').val() == ''){
	        $('#iCategory').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iDescription').val() == ''){
	        $('#iDescription').addClass('is-invalid'); isValid = false;
	      }

	      // if (isValid){
	      // 	  swal('wkowk');
	        // $.post('<?= BASE_URL('authentication/login'); ?>', 
	        //   {
	        //     username: $('#iUsername').val(),
	        //     password: $('#iPassword').val(),
	        //   }, function(response, result){
	        //   	console.log(response);
	        //   }
	        // );
	      } else {
	      	e.preventDefault();
	      }
    });


	// Remove input border red
	$('#iName').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iURL').focus(function(){ $(this).removeClass('is-invalid'); });
	$('#iCategory').change(function(){ $(this).removeClass('is-invalid'); });
	$('#iDescription').focus(function(){ $(this).removeClass('is-invalid'); });
});
</script>
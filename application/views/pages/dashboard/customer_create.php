<?php

if ($this->input->post('customer')) {
	$name = $this->input->post('name');
	$notelp = $this->input->post('notelp');
    $email = $this->input->post('email');
    $produk = $this->input->post('produk');
    $tahu = $this->input->post('tahu');
    $description = $this->input->post('description');
    
	$data = array('nama' => $name,
		'no_telp' => $notelp,
		'email' => $email,
        'produk' => $produk,
        'tau_dari' => $tahu,
        'description' => $description );

	$insert = $this->db->insert('m_customer', $data);
	if ($insert) {
		header('Location: ' . base_url('account/customer'));
	} else {
		echo "<script>alert('Data Gagal di pesan !'); window.location.href='" . base_url() . "';</script>";
	}
}
?>
<div class="page-header">
  <h1 class="page-title">
    Data Customer
  </h1>
</div>
<div class="row">
	<div class="col" id="customer">
		<form class="card" method="post">
	        <div class="card-body">
	          <div class="row">
	            <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-label">Nama Customer</label>
	                <input type="text" class="form-control" id="iName" name="name">
	              </div>
	            </div>

                <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-label">No.Telp</label>
	                <input type="text" class="form-control" id="iNotelp" name="notelp">
	              </div>
	            </div>

                <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-label">E-mail</label>
	                <input type="email" class="form-control" id="iEmail" name="email">
	              </div>
	            </div>

                <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-label">Produk</label>
	                <input type="text" class="form-control" id="iProduk" name="produk">
	              </div>
	            </div>

                <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-label">Mengetahui kami dari?</label>
	                <input type="text" class="form-control" id="itahu" name="tahu">
	              </div>
	            </div>
	            
	            <div class="col-lg-12">
	              <div class="form-group mb-0">
	                <label class="form-label">Deskripsi</label>
	                <textarea rows="3" class="form-control" id="iDescription" name="description"></textarea>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="card-footer text-right">
        	  <a href="<?= BASE_URL('account/customer'); ?>" class="btn btn-secondary">Cancel</a>
	          <button type="submit" name="customer" value="customer" class="btn btn-info" id="addCustomer">Add Customer</button>
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
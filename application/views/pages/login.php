<div class="page" style="background-color: #45AAF2;  background-image: radial-gradient(#45AAF2, #3e99d9);">
<div class="page-single">
<div class="container">
  <div class="row">
    <div class="col col-login mx-auto">
      <form class="card">
        <div class="card-body p-6 pt-0">
	      <div class="text-center mb-6 mt-0">
	        <a href="<?= BASE_URL(); ?>"><img src="<?= BASE_URL('assets/images/i-login.png'); ?>" class="h-8" alt="Logo Karyawan"></a>
	      </div>
          <div class="card-title text-center">Login Karyawan</div>
          <div class="form-group">
            <label class="form-label" for="iUsername">Username</label>
            <input type="text" class="form-control" id="iUsername" autocomplete="off" maxlength="15" value="admin">
            <div class="invalid-feedback d-none" id="ifUsername">Maaf, Username tidak ditemukan</div>
          </div>
          <div class="form-group">
            <label class="form-label" for="iPassword">
              Password
              <!-- <a href="./forgot-password.html" class="float-right small">I forgot password</a> -->
            </label>
            <input type="password" class="form-control" id="iPassword" value="admin">
          </div>
          <div class="form-footer">
            <button type="button" class="btn btn-info btn-block" id="goLogin">Login</button>
          </div>
        </div>
      </form>
<!--       <div class="text-center text-muted">
        Don't have account yet? <a href="./register.html">Sign up</a>
      </div> -->
    </div>
  </div>
</div>
</div>
</div>


<script>
$(document).ready(function() {
	 // Login Action
	 $('#goLogin').click(function(e){
	      var isValid = true;
	      // Validation login
	      if ($('#iUsername').val() == ''){
	        $('#iUsername').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iPassword').val() == ''){
	        $('#iPassword').addClass('is-invalid'); isValid = false;
	      }

	      if (isValid){
	        $.post('<?= BASE_URL('authentication/login'); ?>', 
	          {
	            username: $('#iUsername').val(),
	            password: $('#iPassword').val(),
	          }, function(response, result){
	          	console.log(response);
	          	if (response == '2'){
	          		$('#iUsername').addClass('is-invalid state-invalid');
	          		$('#ifUsername').removeClass('d-none');
	          	} else if (response == '0'){
	          		$('#ifUsername').addClass('d-none');
	          		$('#iPassword').addClass('is-invalid');
	          		swal('Terjadi Kesalahan', 'Password Anda tidak sesuai, periksa kembali', 'error');
	          	} else if (response == '1'){
	          		window.location.href = "<?= BASE_URL('account/dashboard'); ?>";
	          	}
	          }
	        );
	      } else {
	      	e.preventDefault();
	      }
    });

	// Remove input border red
	$('#iUsername').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iPassword').focus(function(){ $(this).removeClass('is-invalid'); });
});
</script>







<div class="page-header">
  <h1 class="page-title">
    Membuat Pegawai Baru
  </h1>
</div>
<div class="row">
	<div class="col">
		<form class="card" id="form" action="<?= BASE_URL('employee_create/save'); ?>" method="POST" enctype="multipart/form-data">
	        <div class="card-body">
	          <div class="row">
	          	<div class="col-lg-12">
		            <p class="font-weight-light text-muted" style="font-size: 14px;">Data Relationship</p>
	          	</div>
	            <div class="col-lg-3">
	              <div class="form-group">
	                <label class="form-label">No. Kartu Pegawai</label>
	                <input type="text" class="form-control" id="iNoCard" name="iNoCard" autocomplete="off" onkeypress="return isNumber(event)">
	              </div>
	            </div>
	            <div class="col-lg-2">
	              <div class="form-group">
	                <label class="form-label">Nip Sekarang</label>
	                <input type="text" class="form-control" id="iNipCurrent" name="iNipCurrent" autocomplete="off" onkeypress="return isNumber(event)">
	              </div>
	            </div>
	            <div class="col-lg-2">
	              <div class="form-group">
	                <label class="form-label text-muted font-weight-normal">Nip Lama</label>
	                <input type="text" class="form-control" name="iNipOld" id="iNipOld" autocomplete="off" onkeypress="return isNumber(event)">
	              </div>
	            </div>
	            <div class="col-lg-5">
	              <div class="form-group">
	                <label class="form-label">Lokasi Kerja</label>
	                <input type="text" class="form-control" name="iLocationWork" id="iLocationWork" autocomplete="off">
	              </div>
	            </div>
	            <div class="col-lg-3">
	              <div class="form-group">
	                <label class="form-label">No NPWP</label>
	                <input type="text" class="form-control" id="iNoNPWP" name="iNoNPWP" autocomplete="off" onkeypress="return isNumber(event)">
	              </div>
	            </div>
	            <div class="col-lg-3">
	              <div class="form-group">
	                <label class="form-label">No Kartu Askes</label>
	                <input type="text" class="form-control" id="iNoAskes" name="iNoAskes" autocomplete="off" onkeypress="return isNumber(event)">
	              </div>
	            </div>
	            <div class="col-lg-6">
	        	  <div class="form-group">
	                <label class="form-label">Status</label>
	                <div class="selectgroup w-100">
	                  <label class="selectgroup-item">
	                    <input type="radio" name="iStatus" value="m" class="selectgroup-input" checked="">
	                    <span class="selectgroup-button">Magang</span>
	                  </label>
	                  <label class="selectgroup-item">
	                    <input type="radio" name="iStatus" value="c" class="selectgroup-input" >
	                    <span class="selectgroup-button">Kontrak</span>
	                  </label>
	                  <label class="selectgroup-item">
	                    <input type="radio" name="iStatus" value="p" class="selectgroup-input">
	                    <span class="selectgroup-button">Tetap</span>
	                  </label>
	                </div>
	              </div>
	            </div>
	        	<div class="col-lg-12">
		            <p class="font-weight-light text-muted" style="font-size: 14px;">Personality Information</p>
	        	</div>
	        	<div class="col-lg-3">
	            	<div class="form-group">
	                    <div class="form-label">Foto</div>
						<input type="file" name="photo" accept="image/*">
	                </div>
	        	</div>
	            <div class="col-lg-4">
	              <div class="form-group">
	                <label class="form-label">Nama Lengkap</label>
	                <input type="text" class="form-control" id="iName" name="iName" autocomplete="off">
	              </div>
	            </div>
	            <div class="col-lg-2">
	        	  <div class="form-group">
	                <label class="form-label">Jenis Kelamin</label>
	                <div class="selectgroup w-100">
	                  <label class="selectgroup-item">
	                    <input type="radio" name="iGender" value="1" class="selectgroup-input" checked="">
	                    <span class="selectgroup-button">Pria</span>
	                  </label>
	                  <label class="selectgroup-item">
	                    <input type="radio" name="iGender" value="0" class="selectgroup-input">
	                    <span class="selectgroup-button">Wanita</span>
	                  </label>
	                </div>
	              </div>
	            </div>	            
	            <div class="col-lg-3">
	              <div class="form-group">
	                <label class="form-label">Agama</label>
	                <select class="form-control" id="iReligion" name="iReligion">
					  <option value="">Choose...</option>
					  <option value="islam">Islam</option>
					  <option value="kristen">Kristen</option>
					</select>
	              </div>
	            </div>
	            <div class="col-lg-5">
            	  <div class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <div class="row gutters-xs">
                      <div class="col-5">
                        <select name="birthday[month]" id="iBdyMonth" class="form-control custom-select">
                          <option value="" selected="selected">Month...</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="col-3">
                        <select name="birthday[day]" id="iBdyDay" class="form-control custom-select">
                          <option value="">Day...</option>
                          <?php  
                          	for ($i=1; $i<=31; $i++){
                          		echo "<option value='".$i."'>".$i."</option>";
                          	}
                          ?>
                        </select>
                      </div>
                      <div class="col-4">
                        <select name="birthday[year]" id="iBdyYear" class="form-control custom-select">
                          <option value="">Year...</option>
                          <?php  
                          	for ($i=1945; $i<=date('Y'); $i++){
                          		echo "<option value='".$i."'>".$i."</option>";
                          	}
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
	            </div>
	            <div class="col-lg-4">
	              <div class="form-group">
	                <label class="form-label">Tempat Tanggal Lahir</label>
	                <select class="form-control" id="cProvince" name="cProvince">
					  <option value="">Provinsi...</option>
					  <?php  
						foreach ($provinces->result() as $row)
						{
						    echo '<option value="'.$row->id.'">'.$row->name.'</option>';
						}
					  ?>
					</select>
	              </div>
	            </div>
	            <div class="col-lg-3">
	              <div class="form-group">
	                <label class="form-label">&nbsp;</label>
	                <select class="form-control" id="cRegency" name="cRegency">
					  <option value="">Waiting province...</option>
					</select>
	              </div>
	            </div>
	            <div class="col-lg-12">
	              <div class="form-group">
	                  <label class="form-label">Alamat <span class="form-label-small">56/100</span></label>
	                  <textarea class="form-control" id="iAddress" rows="3" name="iAddress"></textarea>
	               </div>
	            </div>
	          </div>
	        </div>
	        <div class="card-footer text-right">
        	  <a href="<?= BASE_URL('account/projects'); ?>" class="btn btn-secondary">Cancel</a>
	          <button type="submit" class="btn btn-info" id="addProject">Add employee</button>
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
	      if ($('#iNoCard').val() == ''){
	        $('#iNoCard').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iNipCurrent').val() == ''){
	        $('#iNipCurrent').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iNipOld').val() == ''){
	        $('#iNipOld').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iLocationWork').val() == ''){
	        $('#iLocationWork').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iNoNPWP').val() == ''){
	        $('#iNoNPWP').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iNoAskes').val() == ''){
	        $('#iNoAskes').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iName').val() == ''){
	        $('#iName').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iBdyMonth').val() == ''){
	        $('#iBdyMonth').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iBdyDay').val() == ''){
	        $('#iBdyDay').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iBdyYear').val() == ''){
	        $('#iBdyYear').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#cProvince').val() == ''){
	        $('#cProvince').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#cRegency').val() == ''){
	        $('#cRegency').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iReligion').val() == ''){
	        $('#iReligion').addClass('is-invalid'); isValid = false;
	      }
	      if ($('#iAddress').val() == ''){
	        $('#iAddress').addClass('is-invalid'); isValid = false;
	      }

	      if (!isValid){
	      	e.preventDefault();
	      }
    });

	 $('#cProvince').change(function(){
	    $.post('<?= BASE_URL('employee_create/place'); ?>', 
	      {
	        province_id: $('#cProvince').val(),
	      }, function(response, result){
	      	$('#cRegency').html(response);
	      }
	    );
	 });


	// Remove input border red
	$('#iNoCard').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iNipCurrent').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iNipOld').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iLocationWork').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iNoNPWP').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iNoAskes').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iName').focus(function(){ $(this).removeClass('is-invalid state-invalid'); });
	$('#iBdyMonth').change(function(){ $(this).removeClass('is-invalid'); });
	$('#iBdyDay').change(function(){ $(this).removeClass('is-invalid'); });
	$('#iBdyYear').change(function(){ $(this).removeClass('is-invalid'); });
	$('#cProvince').change(function(){ $(this).removeClass('is-invalid'); $('#cRegency').removeClass('is-invalid'); });
	$('#cRegency').change(function(){ $(this).removeClass('is-invalid'); });
	$('#iReligion').change(function(){ $(this).removeClass('is-invalid'); });
	$('#iAddress').focus(function(){ $(this).removeClass('is-invalid'); });
});
</script>
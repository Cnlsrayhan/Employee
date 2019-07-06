<?php

if ($this->input->post('content')) {
	$produk_id = $this->input->post('produk_id');
	$request = $this->input->post('request');
	$category = $this->input->post('category');
	$description = $this->input->post('description');
	$uploadOK = false;
	$updateData = false;
	$reqfile = '';
	$file = '';
	if ($request != '') {
		$reqfile = $this->input->post('reqfile');
		$ket = "Request File ".$this->input->post($this->input->post('category'))."";
		$ket = "On Proccess";
		$data = array('produk_id' => $produk_id,
			'kategori' => $category,
			'req' => $reqfile,
			'description' => $description,
			'ket' => $ket );

			$insert = $this->db->insert('m_content', $data);
			if ($insert) {
				echo "<script>alert('Data Berhasil ditambahkan !');
						window.location.href='".base_url()."account/content';</script>";
			} else {
				echo "<script>alert('Data Gagal ditambahkan !');
						window.location.href='".base_url()."account/content/create';</script>";
			}
	}else {
		if ($category == 'img') {
			$config['upload_path']    = './assets/uploads/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = 10000;
			// $config['overwrite'] 			= TRUE;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert(".$this->upload->display_errors().");
				window.location.href='".base_url()."account/content/create';</script>";
				// $this->load->view('v_upload', $error);
			}else{
				$data = $this->upload->data();
				if ($data) {
					$ket = 'Done';
					$uploadOK = true;
				}
			}
		}elseif ($category == 'video') {
			$configVideo['upload_path'] = './assets/uploads/'; # check path is correct
			$configVideo['max_size'] = '102400';
			$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;
			$video_name = random_string('numeric', 8);
			$configVideo['file_name'] = $video_name;

			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);

			if (!$this->upload->do_upload('file')) # form input field attribute
			{
				# Upload Failed
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
			else
			{
				# Upload Successfull
				$data = $this->upload->data();
				$url = 'assets/gallery/images'.$video_name;
				$this->session->set_flashdata('success', 'Video Has been Uploaded');
				$uploadOK = true;
				$ket = 'Done';
			}
		}
	}
	if ($uploadOK == true) {
		$data = array('produk_id' => $produk_id,
			'file' => $data['file_name'],
			'kategori' => $category,
			'req' => $reqfile,
			'description' => $description,
			'ket' => $ket );
		foreach ($this->db->get('m_content')->result() as $key => $value) {
			if ($value->produk_id == $produk_id) {
				$updateData = true;
			}
		}

		if ($updateData == true) {
			$this->db->where('produk_id',$produk_id);
			$insert = $this->db->update('m_content', $data);
			echo $value->produk_id;
		}else{
			$insert = $this->db->insert('m_content', $data);
		}

		if ($insert) {
			echo "<script>alert('Data Berhasil ditambahkan !');
					window.location.href='".base_url()."account/content';</script>";
		} else {
			echo "<script>alert('Data Gagal ditambahkan !');
					window.location.href='".base_url()."account/content/create';</script>";
		}
	}
}
?>
<div class="page-header">
	<h1 class="page-title">
		Content Marketing Produk
	</h1>
</div>
<div class="row">
	<div class="col" id="project">
		<form class="card" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="form-label">ID# Produk</label>
							<input type="text" class="form-control" id="iName" name="produk_id" style="width: 25%;">
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<div class="form-group-title d-flex justify-content-between">
								<label id="title_uploadFile" class="form-label">Upload File</label>
								<label id="title_requestFile" class="form-label" style="display:none">Request File</label>
								<div class="d-flex justify-content-end align-items-center">
									<input type="checkbox" name="request" id="request" value="request" onclick="checkedReq()">
									<p style="margin: 0 0 0 8px;">Request File</p>
								</div>
							</div>
							<input type="file" class="form-control" id="ifile" name="file">
							<input type="text" class="form-control" name="reqfile" id="reqfile" style="display:none">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="form-label">Jenis File</label>
							<select class="form-control" id="iCategory" name="category">
								<option value="">Choose...</option>
								<option value="img">Image or Gif</option>
								<option value="video">Video</option>
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
				<button type="submit" name="content" value="content" class="btn btn-info" id="addProject">Add Content</button>
			</div>
		</form>
	</div>
</div>


<script>
	$(document).ready(function () {

		$(".sorry").click(function (e) {
			e.preventDefault();
			swal('On Development :(', 'Sorry this feature on progress', 'warning');
		});

		// Add Project Action
		$('#addProject').click(function (e) {
				var isValid = true;
				// Validation login
				if ($('#iName').val() == '') {
					$('#iName').addClass('is-invalid');
					isValid = false;
				}
				if ($('#iURL').val() == '') {
					$('#iURL').addClass('is-invalid');
					isValid = false;
				}
				if ($('#iCategory').val() == '') {
					$('#iCategory').addClass('is-invalid');
					isValid = false;
				}
				if ($('#iDescription').val() == '') {
					$('#iDescription').addClass('is-invalid');
					isValid = false;
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
	$('#iName').focus(function () {
		$(this).removeClass('is-invalid state-invalid');
	}); $('#iURL').focus(function () {
		$(this).removeClass('is-invalid');
	}); $('#iCategory').change(function () {
		$(this).removeClass('is-invalid');
	}); $('#iDescription').focus(function () {
		$(this).removeClass('is-invalid');
	});
	});

</script>

<script>
	function checkedReq() {
		var checkBox = document.getElementById("request");
		var objEl = $("#title_uploadFile");
		var objE2 = $("#title_requestFile");
		var objE3 = $("#ifile");
		var objE4 = $("#reqfile");
		if (checkBox.checked == true) {

			objEl.hide();
			objE2.show();
			objE3.hide();
			objE4.show();
		} else {

			objEl.show();
			objE2.hide();
			objE3.show();
			objE4.hide();
		}
	}

</script>

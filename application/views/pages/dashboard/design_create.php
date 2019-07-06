<?php

if ($this->input->post('design')) {
	$content_id = $this->input->post('content_id');
    $category = $this->input->post('category');
    $nama_produk = $this->input->post('nama_produk');
    $nama_req = $this->input->post('nama_req');
    $description = $this->input->post('description');
	$uploadOK = false;
	$updateData = false;
	$file = '';
	
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
            window.location.href='".base_url()."account/design/create';</script>";
            // $this->load->view('v_upload', $error);
        }else{
            $data = $this->upload->data();
            if ($data) {
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
        }
    }
	if ($uploadOK == true) {
        $data = array('content_id' => $content_id,
            'nama_produk' => $nama_produk,
            'nama_req' => $nama_req,
            'file' => $data['file_name'],
            'description' => $description,
			'kategori' => $category );
		foreach ($this->db->get('m_design')->result() as $key => $value) {
			if ($value->produk_id == $produk_id) {
				$updateData = true;
			}
		}

		if ($updateData == true) {
			$this->db->where('produk_id',$produk_id);
			$insert = $this->db->update('m_design', $data);
			echo $value->produk_id;
		}else{
			$insert = $this->db->insert('m_design', $data);
		}

		if ($insert) {
			echo "<script>alert('Data Berhasil ditambahkan !');
					window.location.href='".base_url()."account/design';</script>";
		} else {
			echo "<script>alert('Data Gagal ditambahkan !');
					window.location.href='".base_url()."account/design/create';</script>";
		}
	}
}
?>
<div class="page-header">
	<h1 class="page-title">
		Design Produk
	</h1>
</div>
<div class="row">
	<div class="col" id="project">
		<form class="card" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="form-label">ID# content</label>
							<input type="text" class="form-control" id="content_id" name="content_id" style="width: 25%;">
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<div class="form-group-title d-flex justify-content-between">
								<label id="title_uploadFile" class="form-label">Upload File</label>
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

					<div class="col-6">
						<div class="form-group">
							<label for="nama produk" class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control">
						</div>
					</div>

                    <div class="col-6">
						<div class="form-group">
							<label for="nama produk" class="form-label">Nama Request</label>
                            <input type="text" name="nama_req" id="nama_req" class="form-control">
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
				<button type="submit" name="design" value="design" class="btn btn-info" id="addProject">Add Design</button>
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
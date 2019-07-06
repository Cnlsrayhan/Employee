<?php
$num_customer = $this->db->get('m_customer')->num_rows();
$num_produk = $this->db->get('projects')->num_rows();

?>

<div class="page-header">
  <h1 class="page-title">
    Dashboard
  </h1>
</div>
<div class="row mt-5">
	<div class="col-lg-4">
	<div class="card p-3">
	  <div class="d-flex align-items-center">
	    <span class="bg-blue mr-3 pl-5 pr-5 pb-4 pt-4" style="color: #fff; display: inline-block; text-align: center; border-radius: 3px; font-weight: 600;">
	      <i class="fe fe-headphones"></i>
	    </span>
	    <div>
	      <h4 class="m-0"><?php echo $num_customer ?> <small>Customers</small></h4>
	      <a href="<?=base_url()?>account/customer"><small class="text-muted">View more ...</small></a>
	    </div>
	  </div>
	</div>
	</div>
	<div class="col-lg-4"style="margin-left:100px;">
	<div class="card p-3">
	  <div class="d-flex align-items-center">
	    <span class="bg-green mr-3 pl-5 pr-5 pb-4 pt-4" style="color: #fff; display: inline-block; text-align: center; border-radius: 3px; font-weight: 600;">
	      <i class="fe fe-check-square"></i>
	    </span>
	    <div>
	      <h4 class="m-0"><?php echo $num_produk ?> <small>Goals</small></h4>
	      <a href="<?=base_url()?>account/projects"><small class="text-muted">View more ...</small></a>
	    </div>
	  </div>
	</div>
	</div>
	    <div>  
	    </div>
	  </div>
	</div>
	</div>
</div>
<div class="row"style="margin-left:138px;">
	<div class="col-lg-8">
		<div class="card">
			<canvas id="line-chart" width="400" height="180"></canvas>
		</div>
	</div>

<script>
	$(".sorry").click(function(e){
		e.preventDefault();
		swal('On Development :(', 'Sorry this feature on progress', 'warning');
	});

	new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
	    labels: ['3 Agustus',1600,1700,1750,1800,1850,1900,1950,1999,2050],
	    datasets: [{ 
	        data: [86,114,106,106,107,111,133,221,783,2478],
	        label: "Africa",
	        borderColor: "#3e95cd",
	        fill: false
	      }, { 
	        data: [282,3501,4121,502,6354,809,947,14102,3700,5267],
	        label: "Asia",
	        borderColor: "#8e5ea2",
	        fill: false
	      }, { 
	        data: [11168,170,178,2190,203,276,408,547,675,734],
	        label: "Europe",
	        borderColor: "#3cba9f",
	        fill: false
	      }, { 
	        data: [403,20,10,16,24,38,74,167,508,784],
	        label: "Latin America",
	        borderColor: "#e8c3b9",
	        fill: false
	      }, { 
	        data: [6,11220,2,2,7,26,82,172,312,433],
	        label: "North America",
	        borderColor: "#c45850",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'World population per region (in millions)'
	    }
	  }
	});
</script>
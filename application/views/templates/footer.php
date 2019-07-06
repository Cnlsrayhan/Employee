<?php 
    if ($this->session->userdata('user')){
?>
</div>
<footer class="footer" style="margin-top: 50px;">
<div class="container">
  <div class="row align-items-center flex-row-reverse">
    <div class="col-auto ml-lg-auto">
      <div class="row align-items-center">
        <div class="col-auto">
          <ul class="list-inline list-inline-dots mb-0">
            <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>
            <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
          </ul>
        </div>
        <div class="col-auto">
          <a href="https://github.com/tabler/tabler" class="btn btn-outline-primary btn-sm">Source code</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
      Copyright © 2018 <a href=".">Tabler</a>. Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a> All rights reserved.
    </div>
  </div>
</div>
</footer>
<?php } ?>

<script>
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
</script>
</body>
</html>
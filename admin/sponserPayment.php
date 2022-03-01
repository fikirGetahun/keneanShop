<?php
require_once "../php/fetchApi.php";
require_once "../php/auth.php";
require_once "../php/adminCrude.php";
include "../includes/adminSide.php";





?>
<div id="postBox">
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard x</h1>
  <h4><?php echo $row2['firstName'].''.$row2['lastName']  ?></h4>  <br>
  <h6>AUTHERIZATION: <?php echo $row2['auth'] ?></h6>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div> 
<script>
  

</script>
<?php
    // to update the pkg and money info of the payment fetching block


?>
 
 <div class="row">
<div class="col-4">
    <h5>Silver Package Info</h5>
    <textarea></textarea>
    <h5>Price : </h5><h6></h6>
</div>
</div>





              
</main>
</div>
    <?php

include "../includes/adminFooter.php";
?>
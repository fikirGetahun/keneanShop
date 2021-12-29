  <style type="text/css">
    @media (min-width: 768px) {
  .display-4 {
    font-size: 3rem;
  }
}

.nav-scrollers {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scrollers .nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scrollers .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
}</style>
<script src="assets/jquery.js"  ></script>
<script>
function nav(nav){

  $('#uploadDiv').load("user/postPage.php?type="+nav)
}





</script>


  <div class="container nav-scrollers py-1 mb-2">
    
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="#">Language</a>
      <a class="p-2 text-muted" href="#">Eth</a>
      <a class="p-2 text-muted" href="#">Membership</a>
      <a class="p-2 text-muted" href="#">Account</a>
      <a class="p-2 text-muted" href="#">Blog</a>
            <!-- Button trigger modal -->
<!-- Button trigger modal -->

<?php 
ob_start();
session_start();
if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){
  ?>
<a href="login.php">  <button type="button" class="btn btn-sm-primary" data-bs-toggle="modal"  data-bs-target="#uploadDiv">
  Post
</button></a>
  <?php
}else{
  ?>
    <button type="button" class="btn btn-sm-primary" data-bs-toggle="modal"  data-bs-target="#uploadDiv">
  Post
</button>
  <?php
}


?>

   </nav>  </div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Sponsored big discount</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">House</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="maincat.php">To buy</a></li>
            <li><a class="dropdown-item" href="vacdescription.php">To rent</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">Cars
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="maincat.php">To buy</a></li>
            <li><a class="dropdown-item" href="maincat.php">To rent</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="maincat.php"><span class="small">Real Estate</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">Land</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="maincat.php">To buy</a></li>
            <li><a class="dropdown-item" href="maincat.php">To rent</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="vacancy.php"><span class="small">Vacancy</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="maincat.php"><span class="small">Cv Work / Vacancy</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="maincat.php"><span class="small">Products / Services</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="maincat.php"><span class="small">Electronics</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="#"><span class="small">Tenders</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="maincat.php"><span class="small">Charity organization</span></a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="modal fade" id="uploadDiv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="realInput" class="modal-body">

        <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="nav('house')">House or Land</button></p></div>
       <div class="col"> <p><button type="button" class="btn btn-light btn-sm col">Real Estate </button></p></div>
        <div id="ts" class="col" onclick="nav('car')" ><p><button type="button" class="btn btn-light btn-sm" > car </button></p></div>
          </div>
        <hr>
        <div class="row">
        <div class="col"><p><button type="button" onclick="nav('vacancy')" class="btn btn-light btn-sm" >job vacancy</button></p></div>
        <div class="col"><p><button type="button" onclick="nav('tender')" class="btn btn-light btn-sm" >Tender</button></p></div>
        <div class="col"><p><button type="button" onclick="nav('electronics')" class="btn btn-light btn-sm">electronics</button></p></div></div>
        <hr>

        <div class="row">
          <div class="col"><p><button type="button" onclick="nav('ad')" class="btn btn-light btn-sm">product & service ads</button></p></div>
        <div class="col"><p><button type="button" onclick="nav('charity')" class="btn btn-light btn-sm">charity organization</button></p></div>
        <div class="col"><p><button type="button" onclick="nav('big')" class="btn btn-light btn-sm">big discount sponsored</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm">Cv for work and seeker</button></p></div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="inputForm" >



</div>
<!-- vacancy post input modal form -->


<div id="tss">

</div>





  <div class="nav-scroller py-1 fixed-bottom bg-primary d-block d-sm-none navbar-dark">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 link-secondary text-white" href="index.php">Home</a>
      <a class="p-2 link-secondary text-white" href="#">favorite</a>
      <a class="p-2 link-secondary text-white" href="#">Posts</a>
      <a class="p-2 link-secondary text-white" href="#">Orders</a>
      <a class="p-2 link-secondary text-white" href="#">about us</a>
    </nav>
  </div>

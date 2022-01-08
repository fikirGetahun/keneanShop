  
  <?php
  
  ob_start();
  session_start();
  ?>
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
<!-- <script src="assets/jquery.js"  ></script> -->
<script>


$(document).ready(function(){

  /// this is the main important block of the code which makes the back button work to navigate in a singlepage
  /// application what it does is it sees that the objects{ cat, staus,off,label} given in history.pushstate then it loads them as it change happens 
    // window.onpopstate = function (event) {
    //   // alert(event.state.cat)  
    //   $('#showBox').empty()
    //   $('#showBox').load('maincat.php?'+$.param({ cat : event.state.cat,
    //                 status : event.state.status,
    //                 off : event.state.off,
    //                 label :event.state.label  })+' #view,#loop');
    //   history.pushState({ cat : cat,
    //                   status : columen,
    //                   off : args,
    //                   label : label  }, '', './maincat.php?cat='+event.state.cat+'&status='+event.state.status+'&off='+event.state.off+'&label='+event.state.label)
    //   }


})


function nav(nav){

$('#uploadDiv').load("user/postPage.php?type="+nav)
}

// function postViewNav(table, columen, args, label){
//   // alert('inxc')

// $('#showBox').load('maincat.php?'+$.param({ cat : table,
//                     status : columen,
//                     off : args,
//                     label : label  })+' #view,#loop');
// history.pushState({ cat : table,
//                     status : columen,
//                     off : args,
//                     label : label  }, '', './maincat.php?cat='+table+'&status='+columen+'&off='+args+'&label='+label)
//                   }





</script>


  <div class="container nav-scrollers py-1 mb-2">
    
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" >Language</a>
      <a class="p-2 text-muted" >Eth</a>
      <a class="p-2 text-muted" >Membership</a>
     
      <a href="./maincat.php?cat=blog&label=Blog" class="p-2 text-muted" >Blog</a>

            <!-- Button trigger modal --> 
<!-- Button trigger modal -->

<?php 
      
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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="height: min-content;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=ad&status=bigDiscount&off=ACTIVE&label=Big Discount Advertisment&type=big"  aria-current="page"  >Big discount</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">House</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" onclick="" href="./maincat.php?cat=housesell&type=house&arg=For Sell&label=House For Sell">To buy</a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=housesell&type=house&arg=For Rent&label=House For Rent">To rent</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">Cars
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./maincat.php?cat=car&status=forRentOrSell&off=For Sell&label=Cars For Sell&type= "    >To buy</a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=car&status=forRentOrSell&off=For Rent&label=Cars For Rent&type= "  onclick="postViewNav('car', 'forRentOrSell', 'For Rent', 'Cars For Rent')"  >To rent</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="maincat.php"><span class="small">Real Estate(Sponserd)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">Land</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./maincat.php?cat=housesell&type=land&arg=For Sell&label=Land For Sell">To buy</a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=housesell&type=land&arg=For Rent&label=Land For Rent">To rent</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=vacancy"><span class="small">Vacancy</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small">Cv Work Seekers</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item"  href="./maincat.php?cat=jobhometutor&type=homeTutor&label=Home Tutor"  >Home Tutor Job Applicaion</a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=hotelhouse&type=hotelWorker&label=Hotel Job Seeker"   >Hotel Worker Job Application</a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=hotelhouse&type=houseWorker&label=Home Keeper Seeker"   >Home Keeper Job Application</a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=zebegna&type=zebegna&label=Security Gaurd Job Seeker"  >Security Gaurd Job Application</a></li>
          </ul>
        </li>


         <li class="nav-item">
          <a class="nav-link active" 
          href="./maincat.php?cat=ad&status=bigDiscount&off=NOT&label=Advertisment Post&type=product"><span class="small">Products / Services</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active"
          href="./maincat.php?cat=electronics&status= &off= &label=Electronics Post&type= "><span class="small">Electronics</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=tender"  ><span class="small">Tenders</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active"
          href="./maincat.php?cat=charity&status= &off= &label=Charity Post&type= "><span class="small">Charity organization</span></a>
        </li>

      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
  <?php 

  if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){
    ?>
<a href="./login.php" class="btn btn-dark">LogIn</a>
<?php
    
  }
if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
  ?>

<a class="btn btn-dark" href="./Account.php?yourPost=true" style="color: #f4f4f4; margin-left: 5px; background: black; border:1px #f4f4f4 solid; padding:3px; " >Account</a>
<a class="btn btn-dark" style="width: 4%; font-size:70%; margin-left:4px; "  href="./user/logout.php"   >Log Out</a>

<div>
<?php
      }
      
      ?>


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
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="nav('house')">House</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="nav('land')">Land</button></p></div>

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
        <div class="col"></div>
      
        <ul class="navbar-nav" >
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
          <p><button type="button" class="btn btn-light btn-sm">Cv for work and seeker</button></p>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" onclick="nav('homeTutor')"  >Home Tutor Job Applicaion</a></li>
            <li><a class="dropdown-item" onclick="nav('hotelWorker')" >Hotel Worker Job Application</a></li>
            <li><a class="dropdown-item" onclick="nav('houseWorker')" >Home Keeper Job Application</a></li>
            <li><a class="dropdown-item" onclick="nav('zebegna')" >Security Gaurd Job Application</a></li>

          </ul>
        </li>
        </ul>
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
      <a class="p-2 link-secondary text-white" >favorite</a>
      <a class="p-2 link-secondary text-white" >Posts</a>
      <a class="p-2 link-secondary text-white" >Orders</a>
      <a class="p-2 link-secondary text-white" >about us</a>
    </nav>
  </div>

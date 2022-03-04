  
  <?php
 
  ob_start();
  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  
  
  // this is to login if admin or editor has loged on the other admin panal.. in short, if an admin or editor has loged in to the admin panel, then he is automaticaly loged in to the user side of the website.

  // this helps us to navigate back and forth b/n admin panel and the user side website for messaging and other stuff hasn't been discorverd. 
  if(!isset($_SESSION['userId']) && isset($_SESSION['idz'])){
    require "php/fetchApi.php";
    // echo 'in header';
    $_SESSION['userId'] = $_SESSION['idz'];
    $admin_data = allPostListerOnColumen('user', 'id', $_SESSION['idz']);
    $row = $admin_data->fetch_assoc();

    $_SESSION['auth'] = $row['auth'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['name'] = $row['firstName'].' '.$row['lastName'];
  }

  if(!isset($_SESSION['location'] )){
    $_SESSION['location'] = 'All';
  }

  //location changer
if(isset($_GET['loc'])){
  $_SESSION['location'] = $_GET['loc'];
  // echo 'in';
}



  // if(!isset($_SESSION['location'])){
  //   session_start(); 
  // }
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
}
#1nav {
  position: fixed;
  top: 0;
}

#2nav {
  position: fixed;
  top: 5%;
}

</style>
<script src="assets/jquery.js"  ></script>


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

    
    $('#search').on('submit',function(){
              
      // alert($('form').serialize())
      $('#loop').empty()
      $('#loop').load("search.php?"+$('form').serialize())
      
                    // $.ajax({
                    //     url: 'search.php',
                    //     method: 'GET',
                    //     // data: $('form').serialize(),
                    //     success: function(res){
                    //       // $('#loop').empty()
                             
                    //     }
                    // })
                  })



})


function nav(nav){

$('#uploadDiv').load("user/postPage.php?type="+nav)
}

function cv(){
  // alert('in')
  $('#uploadDiv').load("user/userApi.php?cv=true")
}

function real(){
  // alert('in')
  $('#uploadDiv').load("user/userApi.php?real=true")
}

function reload(x){
// 
  $.ajax({
    url: 'user/userApi.php',
    type: 'GET',
    data: {loc : x},
    success: function (xx) { 
      // alert('loc')
      window.location.reload()
     }
  })

  
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="height: min-content;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" href="index.php?loc=All"  aria-current="page"  ><?php echo $lang['home'] ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=ad&status=bigDiscount&off=ACTIVE&label=Big Discount Advertisment&type=big"  aria-current="page"  ><?php echo $lang['big_discount'] ?></a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link active" href="./maincat.php?cat=housesell&type=house&arg= &label=House Posts"  id="navbarDropdown" role="button"  aria-expanded="false">
            <span class="small"><?php echo $lang['house'] ?></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" onclick="" href="./maincat.php?cat=housesell&type=house&arg=For Sell&label=House For Sell"><?php echo $lang['toBuy'] ?></a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=housesell&type=house&arg=For Rent&label=House For Rent"><?php echo $lang['toRent'] ?></a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" href="./maincat.php?cat=car&status= &off= &label=Cars Posts &type= "   id="navbarDropdown" role="button" aria-expanded="false">
            <span class="small"><?php echo $lang['cars'] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./maincat.php?cat=car&status=forRentOrSell&off=For Sell&label=Cars To Buy&type= "    ><?php echo $lang['toBuy'] ?></a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=car&status=forRentOrSell&off=For Rent&label=Cars For Rent&type= "  onclick="postViewNav('car', 'forRentOrSell', 'For Rent', 'Cars For Rent')"  ><?php echo $lang['toRent'] ?></a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=realestate&spType=rs&arg= &label=Real Estate Posts" ><span class="small"><?php echo $lang['realLabel'] ?></span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="./maincat.php?cat=housesell&type=land&arg= &label=Land Posts"   id="navbarDropdown" role="button"  aria-expanded="false">
            <span class="small"><?php echo $lang['land'] ?></span>
          </a>
          <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./maincat.php?cat=housesell&type=land&arg=For Sell&label=Land For Sell"><?php echo $lang['toBuy'] ?></a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=housesell&type=land&arg=For Rent&label=Land For Rent"><?php echo $lang['toRent'] ?></a></li>
          </ul> -->
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=vacancy"><span class="small"><?php echo $lang['vacancy'] ?></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small"><?php echo $lang['workSeekers'] ?></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item"  href="./maincat.php?cat=jobhometutor&type=homeTutor&label=Home Tutor"  ><?php echo $lang['homeTutorJobApplicaion'] ?></a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=hotelhouse&type=hotelWorker&label=Hotel Job Seeker"   ><?php echo $lang['hotelWorkerJobApplication'] ?></a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=hotelhouse&type=houseWorker&label=Home Keeper Seeker"   ><?php echo $lang['homeKeeperJobApplication'] ?></a></li>
            <li><a class="dropdown-item" href="./maincat.php?cat=zebegna&type=zebegna&label=Security Gaurd Job Seeker"  ><?php echo $lang['securityGaurdJobApplication'] ?></a></li>
          </ul>
        </li>


         <li class="nav-item">
          <a class="nav-link active" 
          href="./maincat.php?cat=ad&status=bigDiscount&off=NOT&label=Advertisment Post&type=product"><span class="small"><?php echo $lang['ad'] ?></span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active"
          href="./maincat.php?cat=electronics&status= &off= &label=Electronics Post&type= "><span class="small"><?php echo $lang['electronics'] ?></span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="./maincat.php?cat=tender"  ><span class="small"><?php echo $lang['tenders'] ?></span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active"
          href="./maincat.php?cat=charity&status= &off= &label=Charity Post&type= "><span class="small"><?php echo $lang['charity'] ?></span></a>
        </li>
        <?php 
              require_once 'php/fetchApi.php';


              ?> 
        
        <!-- <li class="nav-item dropdown" style="z-index: 3;">
          <a class="nav-link dropdown-toggle active"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="small"> <?php  ?>: </span>
            <span id="pgad" class="small"><?php  ?></span>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" onclick="reload('All')">All</a> -->
          <?php
            // foreach($city as $loc){
            //   ?>
              
            <!-- //   <a  class="dropdown-item" onclick="reload('<?php   ?>')" >  < ></a> -->
            
             <?php
            //   $i++;
            // }
          ?>
          <!-- </ul>
        </li> -->
      </ul>

      <form  class="d-flex">
        <?php
         if(isset($_GET['dbType'])){
          $dbType = $_GET['dbType'];
           ?>
           <input name='dbType' hidden value="<?php echo $dbType ?>">
           <?php
         } 

         if(isset($_GET['cat'])){
          $cat = $_GET['cat'];
           ?>
            <input name='cat' hidden value="<?php echo $cat ?>">
           <?php
         }

         if(isset($_GET['cat'], $_GET['type'], $_GET['label'])){
          $cat = $_GET['cat'];
          $type = $_GET['type'];
          $label = $_GET['label'];
           ?>
            <input name='cat' hidden value="<?php echo $cat ?>">
            <input name='type' hidden value="<?php echo $type ?>">
            <input name='label' hidden value="<?php echo $label ?>">

           <?php
         }

        if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'],$_GET['type'])){
          // echo 'nav in';
          $cat = $_GET['cat'];
          $status = $_GET['status'];
          $off = $_GET['off'];
          $type = $_GET['type'];
          $label = $_GET['label'];
          ?>
           <input name='status' hidden value="<?php echo $status ?>">
           <input name='off' hidden value="<?php echo $off ?>">
           <input name='label' hidden value="<?php echo $label ?>">
           <input name='cat' hidden value="<?php echo $cat ?>">
           <input name='type' hidden value="<?php echo $type ?>">

          <?php
        }
        
        ?>
       
        <input id="search" class="form-control me-2" name="search" type="search" placeholder="Search in <?php echo $_SESSION['location'];  ?>" aria-label="Search">
        <button class="btn btn-warning" type="submit"><?php echo $lang['search'] ?></button>
      </form>

      
      
   


    </div>
    

      

  </div>



</nav>

  <div class="container nav-scrollers py-1 mb-2">
    
    <nav class="nav d-flex justify-content-between">
      
      <li class="nav-item dropdown">

            <a class="p-2 text-muted" href="?lang=amh"><?php echo $lang['amh'] ?></a>
        <a class="p-2 text-muted" href="?lang=eng"><?php echo $lang['eng'] ?></a>

      <?php
      if(isset($_SESSION['userId'])){
        $memberCheker = allPostListerOnColumen('mambership', 'userId', $_SESSION['userId']);
        $cm = $memberCheker->fetch_assoc();
      }


      if(isset($_SESSION['userId']) && !empty($_SESSION['userId']) && $memberCheker->num_rows == 0){
?>
<a href="members.php" class="p-2 text-muted" ><?php echo $lang['mem'] ?></a>
<?php
      }
      ?>
      

      <a href="./maincat.php?cat=blog&label=Blog" class="p-2 text-muted" ><?php echo $lang['blog'] ?></a>
      <?php 

if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){
  ?>
<a href="./login.php" class="btn btn-light"><?php echo $lang['login'] ?></a>
<?php
  
}
if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
  // to output the number of unseen msgs, we use the outer msgs function
  $seen = outerMsgFetcherSeen($_SESSION['userId']);
  $numUnseen = $seen->num_rows;


?>

<a class="btn btn-light" href="./Account.php?yourPost=true"  ><?php echo $lang['acc'] ?><span class="badge badge-danger"><?php if($numUnseen != 0){ echo ' '.$numUnseen; } ?></span></a>
<a class="btn btn-light"  href="./user/logout.php"   ><?php echo $lang['logout'] ?></a>



        <!-- </div> -->

            <!-- Button trigger modal --> 
<!-- Button trigger modal -->

<?php 
}
if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){
  ?>
<a href="login.php">  <button type="button" class="btn btn-sm-primary" data-bs-toggle="modal"  data-bs-target="#uploadDiv">
  <?php echo $lang['post'] ?>
</button></a>
  <?php
}else{
  ?>
    <button type="button" class="btn btn-sm-primary" data-bs-toggle="modal"  data-bs-target="#uploadDiv">
    <?php echo $lang['post'] ?>
</button>
  <?php
}


?>

   </nav>  </div>



<div class="modal fade" id="uploadDiv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="realInput" class="modal-body">

        <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="nav('house')"><?php echo $lang['house'] ?></button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="nav('land')"><?php echo $lang['land'] ?></button></p></div>

       <div class="col"> <p><button type="button" onclick="real()" class="btn btn-light btn-sm col"><?php echo $lang['sponsered'] ?> </button></p></div>
 
       <script>
  //     function nav2(nav, real){
  // $('#uploadDiv').load("user/postPage.php?type="+nav+"&real="+real)
  // }
    </script>

       <!-- <div class="col"> <p><button type="button" onclick="nav2('real', 'realEstate')"  class="btn btn-light btn-sm col"><?php echo $lang['realEstate'] ?> </button></p></div> -->

 


        <div id="ts" class="col" onclick="nav('car')" ><p><button type="button" class="btn btn-light btn-sm" ><?php echo $lang['Car'] ?> </button></p></div>
          </div>
        <hr>
        <div class="row">
        <div class="col"><p><button type="button" onclick="nav('vacancy')" class="btn btn-light btn-sm" ><?php echo $lang['vacancy'] ?></button></p></div>
        <div class="col"><p><button type="button" onclick="nav('tender')" class="btn btn-light btn-sm" ><?php echo $lang['tenders'] ?></button></p></div>
        <div class="col"><p><button type="button" onclick="nav('electronics')" class="btn btn-light btn-sm"><?php echo $lang['electronics'] ?></button></p></div></div>
        <hr>

        <div class="row">
          <div class="col"><p><button type="button" onclick="nav('ad')" class="btn btn-light btn-sm"><?php echo $lang['ad'] ?></button></p></div>
        <div class="col"><p><button type="button" onclick="nav('charity')" class="btn btn-light btn-sm"><?php echo $lang['charity'] ?> </button></p></div>
        <div class="col"><p><button type="button" onclick="cv()" class="btn btn-light btn-sm"><?php echo $lang['workSeekers'] ?></button></p></div>      

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

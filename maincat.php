<?php
ob_start();
session_start();
include "includes/lang.php";
include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";







if(isset($_SESSION['userId'])){
  $userId = $_SESSION['userId'];
}
unset($_SESSION['cat'], $_SESSION['status'], $_SESSION['off'], $_SESSION['label'], $_SESSION['type'], $_SESSION['arg'], $_SESSION['dyCol'], $_SESSION['dyArg']);

//// we unset all the sesssions becouse there must be no data when we navigate to other catagory since its all from a single page each time this page reloads, it deletes previious session data
//// this all part is for recording the navigation for the adaptive scroll page can scroll new content from this session variables
$_SESSION['userScroll'] = array();

if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'], $_GET['type'])){
  $_SESSION['cat'] = $_GET['cat'];
  $_SESSION['status'] = $_GET['status'];
  $_SESSION['off'] = $_GET['off'];
  $_SESSION['label'] = $_GET['label'];
  $_SESSION['type'] = $_GET['type'];
}

////for vacancy
if(isset($_GET['type'])){
  $_SESSION['type'] = $_GET['type'];
}

if(isset($_GET['dbType'])){
  $_SESSION['dbType'] = $_GET['dbType'];
}


// echo $userId;
if(isset($_GET['dyCol'], $_GET['dyArg'])){
  $_SESSION['dyCol'] = $_GET['dyCol'];
  $_SESSION['dyArg'] = $_GET['dyArg'];
}

///for house land
if(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
  $_SESSION['type'] = $_GET['type'];
  $_SESSION['userScroll'] = array();
  $_SESSION['arg'] = $_GET['arg'];
  $_SESSION['cat'] = $_GET['cat'];
  $_SESSION['label'] = $_GET['label'];
}

if(isset($_GET['label'])){
  $allLabel = $_GET['label'];
}

///page number calculation
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}



$content_per_page = 8;

$startPage = ($page * $content_per_page) - $content_per_page;
// echo $startPage.'z';
$endPage =  $content_per_page;
// echo $endPage;

	?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script>
  
$(document).ready(function(){

  window.scrollTo(0, 0);
  

  $(window).scroll(function(){
    if($(window).scrollTop() >= $('#loop').offset().top + $('#loop').outerHeight() - window.innerHeight  ){
      // alert('scroll')

      // $.ajax({
      //   url:'user/userScrollView.php',
      //   type: 'GET', 
      //   success: function(htmlz){
      //     $('#vc').append(htmlz)
          
      //   }
      // })
    }
  })


})

///msg handller
function msgHandler(table, posterId, postId, msg){

}


/// tag searching 
function tagSearch(){
  alert(this.value)
  location = this.value
  window.location.reload()
}


///page changer
function page(page){
  $.ajax({
    url: 'user/userApi.php',
    type: 'POST',
    data: {page: page},
    success: function(){
      location.reload()
    }
  })
}

function fav(pid, id, table){
  $.ajax({
    url: 'user/userApi.php',
    data: 'postId='+pid+'&uid='+'<?php echo $_SESSION['userId'] ?>'+'&table='+table,
    success: function(data){
      $('#fav'+pid).text(data)
    }
  })
}

function reload(x){
// 
  $.ajax({
    url: 'user/userApi.php',
    type: 'GET',
    data: {loc : x},
    success: function (xx) { 
      // alert(xx)
   window.location.reload()
     }
  })

  
}

</script>

<style>
  #sideViewz {
    position: sticky;
    top: 7%;
    width: 20%;
  }

  #loop {
    position: relative;
    /* left: 10%; */
    width:78%;
  }
</style>

</head>
<body>

<div id="all" class="container">

<div class="row">

  <!-- <div class=".d-sm-none .d-md-block"> -->
     
  <div id="tagSearch" class="row">
 



<!-- <div id="sideNav" class="col-2"> -->



<!-- <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body"> -->

          <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> -->

          <!-- </ul>      </div> -->
    <!-- </div> -->
  <!-- </div> -->
 
 




<?php 
  if(isset($_GET['cat'])){
    // this category lister exclude the hometutor and zebegna because thy dont have the type colomen
    if($_GET['cat'] != 'jobhometutor' && $_GET['cat'] != 'zebegna' && $_GET['cat'] != 'charity' && $_GET['cat'] != 'hotelhouse' && $_GET['cat'] != 'blog' && ( isset($_GET['type']) && $_GET['type'] != 'land') || $_GET['cat'] == 'vacancy' ){
      ?>
 
  <div class="col-3">

        <select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01" onchange="location = this.value;" >
              <option><?php if(isset($_GET['dbType'])){ echo $_GET['dbType']; }else{ echo $lang['Category']; } ?></option>
      
      

      <?php
      $tab = $_GET['cat'];
      $categorySort = array();
      $category = $admin->allCategoryLister($tab);
      while($rowc = $category->fetch_assoc()){
        $categorySort[] = $rowc['category'];
      }
      sort($categorySort);
      foreach($categorySort as $sorted){

      
      ?>
      
      <?php
          if(isset($_GET['status'], $_GET['off'], $_GET['label'], $_GET['type'])){
            ?>
              <option value="./maincat.php?cat=<?php echo $tab ?>&status=<?php echo $_GET['status'] ?>&off=<?php echo $_GET['off'] ?>&dbType=<?php echo $sorted ?>&label=<?php echo $_GET['label'] ?>&type=<?php echo $_GET['type'] ?>">  <?php echo $sorted ?></a></option>
            <?php
          }elseif(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
            ?>
             <option value="./maincat.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&dbType=<?php echo $sorted ?>&label=<?php echo $_GET['label'] ?>"><?php echo $sorted ?> </option>
            <?php
          }elseif(isset($_GET['type'])){
            ?>
              <option value="./maincat.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&dbType=<?php echo $sorted ?>&label=<?php echo $_GET['label'] ?>"><?php echo $sorted ?> </option>
            <?php
          }else{
            ?>
              <option value="./maincat.php?cat=<?php echo $tab ?>&dbType=<?php echo $sorted ?>"><?php echo $sorted ?> </option>
            <?php
          }


      ?>

      


      <?php
    }
?>  

</select>
  </div>

<?php
    }if(isset($_GET['cat'])){
      ?>
        <div class="input-group mb-3 col-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><?php echo $lang['location'] ?></span>
        </div>
        <select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01"  onchange="location=this.value;" >
          <option selected >  <?php echo $_SESSION['location'] ?></option>
          <!-- <option value="All"> All </option> -->
          <?php
            foreach($city as $loc){
              $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
              //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
              if($params['dyCol'] && $params['dyArg']  ){
                unset($params['dyCol']);
                unset($params['dyArg']);
              }
              if($params['dyCol2'] && $params['dyArg2']){ 
                unset($params['dyCol2']);
                unset($params['dyArg2']);
              }
              // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
              if($params['loc']){
                unset($params['loc']);
              }

              $string = http_build_query($params); // to build the corrected requst to normal get query format
              ?>
              
              <!-- <label onclick="reload('<?php echo $loc;  ?>')" ><?php echo $loc ?><option value="<?php echo  $_SERVER['REQUEST_URI']?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option></label> -->
            
              <option value="<?php echo $urlll['path'].'?'.$string?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option>
              <!-- <option value="<?php echo $loc ?>" > <?php echo $loc ?></option> -->

              <?php

              $i++;
            }
          ?>
        </select>
  </div>
      <?php
    }
    
    
    elseif($_GET['cat'] == 'blog'){ // blog is not seted up yet
      echo 'not yet';
    }

//if car in rent is selected this block of select search option will appear
if($_GET['cat'] == 'car' && $_GET['off'] == 'For Rent' ){
  ?>
 

<div class="input-group mb-3 col-3">
        <select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01" onchange="location = this.value;" >
          <option selected><?php if(isset($_GET['dyArg'])){ echo $_GET['dyArg']; }else{ echo $lang['Purpose'];}?></option>


          <?php

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'All'){//active class
            ?>
      <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All </option>
            <?php
          }else{
            ?>
              <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All   </option>      
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'Private'){//active class
            ?> 
      <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private" role="tab" aria-controls="home">Private </option>
            <?php
          }else{
            ?>
              <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private" role="tab" aria-controls="home">Private </option>        
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'Govormental Offices'){//active class
            ?> 
      <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Govormental Offices" role="tab" aria-controls="home">Govormental Offices </option>
            <?php
          }else{
            ?>
             <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Govormental Offices" role="tab" aria-controls="home">Govormental Offices   </option>     
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'NGO'){//active class
            ?> 
     <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=NGO" role="tab" aria-controls="home">NGO  </option>
            <?php
          }else{
            ?>
            <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=NGO" role="tab" aria-controls="home">NGO     </option> 
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'Private Company'){//active class
            ?> 
    <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private Company" role="tab" aria-controls="home">Private Company  </option>
            <?php
          }else{
            ?>
             <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private Company" role="tab" aria-controls="home">Private Company  </option>      
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'All'){//active class
            ?> 
     <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All  </option>
            <?php
          }else{
            ?>
            <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All   </option>     
            <?php
          }

?>
        </select>
        </div>

</div>
  </div>

</div>      </div>

  <?php
}

if($_GET['cat'] == 'car' && $_GET['off'] == 'For Sell' ){
?>
            <div class="input-group mb-3 col-3">
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location = this.value;"  >
          <option ><?php if(isset($_GET['dyArg'])){ echo $_GET['dyArg'];}else{  echo $lang['yearMade']; }  ?></option>
          <?php 
            $cYear = date('Y');
            for($y=1990;$y<=$cYear;$y++){
              ?>
              <option value="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=status&dyArg=<?php echo $y ?>" role="tab" aria-controls="home"> <?php echo $y ?></option>    
              <?php
            }
          ?>
          

        </select>
        </div>

<?php  
}

    if($_GET['cat'] == 'housesell' &&  $_SESSION['location'] != 'All' ){ // if 'all' is chosen as a country the subcity and kebele wont appear.
      ?>
 



 
    <?php
        $locc= $get->allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', $_SESSION['location']);
        $city = array();
        /// to check if the city chossen has a subcity if it has it goes through but if it hasent, then it doesnt appear
        if($locc->num_rows != 0){
          ?>
          
          <div class="input-group mb-3 col-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Sub City: </span>
        </div>
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location = this.value;"  >
        <option><?php if(isset($_GET['dyArg'])){ echo $_GET['dyArg'];}else{  echo $lang['subCity']; }  ?></option>
          <?php
        while($rowLoc = $locc->fetch_assoc()){
            $city[]= $rowLoc['category'];
        }
        
        sort($city);
        $i = 0;
        foreach($city as $loc){
          ?>
          <?php
          if(isset($_GET['type'], $_GET['arg']) ){
            if($i == 0 && !isset($_GET['dyArg'])){ // this is the first subsity selecter and the !isset condition is the first element is selected if the dyArg is not set if it is the user has selected a subcity
              if(!isset($_GET['dyArg'])){
                $_GET['dyArg'] = $loc;  // since the wereda is selected when the subsity is selected, this sets the arg for subsity and when wereda is selected, it will always work
              }
         
              ?>
              <option selected value="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option>   
                <?php
            }
              ?>
            <option value="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option>   
              <?php
            
          }

          
          
          ?>
        
          <?php
          $i++;
        }
        ?>
              </select>
    </div>
    
        <!-- kebele when subcity is involved in the search query. it will use both dyCol1 and dyCol2 -->
      <!-- kebele list -->
      <div class="input-group mb-3 col-3">
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location=this.value;"  >
          <option ><?php if(isset($_GET['dyArg2'])){ echo $_GET['dyArg2'];}else{  echo $lang['Wereda']; }?> <option>
          <?php 
             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                if(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'house' ){
                 ?>
                 <option value="./maincat.php?cat=housesell&type=house&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol2=wereda&dyArg2=<?php echo $y?>&dyCol=subCity&dyArg=<?php echo $_GET['dyArg']?>"><?php echo '0'.$y ?></option>
                 <?php
                }
               }else{
                if(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'house' ){
                ?>
                <option value="./maincat.php?cat=housesell&type=house&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol2=wereda&dyArg2=<?php echo $y?>&dyCol=subCity&dyArg=<?php echo $_GET['dyArg']?>"><?php echo $y ?></option>
                <?php
                }
               }

            }
          ?>
          

        </select>
        </div>
        <?php
      } else{
        ?>
        
        <!-- here if there is no subcity involved in the search tags, then this only uses dyCol  -->
              <!-- kebele list -->
      <div class="input-group mb-3 col-3">
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location=this.value;"  >
          <option ><?php if(isset($_GET['dyArg'])){ echo $_GET['dyArg'];}else{  echo $lang['Wereda']; }?> <option>
          <?php 
             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                if(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'house' ){
                 ?>
                 <option value="./maincat.php?cat=housesell&type=house&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=wereda&dyArg=<?php echo $y?>"><?php echo '0'.$y ?></option>
                 <?php
                }
               }else{
                if(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'house' ){
                ?>
                <option value="./maincat.php?cat=housesell&type=house&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=wereda&dyArg=<?php echo $y?>"><?php echo $y ?></option>
                <?php
                }
               }

            }
          ?>
          

        </select>
        </div>
        
        <?php
      }
      ?>




    </div>
      </div>
 
</div>      </div>
    
      <?php
    }



    
  }

?>

<!-- </ul> -->
    </div>
</div>
</div>
</div>  
  </div>
  

<!-- <div id="accordion" class="col-2"> -->

<!-- </div> -->
<!-- this is the main listed dysplay of the posts tha above is the filters -->
 
  <div id="loop" class="col-md-12">
    <?Php

      if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'],$_GET['type'])){
          $cat = $_GET['cat'];
          $status = $_GET['status'];
          $off = $_GET['off'];
          $label = $_GET['label'];
          if($status == ' ' && $_SESSION['location'] == 'All' && !isset($_GET['dbType']) && !isset($_GET['dyCol'], $_GET['dyArg'])){
            // echo 'elc';
            if(isset($_GET['search'])){/// if search data is there
              $search = $_GET['search'];
              $fetchPost = $get->searchC($cat, $search, $startPage, $endPage );
            }else{
              $fetchPost = $get->allPostListerOnTableD($cat, $startPage, $endPage);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' && $status == ' ' ){ //dynamic colomen and arg with location all
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){/// if search data is there
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, $dyCol, $dyCArg, $search, $startPage, $endPage );
            }else{
              $fetchPost = $get->allPostListerOnColumenD($cat, $dyCol, $dyArg, $startPage, $endPage);
            }
          }elseif($status == ' ' && $_SESSION['location'] != 'All' && !isset($_GET['dbType']) && !isset($_GET['dyCol'], $_GET['dyArg'])){// for location based output
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOnColumenD($cat, 'address', $_SESSION['location'], $startPage, $endPage);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' && $status == ' ' && !isset($_GET['dbType'] )){ //dynamic colomen and arg with location selected
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, $dyCol, $dyArg, 'address', $_SESSION['location'], $search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOn2ColumenD($cat, $dyCol, $dyArg, 'address', $_SESSION['location'], $startPage, $endPage);
            }
          }elseif($status != ' ' && $_SESSION['location'] == 'All' && !isset($_GET['dbType']) && !isset($_GET['dyCol'], $_GET['dyArg'])){
            // echo 'sdf--- '.$off;
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, $status, $off, $search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOnColumenD($cat, $status, $off, $startPage, $endPage);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $status != ' ' && $_SESSION['location'] == 'All' && !isset($_GET['dbType'])){ //dynamic colomen and arg with location selected
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, $dyCol, $dyArg, $search, $startPage, $endPage );
            }else{
              $fetchPost = $get->allPostListerOn2ColumenD($cat, $status, $off , $dyCol, $dyArg, $startPage, $endPage);
            }
          }
          
          elseif($status != ' ' && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) && !isset($_GET['dbType']) ){ // for location based output
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, $status, $off, 'address', $_SESSION['location'], $search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOn2ColumenD($cat, $status, $off, 'address', $_SESSION['location'], $startPage, $endPage);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $status != ' ' && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search3C($cat, $status, $off, 'address', $_SESSION['location'],$dyCol, $dyArg, $search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOn3ColumenD($cat, $status, $off, 'address', $_SESSION['location'],$dyCol, $dyArg, $startPage, $endPage);
            }
          }
          elseif($status == ' ' && isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, 'type', $dbType,$search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOnColumenD($cat, 'type', $dbType , $startPage, $endPage);
            }
          }elseif($status == ' ' && isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){ // for location based output
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOn2ColumenD($cat, 'type', $dbType, 'address', $_SESSION['location'] , $startPage, $endPage);
            }
          }
          elseif($status != ' ' && isset($_GET['dbType'])  && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){          
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, $status, $off, 'type', $dbType,$search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOn2ColumenD($cat, $status, $off, 'type', $dbType, $startPage, $endPage);           
            }

          }elseif($status != ' ' && isset($_GET['dbType'])  && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){          
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search3C($cat, $status, $off, 'address', $_SESSION['location'], 'type', $dbType,$search, $startPage, $endPage);
            }else{
              $fetchPost = $get->allPostListerOn3ColumenD($cat, $status, $off, 'type', $dbType, 'address', $_SESSION['location'],  $startPage, $endPage);           
            }

          } 
          
          
    ?>
    <br>
    
      <div  class="container">
          <h5><?php echo $label ?></h5> <h6><?php if(isset($_GET['dbType'])){ echo $_GET['dbType']; } ?></h6>
      </div>
        
        <br>
      <div id="vc" class="row">


    <?php
        if($fetchPost[1]->num_rows != 0){
              while($row = $fetchPost[0]->fetch_assoc()){

                if(!in_array($row['id'], $_SESSION['userScroll'])){
                  $pid = $row['id'];
                ?>
                

          
                <div  class="col-3">
              <div class="card mb-4 box-shadow">
              
              <a class="img-thumbnail stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>&type=<?php echo $_GET['type'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

                <div class="post-details">

                  <h5 class="card-title">  <?php echo $row['title'];
                                // car year made display
                                if($cat == 'car'){
                                  ?>
                                  <span class="text-success small"> Model <?php echo $row['status'] ?> </span>
                                  <?php
                                }
                  
                  ?></h5>
          
                  <?php 


                  if($cat != 'charity'){
    ?>
                  <h6 class="card-text"><span class="text-danger small"><?php echo $row['price'] ?> Birr</span> </h6>

    <?php
                  }
                  $date = $get->time_elapsed_string($row['postedDate']);
                  
                  ?>

                  <h6 class="card-text"><i class="bi bi-geo-alt"></i> <?php echo $row['address'] ?></h6>
                  <div class="d-flex justify-content-between align-items-center">
                      
                  <span class="text-danger small"><?php echo $date ?></span>

                  
                  </div>

                </div>
              </div>
              <?php
              if(isset($_SESSION['userId'])){
              $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
            </div>
        
        
      

                <?php
                array_push($_SESSION['userScroll'], $row['id']);
                }
              }
            }else{
              echo 'No Result Found';
            }

              // $pg = $fetchPost->num_rows / 9;

              ?>
              </div>
        </div>
              
              <?php



          }



          

          elseif(isset($_GET['cat'])){
            if($_GET['cat'] == 'vacancy'){
              $cat = $_GET['cat'];
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'type', $dbType ,$search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnColumenD($cat, 'type', $dbType , $startPage, $endPage);
                }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn2ColumenD($cat, 'type', $dbType, 'address', $_SESSION['location'], $startPage, $endPage );
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->searchC($cat, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnTableD($cat, $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnColumenD($cat,$dyCol, $dyArg, $startPage, $endPage);
                }
              }
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnColumenD($cat, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat,$dyCol, $dyArg,'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn2ColumenD($cat,$dyCol, $dyArg, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }
              if($fetchPost[1]->num_rows != 0){

              while($row = $fetchPost[0]->fetch_assoc()){
                if(!in_array($row['id'], $_SESSION['userScroll'])){
              ?>
                <div class="card">
                    <div class="card-header">
                     <h6><?php echo $row['type'] ?><h6>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                        <h5 class="card-title"><?php echo $row['companyName'] ?></h5> <br>
                        <h5><?php echo $row['title'] ?><h5>
                         
                      </div>
                      <?php 
                        $date = $get->time_elapsed_string($row['postedDate']);
                        $dt = new DateTime($row['postedDate']);

                        $now = new DateTime();
                        $future_date = new DateTime($row['postedDate']);

                        $interval = $future_date->diff($now);

                        ;
                      ?>
                   
                      </div>
                      
                          <h6>Salary: <?php echo $row['salary'] ?></h6>
                      <!-- <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p> -->
                      <p><small class="text-muted">  <?php echo $row['address'] ?></small></p>
                      <!-- <p><small class="text-muted">Phone:</small></p> -->
                      <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                    <a href="./Description.php?cat=vacancy&label=Vacancy Post&postId=<?php echo $row['id'] ?>&type= " type="button" class="btn btn-sm btn-outline-primary">View</a>
                                    <?php
            if(isset($_SESSION['userId'])){
              $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
                  <?php
                }
            }
              ?>
                                  </div>
                                  <small class="text-muted">Deadline: <span class="text-danger"><?php echo $interval->format("%a days, %h hours") ?></span></small>
                                </div>
                    </div>
                  </div>
              <?php
                          array_push($_SESSION['userScroll'], $row['id']);
                        }
              }
            }else{
              echo 'No Results Found.';
            }
            }
          

          ////tender
            elseif($_GET['cat'] == 'tender'){
              $cat = $_GET['cat'];
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'type', $dbType, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnColumenD($cat, 'type', $dbType, $startPage, $endPage );
                }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn2ColumenD($cat, 'type', $dbType, 'address', $_SESSION['location'], $startPage, $endPage );
                }
              }
              elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->searchC($cat, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnTableD($cat, $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnColumenD($cat,$dyCol, $dyArg, $startPage, $endPage);
                }
              }
              
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOnColumenD($cat, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat,$dyCol, $dyArg,'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn2ColumenD($cat,$dyCol, $dyArg, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }
              if($fetchPost[1]->num_rows != 0){

              while($row = $fetchPost[0]->fetch_assoc()){
                if(!in_array($row['id'], $_SESSION['userScroll'])){
              ?>
                <div class="card">
                    <div class="card-header">
                      <?php echo $row['title'] ?>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h5 class="card-title"><?php echo $row['type'] ?></h5>
                      </div>
                      <?php 
                        $date = $get->time_elapsed_string($row['postedDate']);
                        $sdate = $get->time_elapsed_string($row['startingDate']);
                        $dt = new DateTime($row['postedDate']);

                        $now = new DateTime();
                        $future_date = new DateTime($row['postedDate']);
                        $future_date2 = new DateTime($row['startingDate']);
                        $sinterval = $future_date2->diff($now);
                        $snow = new DateTime();

                        $interval = $future_date->diff($now);


                        ;
                      ?>
                        <small class="text-muted">Posted: <span class="text-success"><?php echo $date; ?></span></small>
                      </div>
                      <label>Starting Date : <?php echo $sdate; ?> or <?php echo $sinterval->format("%a days, %h hours")  ?></label>
                      
                      <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>
                      <p><small class="text-muted">Location: <?php echo $row['address'] ?></small></p>
                      <p><small class="text-muted">Phone:</small></p>
                      <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                    <a href="./Description.php?cat=tender&label=Tender Post&postId=<?php echo $row['id'] ?>&type= " type="button" class="btn btn-sm btn-outline-primary">View</a>
                                    <?php
            if(isset($_SESSION['userId'])){
              $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
                  <?php
                }
            }
              ?>                              </div>
                                  <small class="text-muted">Deadline: <span class="text-danger"><?php echo $interval->format("%a days, %h hours") ?></span></small>
                                </div>
                    </div>
                  </div>
              <?php
                          array_push($_SESSION['userScroll'], $row['id']);
                        }
              }
            }else{
              echo 'No Result Found';
            }
            }


          //////////////blog post view
          if(isset($_GET['cat']) && $_GET['cat'] == 'blog'){
            // echo 'yer';
            $cat = $_GET['cat'];
            if(isset($_GET['dbType']) ){
              $dbType = $_GET['dbType'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'title', $dbType , $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnColumenD($cat, 'title', $dbType , $startPage, $endPage);
              }
            }
            elseif(isset($_GET['search'])){
              // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->searchC($cat, $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnTableD($cat, $startPage, $endPage);
              }
            

            if($fetchPost[1]->num_rows != 0){

            while($row = $fetchPost[0]->fetch_assoc()){
              if(!in_array($row['id'], $_SESSION['userScroll'])){
            ?>
              <div class="card" >
                  <div class="card-header">
                    <?php echo $row['frontLabel'] ?>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h5 class="card-title"><?php echo $row['title'] ?></h5>
                    </div>
                    <?php 

                      $dt = new DateTime($row['postedDate']);
                      $date = $get->time_elapsed_string($row['postedDate']);
                      $c = date_create($row['postedDate']);
                      $PD = date_format($c, "Y/m/d");

                      $now = new DateTime();
                      $future_date = new DateTime($row['postedDate']);
                      $sinterval = $future_date->diff($now);
                      $snow = new DateTime();

                      $interval = $future_date->diff($now);


                      ;
                    ?>
                      <small class="text-muted">Posted: <span class="text-success"><?php echo $PD; ?></span></small>
    </div>
                    
                    <p class="card-text"  style="height:8%; overflow:hidden; text-overflow: ellipsis; "> <?php echo $row['content'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">

                              </div>
                  </div>
                </div>
                <div class="btn-group">
                                  <a href="./Description.php?cat=blog&label=Blog Post&postId=<?php echo $row['id'] ?>&type= " type="button" class="btn btn-sm btn-outline-primary">Read More...</a>
                                </div>
            <?php
                        array_push($_SESSION['userScroll'], $row['id']);
                      }
            }
          }else{
            echo 'No Result Found';
          }
        }



          }

          /////////// house post view
          if(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
            if($_GET['type'] == 'house'){


              $cat = $_GET['cat'];
              $cat = $_GET['cat'];
              // $status = $_GET['status'];
              $arg = $_GET['arg'];
              $label = $_GET['label'];

            
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
              $dbType = $_GET['dbType'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search3C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn3ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, $startPage, $endPage); 
              }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn4ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $startPage, $endPage); 
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn2ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol2'], $_GET['dyArg2']) ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat,$dyCol, $dyArg, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn3ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg,$dyCol, $dyArg, $startPage, $endPage);
                }
              }
              elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol2'], $_GET['dyArg2']) ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat,$dyCol, $dyArg, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn4ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg,$dyCol, $dyArg,'city', $_SESSION['location'], $startPage, $endPage);
                }
              }
              elseif(isset($_GET['dyCol2'], $_GET['dyArg2'],$_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                $dyCol2 = $_GET['dyCol2'];
                $dyArg2 = $_GET['dyArg2'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat,$dyCol, $dyArg, $dyCol2, $dyArg2,'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn4ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg,$dyCol, $dyArg, $dyCol2, $dyArg2, $startPage, $endPage);
                }
              }
              
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) && !isset($_GET['dyCol2'], $_GET['dyArg2']) ){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn3ColumenD($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol2'], $_GET['dyArg2'], $_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                $dyCol2 = $_GET['dyCol2'];
                $dyArg2 = $_GET['dyArg2'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search5C($cat,$dyCol, $dyArg, $dyCol2, $dyArg2,'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn5ColumenD($cat,$dyCol, $dyArg, $dyCol2, $dyArg2,'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $startPage, $endPage);
                }
              }
              
              
    ?>
    <br>
      <div  class="container">
          <h5><?php echo $label ?></h5>
      </div>
        
        <br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


    <?php
        if($fetchPost[1]->num_rows != 0){

              while($row = $fetchPost[0]->fetch_assoc()){

                if(!in_array($row['id'], $_SESSION['userScroll'])){
                ?>
                

          
                      <div  class="row-col-3 row-col-sm-12 row-col-md-3">
                  <div class="card mb-4 box-shadow">
              
              <a class="img-thumbnail stretched-link" href="./Description.php?cat=housesell&type=house&postId=<?php echo $row['id'] ?>&label=House Posts" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

                <div class="card-body">
                  <h5 class="card-title">  <?php echo $row['type'] ?></h5>
                  <h6><?php echo $row['forRentOrSell'] ?></h6>
                  <h6 class="card-text"><span class="text-danger small"><?php echo $row['cost'] ?> Birr</span> </h6>
                  <?php 

                  $date = $get->time_elapsed_string($row['postedDate']);
                  ?>
                  <h6 class="card-text">   <?php echo $row['city'] ?> </h6>
                  <div class="d-flex justify-content-between align-items-center">
                  <span class="text-danger small"><?php echo $date ?></span>
                      

                  </div>
                  
                </div>
              </div>
              <?php
              if(isset($_SESSION['userId'])){
              $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
                  <?php
                }
              }
              ?>
            </div>
        
        
      

                <?php
                          array_push($_SESSION['userScroll'], $row['id']);
                        }

              }
            }else{
              echo 'No Result Found';
            }
            
    ?> </div> <?php

            }
          


          ///// land post view
            if($_GET['type'] == 'land'){

              
              $cat = $_GET['cat'];
              // $status = $_GET['status']; 
              $arg = $_GET['arg'];
              $label = $_GET['label'];

              if(isset($_GET['dbType'])&& $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn3ColumenD($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, $startPage, $endPage); 
                }
              }if(isset($_GET['dbType'])&& $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn4ColumenD($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $startPage, $endPage); 
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn2ColumenD($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All'  ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn3ColumenD($cat, 'houseOrLand', 'LAND', 'forRentOrSell' , $arg,$dyCol, $dyArg, $startPage, $endPage);
                }
              }

              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn3ColumenD($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = $get->allPostListerOn4ColumenD($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $startPage, $endPage);
                }
              }
              
              
    ?>
    <br>
      <div  class="container">
          <h5><?php echo $label ?></h5>
      
        </div>
        <br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


    <?php
        if($fetchPost[1]->num_rows != 0){

              while($row = $fetchPost[0]->fetch_assoc()){
                if(!in_array($row['id'], $_SESSION['userScroll'])){

                ?>
                

          
                      <div  class="row-col-3 row-col-sm-12 row-col-md-3">
                  <div class="card mb-4 box-shadow">
              
              <a class="img-thumbnail stretched-link" href="./Description.php?cat=housesell&type=land&postId=<?php echo $row['id'] ?>&label=Land Posts" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

                <div class="card-body">
                  <h5 class="card-title">  <?php echo $row['title'] ?></h5>
                  <?php 
                  if($cat != 'charity'){
    ?>
                  <h6 class="card-text"><span class="text-danger small"><?php echo $row['cost'] ?></span> </h6>

    <?php
                  }
                  $date = $get->time_elapsed_string($row['postedDate']);
                  ?>
                  
                  <h6 class="card-text"> Location:  <?php echo $row['city'] ?></h6>
                  <div class="d-flex justify-content-between align-items-center">
                  <span class="text-danger small"><?php echo $date ?></span>
                      

                  </div>
                </div>
              </div>
              <?php
              if(isset($_SESSION['userId'])){
              $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
                  <?php
                }
              }
              ?>
            </div>
        
        
      

                <?php
                          array_push($_SESSION['userScroll'], $row['id']);
                        }


              }
            }else{
              echo 'No Result Found';
            }
            
    ?> </div> <?php

            }
          }

          
          ///////////////cv seekers
          if(isset($_GET['cat'], $_GET['type'], $_GET['label'])){
            $cat = $_GET['cat'];
            $type = $_GET['type'];
            $label = $_GET['label'];

            if($type == "homeTutor" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) || $type == 'zebegna' && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->searchC($cat, $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnTableD($cat, $startPage, $endPage);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "homeTutor" && $_SESSION['location'] == 'All' || isset($_GET['dyCol'], $_GET['dyArg']) && $type == 'zebegna' && $_SESSION['location'] == 'All'){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnColumenD($cat,$dyCol, $dyArg, $startPage, $endPage);
              }
            }
            
            
            elseif($type == "homeTutor" && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])  || $type == 'zebegna' && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnColumenD($cat, 'address', $_SESSION['location'], $startPage, $endPage);
              }
            }
            elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "homeTutor" && $_SESSION['location'] != 'All' || isset($_GET['dyCol'], $_GET['dyArg']) && $type == 'zebegna' && $_SESSION['location'] != 'All'){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg , 'address', $_SESSION['location'] , $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn2ColumenD($cat,$dyCol, $dyArg,  'address', $_SESSION['location'], $startPage, $endPage);
              }
            }
            
            elseif($type == "houseWorker" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'hotelOrHouse', 'HOUSE', $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnColumenD($cat, 'hotelOrHouse', 'HOUSE', $startPage, $endPage);
              }
            }
            elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "houseWorker" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOUSE', $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn2ColumenD($cat,$dyCol, $dyArg, 'hotelOrHouse', 'HOUSE', $startPage, $endPage);
              }
            }
            elseif($type == "houseWorker" && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat, 'hotelOrHouse', 'HOUSE',  'address', $_SESSION['location'], $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn2ColumenD($cat, 'hotelOrHouse', 'HOUSE',  'address', $_SESSION['location'], $startPage, $endPage);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "houseWorker" && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search3C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOUSE' ,  'address', $_SESSION['location'], $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat,$dyCol, $dyArg, 'hotelOrHouse', 'HOUSE',   'address', $_SESSION['location']);
              }
            }
            
            elseif($type == "hotelWorker" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'hotelOrHouse', 'HOTEL', $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOnColumenD($cat, 'hotelOrHouse', 'HOTEL', $startPage, $endPage);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "hotelWorker" && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOTEL', $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn2ColumenD($cat,$dyCol, $dyArg,'hotelOrHouse', 'HOTEL', $startPage, $endPage);
              }
            }
            
            
            elseif($type == "hotelWorker" && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat, 'hotelOrHouse', 'HOTEL','address', $_SESSION['location'], $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn2ColumenD($cat, 'hotelOrHouse', 'HOTEL','address', $_SESSION['location'], $startPage, $endPage);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "hotelWorker" && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOTEL', $search, $startPage, $endPage);
              }else{
                $fetchPost = $get->allPostListerOn2ColumenD($cat,$dyCol, $dyArg,'hotelOrHouse', 'HOTEL', $startPage, $endPage);
              }
            }

            
            ?>
            <br>
            <div  class="container">
                <!-- <h5><?php echo $label ?></h5> -->
            </div>
              
              <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
            <?php
            
    

            if($fetchPost[1]->num_rows != 0){


            while($row = $fetchPost[0]->fetch_assoc()){
              

              if(!in_array($row['id'], $_SESSION['userScroll'])){
                $pid = $row['id'];
              ?>
              

        
                    <div  class="col-md-3">
                  <div class="card mb-4 box-shadow">
            
            <a class="img-thumbnail stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>&type=<?php echo $type ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

              <div class="card-body">

                <p class="card-text">Name:  <?php echo $row['name'] ?></p>
                <p> Sex: <?php $row['sex'] ?></p>
                <?php 
                  if($type == 'hometTutor'){
                    ?>

                    <h5> <h5><?php echo $row['Price'] ?></h5>  <?php $row['paymentStatus'] ?></h5>
                    <?php
                  }
                  if($type == 'houseKeeper'){
                    ?> <h3>Religion: <?php echo $row['religion'] ?></h3> <?php
                  }
                ?>
                <?php 

                $date = $get->time_elapsed_string($row['postedDate']);
                
                ?>
                <h6 class="card-text">Location: <?php echo $row['address'] ?></h6>
                <div class="d-flex justify-content-between align-items-center">
                <span class="text-danger small"><?php echo $date ?></span>

                </div>

              </div>
            </div>
            <?php
            if(isset($_SESSION['userId'])){
              $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
                  <?php
                }
            }
              ?>
          </div>
      
      


              <?php
              array_push($_SESSION['userScroll'], $row['id']);
              }
            }
          }else{
            echo 'No Result Found';
          }

            
            
            

          }

?>
      </div>

</div>
<?php
// this condition will dictate the pageination 
          // this condition will dictate the pageination 
// this condition will dictate the pageination 
          // this condition will dictate the pageination 
// this condition will dictate the pageination 
          if($fetchPost[1]->num_rows != 0){
            ?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <?php
    $pageNumberPerPAGE = 2; 
    
    if(isset($_GET['end']) && $_GET['end'] != 0){
      $_SESSION['pgn'] =  $_GET['end'];
    }
    elseif(isset($_GET['end']) && $_GET['end'] > 0 || !isset($_GET['end'])){
      $_SESSION['pgn'] =  1;
    }
    
    ?>
    <li class="page-item">
      <?php

      if($_SESSION['pgn']!= 1){
        $urll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
        $urll = parse_str($urll['query'], $params); // to make an assoc array of all the parameter key with the value
        unset($params['page']);
        unset($params['end']);
        $string = http_build_query($params);
        ?>
        <a class="page-link" href="maincat.php?<?php echo $string ?>&end=<?php echo $_SESSION['pgn']-$pageNumberPerPAGE ?>"  >Previous</a>
        <?php
      }
      ?>
    </li>
            <?php
            // echo $fetchPost[1]->num_rows;

            $pageCount = ceil($fetchPost[1]->num_rows/$content_per_page);
            for($j= $_SESSION['pgn'];$j<=$pageCount;$j++){
              $urll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              $urll = parse_str($urll['query'], $params); // to make an assoc array of all the parameter key with the value
              unset($params['page']);
              unset($params['end']);
              $string = http_build_query($params);
              // var_dump($string);
              // $string = str_replace('+', '%20', $string);
       

              if(isset($_GET['page'])){
                if($_GET['page'] == $j){
                  ?>
                  <li class="page-item active"><a class="page-link" href="maincat.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }else{
                  ?>
                  <li class="page-item"><a class="page-link " href="maincat.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }
              }elseif($j == 1 ){
                ?>
                <li class="page-item active"><a class="page-link" href="maincat.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php    
              }else{
                ?>
                <li class="page-item"><a class="page-link " href="maincat.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php               
              }


              // this is to show the max page numbers displayed on page.. then it will break.
              if($j == $pageNumberPerPAGE + $_SESSION['pgn'] - 1){
                break;
              }
            }
            ?>
            <?php

            // this is a limit condition so that it doesent show the next button if there is not more page numbers are available
            if($j + 1 < $pageCount){
              ?>
              <a class="page-link" href="maincat.php?<?php echo $string ?>&page=<?php echo $j+1 ?>&end=<?php echo $j+1 ?>">Next</a>
              <?php
            }
            ?>
    </li>


  </ul>
</nav>
            <?php
          }


        
        ?>
<div style="clear:both;"></div>

<!-- </div> -->
<div style="clear:both;"></div>
      <?php
      
  ?>
</body>
<?php

include 'includes/footer.php';
?>
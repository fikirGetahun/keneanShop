
<?php

include "includes/lang.php"; 
include "includes/header.php";
include "includes/secnav.php";
// include "header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
if(isset($_SESSION['userId'])){
  $userId = $_SESSION['userId'];
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
<div class="container-fluid mt-3">
  <div class="row">


<div class="row">
<?php
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

  <!-- <div class="overflow-auto"> -->

  <!-- <div class=".d-sm-none .d-md-block"> -->
     
  <div id="tagSearch" class="row justify-content-center" >
 



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



//// for selecting b/n realestate, bank stoke, insurance stoke

if(isset($_GET['cat']) && $_GET['cat'] == 'realestate'){
  ?>
  <div  class="col-sm-3" >
  <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
    <option selected ><?php echo $allLabel ?>Sponsered</option>
    <option value="./vacancies.php?cat=realestate&spType=rs&arg= &label=Real Estate" >Real Estate Sponsered</option>
    <option value="./vacancies.php?cat=realestate&spType=ban&arg= &label=Bank Stokes" >Bank Stokes Sponsered</option>
    <option value="./vacancies.php?cat=realestate&spType=ins&arg= &label=Insurance Stokes" >Insurance Stokes Sponsered </option>
  </select>
  </div>


<?php  
}

if(isset($_GET['spType']) && $_GET['spType'] == 'rs'){
  ?>
  <div  class="col-sm-3" >
  
  <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
  /vacancies.php?cat=realestate&spType=rs&arg= &label=Real Estate
   <option selected><?php echo $lang['CategoryReal'] ?></option>
   <option value="./vacancies.php?cat=realestate&spType=rs&arg= &label=Real Estate&dbType=Commercial RS">Commercial RS</option>
   <option value="Hotel and Lodging">Hotel and Lodging</option>
   <option value="Industrial RS">Industrial RS</option>
   <option value="Land For RS">Land For RS</option>
   <option value="Mixed Use">Mixed Use</option>
   <option value="Office Space">Office Space</option>
   <option value="Residential Rs">Residential Rs</option>

 </select>
   </div>


<?php 
}



/// for rent and for sell filter for car, house and land  

if(isset($_GET['cat'])){
  $rent_filter = array('car', 'housesell', 'realestate'); 
  $table = $_GET['cat'];
  /// if the table does need for rent or for sell filter
  if(in_array($table, $rent_filter)){
    /// if the table is housesell and type house post
    if(isset($_GET['type']) && $_GET['type'] == 'house' && $table == 'housesell'){
      ?>
        <div  class="col-md-3" >
        <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
          <option value=" " >For Rent or Sell</option>
          <option value="./vacancies.php?cat=housesell&type=house&arg=For Sell&label=House For Sell" >For Sell</option>
          <option value="./vacancies.php?cat=housesell&type=house&arg=For Rent&label=House For Rent" >For Rent</option>
        </select>
        </div>
      <?php
      // vacancies.php?cat=housesell&type=land&arg=For Sell&label=Land For Sell
    }elseif(isset($_GET['type']) && $_GET['type'] == 'land' && $table == 'housesell'){
      ?>
        <div  class="col-md-3" >
        <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
          <option value=" " >For Rent or Sell</option>
          <option value="./vacancies.php?cat=housesell&type=land&arg=For Sell&label=Land For Sell" >For Sell</option>
          <option value="./vacancies.php?cat=housesell&type=land&arg=For Rent&label=Land For Rent" >For Rent</option>
        </select>
        </div>
      <?php   
      // vacancies.php?cat=car&status=forRentOrSell&off=For Sell&label=Cars To Buy&type=   
    }elseif($table == 'car'){
      ?>
        <div  class="col-md-3" >
        <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
          <option value=" " >For Rent or Sell</option>
          <option value="./vacancies.php?cat=car&status=forRentOrSell&off=For Sell&label=Cars To Buy&type=   " >For Sell</option>
          <option value="./vacancies.php?cat=car&status=forRentOrSell&off=For Rent&label=Cars For Rent&type=" >For Rent</option>
        </select>
        </div>
      <?php      
    }

    /// for realEstate rent or sell
    if(isset($_GET['spType']) && $_GET['spType'] == 'rs'){

      ?>
      <div  class="col-md-3" >
      <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
        <option value=" " >For Rent or Sell</option>
        <option value="./vacancies.php?cat=realestate&spType=rs&arg=For Sell&label=Real Estate For Sell" >For Sell</option>
        <option value="./vacancies.php?cat=realestate&spType=rs&arg=For Rent&label=Real Estate For Rent" >For Sell</option>
      </select>
      </div>
    <?php  
    }
  }
}



/// to list category filter
  if(isset($_GET['cat'])){      
    // this category lister exclude the hometutor and zebegna because thy dont have the type colomen
    if($_GET['cat'] != 'jobhometutor' && $_GET['cat'] != 'zebegna' && $_GET['cat'] != 'charity' && $_GET['cat'] != 'hotelhouse' && $_GET['cat'] != 'blog' && ( isset($_GET['type']) && $_GET['type'] != 'land' ) || $_GET['cat'] == 'vacancy' ){
      ?>
 
  <div class="col-md-3">

        <select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01" onchange="location = this.value;" >
              <option><?php if(isset($_GET['dbType'])){ echo $_GET['dbType']; }else{ echo $lang['Category']; } ?></option>
      
      

      <?php
      if($_GET['type'] == 'big'){
        $tab = $_GET['cat'];
        $categorySort = array();
        $category = allCategoryLister('big');
      }else{
        $tab = $_GET['cat'];
        $categorySort = array();
        $category = allCategoryLister($tab);
      }
   
      while($rowc = $category->fetch_assoc()){
        $categorySort[] = $rowc['category'];
      }
      sort($categorySort);
      foreach($categorySort as $sorted){

      
      ?>
      
      <?php
          if(isset($_GET['status'], $_GET['off'], $_GET['label'], $_GET['type'])){
            ?>
              <option value="./vacancies.php?cat=<?php echo $tab ?>&status=<?php echo $_GET['status'] ?>&off=<?php echo $_GET['off'] ?>&dbType=<?php echo $sorted ?>&label=<?php echo $_GET['label'] ?>&type=<?php echo $_GET['type'] ?>">  <?php echo $sorted ?></a></option>
            <?php
          }elseif(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
            ?>
             <option value="./vacancies.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&dbType=<?php echo $sorted ?>&label=<?php echo $_GET['label'] ?>"><?php echo $sorted ?> </option>
            <?php
          }elseif(isset($_GET['type'])){
            ?>
              <option value="./vacancies.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&dbType=<?php echo $sorted ?>&label=<?php echo $_GET['label'] ?>"><?php echo $sorted ?> </option>
            <?php
          }else{
            ?>
              <option value="./vacancies.php?cat=<?php echo $tab ?>&dbType=<?php echo $sorted ?>"><?php echo $sorted ?> </option>
            <?php
          }


      ?>

      


      <?php
    }
?>  

</select>
  </div>

<?php
    }




    
    //// as mikiy requested city list filter must be at the middel so every post has a table. when the table is set, which is 'cat', the city filter will come
    if(isset($_GET['cat'])){
      ?>
              <?php 
              require_once 'php/fetchApi.php';
                $locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;

              ?> 
        <div class="input-group  col-3">
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
              // if($params['dyCol'] && $params['dyArg']  ){
              //   unset($params['dyCol']);
              //   unset($params['dyArg']);
              // }
              // if($params['dyCol2'] && $params['dyArg2']){ 
              //   unset($params['dyCol2']);
              //   unset($params['dyArg2']);
              // }
              // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
              if($params['loc']){
                unset($params['loc']);
              }

              $string = http_build_query($params); // to build the corrected requst to normal get query format
              ?>
              
              <!-- <label onclick="reload('<?php echo $loc;  ?>')" ><?php echo $loc ?><option value="<?php echo  $_SERVER['REQUEST_URI']?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option></label> -->
              <option value="<?php echo './vacancies.php?'.$string?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option>
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

  $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
  $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
  //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
  if(isset($params['dyCol']) && isset($params['dyArg'])  ){
    unset($params['dyCol']);
    unset($params['dyArg']);
  }
  if(isset($params['dyCol2']) && isset($params['dyArg2'])){ 
    // unset($params['dyCol2']);
    // unset($params['dyArg2']);
  }
  // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
   if(isset($params['loc'])){
    unset($params['loc']);
  }

  $string = http_build_query($params); // to build the corrected requst to normal get query format

  ?>
 

<div class="input-group mb-3 col-md-3">
        <select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01" onchange="location = this.value;" >
          <option selected><?php if(isset($_GET['dyArg'])){ echo $_GET['dyArg'];  }else{ echo $lang['Purpose'];}?></option>

          <?php


            ?>
              <option value="vacancies.php?<?php echo $string ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All   </option>      
            <?php
            ?>
              <option value="vacancies.php?<?php echo $string ?>&dyCol=forWho&dyArg=Private" role="tab" aria-controls="home">Private </option>        
            <?php
        
            ?>
             <option value="vacancies.php?<?php echo $string ?>&dyCol=forWho&dyArg=Govormental Offices" role="tab" aria-controls="home">Govormental Offices   </option>     
            <?php
      
            ?>
            <option value="vacancies.php?<?php echo $string ?>&dyCol=forWho&dyArg=NGO" role="tab" aria-controls="home">NGO     </option> 
            <?php
          
            ?>
             <option value="vacancies.php?<?php echo $string ?>&dyCol=forWho&dyArg=Private Company" role="tab" aria-controls="home">Private Company  </option>      
            <?php
          
            ?>
            <option value="vacancies.php?<?php echo $string ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All   </option>     
            <?php
          

?>
        </select>
        </div>

<!-- </div> -->
  <!-- </div> -->



  <?php
}

if($_GET['cat'] == 'car' && $_GET['off'] == 'For Sell' ){ 

  $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
  $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
  //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
  if(isset($params['dyCol']) && $params['dyArg']  ){
    unset($params['dyCol']);
    unset($params['dyArg']);
  }

  // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
  if(isset($params['loc'])){
    unset($params['loc']);
  }

  $string = http_build_query($params); // to build the corrected requst to normal get query format
?>
            <div class="input-group mb-3 col-md-3">
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location = this.value;"  >
          <option ><?php if(isset($_GET['dyArg'])){ if($_GET['dyCol'] == 'status'){ echo $_GET['dyArg']; } }else{  echo $lang['yearMade']; }  ?></option>
          <?php 
            $cYear = date('Y');
            for($y=1990;$y<=$cYear;$y++){
              ?>
              <option value="vacancies.php?<?php echo $string ?>&dyCol=status&dyArg=<?php echo $y ?>" role="tab" aria-controls="home"> <?php echo $y ?></option>    
              <?php
            }
          ?>
          

        </select>
        </div>

<?php  
}

// 
    if(($_GET['cat'] == 'housesell' &&  $_SESSION['location'] != 'All') || ($_GET['cat'] == 'realestate' &&  $_SESSION['location'] != 'All' && isset($_GET['spType']) && $_GET['spType'] == 'rs') ){ // if 'all' is chosen as a country the subcity and kebele wont appear.
      ?>
 



 
    <?php
        $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', $_SESSION['location']);
        $city = array();
        /// to check if the city chossen has a subcity if it has it goes through but if it hasent, then it doesnt appear
        if($locc->num_rows != 0){
          ?>
          
          <div class="input-group   col-md-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Sub City: </span>
        </div>
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location = this.value;"  >
        <option selected ><?php if(isset($_GET['dyArg'])){ if($_GET['dyCol'] == 'subCity'){echo $_GET['dyArg'];}elseif($_GET['dyCol2'] == 'subCity'){echo $_GET['dyArg2'];} }else{  echo $lang['subCity']; }  ?></option>
          <?php
        while($rowLoc = $locc->fetch_assoc()){
            $city[]= $rowLoc['category'];
        }
        
        sort($city);
        $i = 0;
        foreach($city as $loc){
          ?>
          <?php
          if(isset($_GET['type'], $_GET['arg']) || isset($_GET['spType'])){
            if($i == 0 && !isset($_GET['dyArg'])){ // this is the first subsity selecter and the !isset condition is the first element is selected if the dyArg is not set if it is the user has selected a subcity
              if(!isset($_GET['dyArg'])){
                $_GET['dyArg'] = $loc;  // since the wereda is selected when the subsity is selected, this sets the arg for subsity and when wereda is selected, it will always work
              }
         


              $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
              //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
              // if(isset($params['dyCol']) && $params['dyArg']  ){
                // unset($params['dyCol']);
                // unset($params['dyArg']);
              // }
              // if($params['dyCol2'] && $params['dyArg2']){ 
                // unset($params['dyCol2']);
                // unset($params['dyArg2']);
              // }
              // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
              if(isset($params['loc'])){
                unset($params['loc']);
              }

              $string = http_build_query($params); // to build the corrected requst to normal get query format
              ?>
              



              
              <option  value="vacancies.php?<?php echo $string ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option>   
                <?php
            }else{
              if(isset($_GET['dyCol']) && $_GET['dyCol'] == 'subCity'){
                
              $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
              //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
              if(isset($params['dyCol']) && $params['dyArg']  ){
                unset($params['dyCol']);
                unset($params['dyArg']);
              }
              // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
              if(isset($params['loc'])){
                unset($params['loc']);
              }

              $string = http_build_query($params); // to build the corrected requst to normal get query format
                ?>
              <option value="vacancies.php?<?php echo $string ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option> 
                <?php
              }elseif(isset($_GET['dyCol']) && $_GET['dyCol'] != 'subCity'){
                ?>
              <option  value="vacancies.php?<?php echo $string ?>&dyCol2=subCity&dyArg2=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option>  
                <?php
              }

              elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] == 'subCity'){
                
              $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
              //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database

              if(isset($params['dyCol2']) && $params['dyArg2']){ 
                unset($params['dyCol2']);
                unset($params['dyArg2']);
              }
              // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
              if(isset($params['loc'])){
                unset($params['loc']);
              }

              $string = http_build_query($params); // to build the corrected requst to normal get query format
                ?>
              <option  value="vacancies.php?<?php echo $string ?>&dyCol2=subCity&dyArg2=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option> 
                <?php
              }elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] != 'subCity'){
                ?>
                 <option  value="vacancies.php?<?php echo $string ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option>            
                <?php
              }else{
                ?>
                <option value="vacancies.php?<?php echo $string ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></option> 
                <?php
              }
              ?>
 
              <?php
          }
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
      <div class="input-group mb-3 col-md-3">
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location=this.value;"  >
          <option selected ><?php   if(isset($_GET['dyArg'])){ if(isset($_GET['dyCol']) && $_GET['dyCol'] == 'wereda'){echo $_GET['dyArg'];}elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] == 'wereda'){echo $_GET['dyArg2'];} }else{  echo $lang['Wereda']; }?> <option>
          <?php 
          $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
          $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
          //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
          if(isset($params['dyCol']) && $params['dyArg']  ){
            // unset($params['dyCol']);
            // unset($params['dyArg']);
          }
          if(isset($params['dyCol2']) && $params['dyArg2']){ 
            // unset($params['dyCol2']);
            // unset($params['dyArg2']);
          }
          // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
          if(isset($params['loc'])){
            unset($params['loc']);
          }

          $string = http_build_query($params); // to build the corrected requst to normal get query format
            $zero = 0;   
          for($y=1;$y<=30;$y++){
              if($y <= 9 ){
              //  if(isset($_GET['type'], $_GET['arg'])){
                 if(isset($_GET['dyCol']) && $_GET['dyCol'] == 'wereda'){
                  $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
                  $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
                  //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
                  if(isset($params['dyCol']) && $params['dyArg']  ){
                    unset($params['dyCol']);
                    unset($params['dyArg']);
                  }
                  // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
                  if(isset($params['loc'])){
                    unset($params['loc']);
                  }
    
                  $string = http_build_query($params); // to build t
                  ?>
                    <option   value="vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $zero.$y?>" role="tab" aria-controls="home"><?php echo '0'.$y ?></option>
                  <?php
                 }elseif(isset($_GET['dyCol']) && $_GET['dyCol'] != 'wereda'){
                   ?>
                   <option   value="vacancies.php?<?php echo $string ?>&dyCol2=wereda&dyArg2=<?php echo $zero.$y?>" role="tab" aria-controls="home"><?php echo '0'.$y ?></option>
                   <?php
                 }

                 elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] == 'wereda'){

                  $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
                  $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
                  //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
    
                  if(isset($params['dyCol2']) && $params['dyArg2']){ 
                    unset($params['dyCol2']);
                    unset($params['dyArg2']);
                  }
                  // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
                  if(isset($params['loc'])){
                    unset($params['loc']);
                  }
    
                  $string = http_build_query($params); // to build the corrected requst to normal get query format
                  ?>
                <option   value="vacancies.php?<?php echo $string ?>&dyCol2=wereda&dyArg2=<?php echo $zero.$y?>" role="tab" aria-controls="home"><?php echo '0'.$y ?></option>
                  <?php
                 }elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] != 'wereda'){
                  ?>
                <option  value="vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $zero.$y?>" role="tab" aria-controls="home"><?php echo '0'.$y ?></option>
                  <?php
                 }else{
                   ?>
                       <option  value="vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $zero.$y?>" role="tab" aria-controls="home"><?php echo '0'.$y ?></option>      
                   <?php
                 }

                 
               
              }else{
               if(isset($_GET['type'], $_GET['arg'])  || isset($_GET['spType'])){
                if(isset($_GET['dyCol']) && $_GET['dyCol'] == 'wereda'){
                  $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
                  $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
                  //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
                  if(isset($params['dyCol']) && $params['dyArg']  ){
                    unset($params['dyCol']);
                    unset($params['dyArg']);
                  }
                  // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
                  if(isset($params['loc'])){
                    unset($params['loc']);
                  }
    
                  $string = http_build_query($params); // to build t
                  ?>
                    <option   value="./vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $y?>" role="tab" aria-controls="home"><?php echo $y ?></option>
                  <?php
                 }else if(isset($_GET['dyCol']) && $_GET['dyCol'] != 'wereda'){
                   ?>
                   <option  value="./vacancies.php?<?php echo $string ?>&dyCol2=wereda&dyArg2=<?php echo $y?>" role="tab" aria-controls="home"><?php echo $y ?></option>
                   <?php
                 }
        
                 elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] == 'wereda'){

                  $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
                  $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
                  //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
    
                  if(isset($params['dyCol2']) && $params['dyArg2']){ 
                    unset($params['dyCol2']);
                    unset($params['dyArg2']);
                  }
                  // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
                  if(isset($params['loc'])){
                    unset($params['loc']);
                  }
    
                  $string = http_build_query($params); // to build the corrected requst to normal get query format
                  ?>
                <option   value="./vacancies.php?<?php echo $string ?>&dyCol2=wereda&dyArg2=<?php echo $y?>" role="tab" aria-controls="home"><?php echo $y ?></option>
                  <?php
                 }elseif(isset($_GET['dyCol2']) && $_GET['dyCol2'] != 'wereda'){
                  ?>
                <option  value="vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $y?>" role="tab" aria-controls="home"><?php echo $y ?></option>
                  <?php
                 }else{
                   ?>
                         <option   value="./vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $y?>" role="tab" aria-controls="home"><?php echo $y ?></option>    
                   <?php
                 }

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
      <div class="input-group mb-3 col-md-3">
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01" onchange="location=this.value;"  >
          <option selected ><?php if(isset($_GET['dyArg'])){ if(isset($_GET['dyCol']) && $_GET['dyCol'] == 'wereda'){echo $_GET['dyArg'];}elseif(isset($_GET['dyCol2']) &&$_GET['dyCol2'] == 'wereda'){echo $_GET['dyArg2'];} }else{  echo $lang['Wereda']; }?> <option>
          <?php 

$urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
$urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
//to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
if(isset($params['dyCol']) && $params['dyArg']  ){
  // unset($params['dyCol']);
  // unset($params['dyArg']);
}
if(isset($params['dyCol2']) && $params['dyArg2']){ 
  // unset($params['dyCol2']);
  // unset($params['dyArg2']);
}
// TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
if(isset($params['loc'])){
  unset($params['loc']);
}

$string = http_build_query($params); // to build the corrected requst to normal get query format

             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                if(isset($_GET['type'], $_GET['arg'])){
                 ?>
                 <option value="./vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $y?>"><?php echo '0'.$y ?></option>
                 <?php
                }
               }else{
                if(isset($_GET['type'], $_GET['arg']) ){
                ?>
                <option value="./vacancies.php?<?php echo $string ?>&dyCol=wereda&dyArg=<?php echo $y?>"><?php echo $y ?></option>
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





    
      <?php
    }



    
  }

?>

<!-- </ul> -->
    </div>
</div>

  <!-- </div> -->


    <div class="col-md-8"><!-- right lane-->
      <div class="container bg-light shadow"><!--right container-->

        <h3 class="text-primary text-center mt-3">Zumra Vacancies in Ethiopia Get The latest Updates</h3>
        <hr>

        <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Posted Date</th>
      <th scope="col">Job Position/title</th>
      <th scope="col">Company</th>
      <th scope="col">City</th>
      <th scope="col">Deadline</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(isset($_GET['cat'])){
            if($_GET['cat'] == 'vacancy'){
              $cat = $_GET['cat'];
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search1C($cat, 'type', $dbType ,$search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnColumenD($cat, 'type', $dbType , $startPage, $endPage);
                }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOn2ColumenD($cat, 'type', $dbType, 'address', $_SESSION['location'], $startPage, $endPage );
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = searchC($cat, $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnTableD($cat, $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search1C($cat,$dyCol, $dyArg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnColumenD($cat,$dyCol, $dyArg, $startPage, $endPage);
                }
              }
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search1C($cat, 'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnColumenD($cat, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search2C($cat,$dyCol, $dyArg,'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOn2ColumenD($cat,$dyCol, $dyArg, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }
              if($fetchPost[1]->num_rows != 0){

              while($row = $fetchPost[0]->fetch_assoc()){
                if(!in_array($row['id'], $_SESSION['userScroll'])){
                  $dated=date_create($row['postedDate']);
                 
                  $st = date_create($row['deadLine']);
                  $exdate = date_format($st,"F j, Y ");
                  $stdate = date_format($dated,"F j, Y ");
                  $future_date = new DateTime($row['deadLine']);
                  $now = new DateTime();
                  $interval = $future_date->diff($now);
                  // echo 'interval '.$interval;

                  $deadLineInF = date_format($st,"Y-m-d");
                  $startInF= date_format($dated,"Y-m-d");
                  $start = strtotime($startInF);
                  $end = strtotime($deadLineInF);
                  $days_between = ceil(($end - $start) / 86400);

                    ?>
                    
                    <tr>
                      <td><?php echo $stdate ?></td>
                      <td><a href="vacdesc.php"><?php echo $row['title']  ?></a></td>
                      <td><?php echo $row['companyName'] ?></td>
                      <td><?php echo $row['address'] ?></td>
                      <?php 
                      if($days_between <= 0){
                        ?>
                         <td class="text-primary bg-danger"><?php echo $exdate;   ?></td>
                        <?php
                      }else{
                        ?>
                         <td class="text-primary"><?php echo $exdate;   ?></td>
                        <?php
                      }
                      ?>
                     
                    </tr>
                    <?php
                }
              }
            }
          }
        }
              ?>

  
  </tbody>
</table>
<?php


// this condition will dictate the pageination 
if($fetchPost[1]->num_rows != 0){
            ?>
      <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
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
        <a class="page-link" href="vacancies.php?<?php echo $string ?>&end=<?php echo $_SESSION['pgn']-$pageNumberPerPAGE ?>"  >Previous</a>
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
                  <li class="page-item active"><a class="page-link" href="vacancies.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }else{
                  ?>
                  <li class="page-item"><a class="page-link " href="vacancies.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }
              }elseif($j == 1 ){
                ?>
                <li class="page-item active"><a class="page-link" href="vacancies.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php    
              }else{
                ?>
                <li class="page-item"><a class="page-link " href="vacancies.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
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
              <a class="page-link" href="vacancies.php?<?php echo $string ?>&page=<?php echo $j+1 ?>&end=<?php echo $j+1 ?>">Next</a>
              <?php
            }
            ?>
    </li>
<?php
}
?>

  </ul>
</nav>


<!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->

      </div><!--right container-->




    </div><!-- right lane-->





    <div class="col-md-3">
      
         <?php include "./includes/viewAds.php" ?>
    </div>
  
</div><!--main row-->
</div><!-- main container fluid-->



<?php
include "includes/footer.php";
?>
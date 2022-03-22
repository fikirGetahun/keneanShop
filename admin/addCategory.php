<?php 
    include "../includes/adminSide.php";

require_once "../php/adminCrude.php";
require_once "../php/auth.php";
if(isset($_POST['adCatw'])){
    // echo 'innnn';
    $cat = $_POST['adCatw'];
    $out = allCategoryAdder($cat, 'ad');
        if($out){
        echo 'yes';
    }else{
        echo 'no';
    }
}








?>
<head>
    <!-- <script src="../assets/jquery.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            // $('form').on('submit', function(e){
            //     // alert('in')
            //     e.preventDefault()
                
            //     $.ajax({
            //         url: 'addCategory.php',
            //         type: 'post',
            //         data: $('form').serialize(),
            //         success: function(data){
            //             alert('Category Added!')
            //             alert(data)
                        
            //         }
            //     })
 
            // })



        })
        function edit(id){
            $('#editAd'+id).load("adCatEdit.php",{id: id, type: "ad"})
        }

        function editCar(id){
            $('#editAd'+id).load("adCatEdit.php",{id: id, type: "car"})
        }

        function editVacancy(id){
            $('#editAd'+id).load("adCatEdit.php",{id: id, type: "vacancy"})
        }
        
        function editHouse(id){
            $('#editAd'+id).load("adCatEdit.php",{id: id, type: "house"})
        }

        function editElec(id){
            $('#editAd'+id).load("adCatEdit.php",{id: id, type: "elec"})
        }

        function update(){
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
        }

        function updateHouse(){
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
    }

        function adDelete(id){
                $('#delete').load('adCatEdit.php', {id: id, type : 'adDelete'})
                $("#xx").load("divTags.php #cBox"); 
                $("#xx").load("divTags.php #cBox"); 
                $("#xx").load("divTags.php #cBox"); 
                $("#xx").load("divTags.php #cBox"); 
                $("#xx").load("divTags.php #cBox"); 
                $("#xx").load("divTags.php #cBox"); 
            }


            function elecDelete(id){
                $('#delete').load('adCatEdit.php', {id: id, type : 'elecDel'})
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
            }

            function carDelete(id){
                $('#delete').load('adCatEdit.php', {id: id, type : 'carDelete'})
                $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
            }

            function vacDelete(id){
                $('#delete').load('adCatEdit.php', {id: id, type : 'vacancyDelete'})
                $('#xx3').load('divTags.php #vacancyCat');
        $('#xx3').load('divTags.php #vacancyCat');
        $('#xx3').load('divTags.php #vacancyCat');
        $('#xx3').load('divTags.php #vacancyCat');
            }

            function houseDelete(id){
                $('#delete').load('adCatEdit.php', {id: id, type : 'houseDelete'})
                $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
        $('#xxh').load('divTags.php #houseCat')
            }

            function updateElc(){
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
            }





    </script>
</head>
<body>
    <div id="delete"></div>
    <div id="postBox">

<main id="main" class="main">
    
<?php
    if(isset($_POST['carC'])){
        $cat = $_POST['carC'];
        $out = allCategoryAdder($cat, 'car');}
        if($out){
            echo '<span class="text-success"> Category Added! </span>';
        }else{
            echo $out;
        }
    
    if(isset($_POST['vacancyC'])){
        $cat = $_POST['vacancyC'];
        $out = allCategoryAdder($cat, 'vacancy');
        if($out){
            echo '<span class="text-success"> Category Added! </span>';
        }else{
            echo $out;
        }
    }
    
    if(isset($_POST['houseC'])){
        $cat = $_POST['houseC'];
        $out = allCategoryAdder($cat, 'housesell');
        if($out){
            echo '<span class="text-success"> Category Added! </span>';
        }else{
            echo $out;
        }
    }
    
    if(isset($_POST['elc'])){
        $cat = $_POST['elc'];
        $out = allCategoryAdder($cat, 'electronics');
        if($out){
            echo '<span class="text-success"> Category Added! </span>';
        }else{
            echo $out;
        }
    }
    
    
    ?>
 
 <?php

if(isset($_GET['typeD'] , $_GET['did']) && $_GET['typeD']   == 'vacancyDelete'){
    $delVac = postDeleterCat('adcategory', $_GET['did']);
}elseif(isset($_GET['typeD'] , $_GET['did']) && $_GET['typeD']  == 'adDelete'){
    $delVac = postDeleterCat('adcategory', $_GET['did']);
}elseif(isset($_GET['typeD'] , $_GET['did']) && $_GET['typeD']  == 'carDelete'){
    $delVac = postDeleterCat('adcategory', $_GET['did']);
}elseif(isset($_GET['typeD'] , $_GET['did']) && $_GET['typeD']  == 'houseDelete'){
    $delVac = postDeleterCat('adcategory', $_GET['did']);
}elseif(isset($_GET['typeD'] , $_GET['did']) && $_GET['typeD'] == 'elecDel'){
    $delVac = postDeleterCat('adcategory', $_GET['did']);  
}



if(isset($_GET['type'])){
    if($_GET['type'] == 'ad'){
        ?>
        
        <h3>Current Ads Category</h3>

<div id="xx">


<table class="table" id="cBox">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>

  <tbody>



      <?php
      $out = allCategoryLister('ad');
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>
            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
<a  href="adCatEdit.php?id=<?php echo $row['id'] ?>&type=ad"  class="btn btn-dark">Edit</a>                      <a href="addCategory.php?type=ad&typeD=adDelete&did=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete</a>
                    <?php
                }
            ?>

            </td>

            </tr>
              <?php            
          }
      
      
      ?>


  </tbody>
</table>
</div>
<form  action="addCategory.php?&type=ad" method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="adCatw" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="update()" value="Add Category">
</form>

        <?php
    }elseif($_GET['type'] == 'car'){
        ?>
        <h3>Current Cars Category</h3>
<div id="xx2">


<table class="table" id="cBox">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
  <script>


        </script>
      <?php
      $out = allCategoryLister('car');
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>
            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
<a  href="adCatEdit.php?id=<?php echo $row['id'] ?>&type=car"  class="btn btn-dark">Edit</a>      
        <a href="addCategory.php?type=car&typeD=carDelete&did=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete</a>
                    <?php
                }
            ?>

            </td>

            </tr>
              <?php            
          }
      
      
      ?>


  </tbody>
</table>
</div>

<script>
 
    function updateCar(){
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
    }

</script>

<form action="addCategory.php?&type=car"  method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="carC" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateCar()" value="Add Category">
</form>
        
        <?php
    }elseif($_GET['type'] == 'vacancy'){
        ?>
        <h3>Current Vacancy Category</h3>
<div id="xx3">


<table class="table" id="cBox">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
  <script>


        </script>
      <?php
      $out = allCategoryLister('vacancy');
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>

            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
     <a  href="adCatEdit.php?id=<?php echo $row['id'] ?>&type=vacancy"  class="btn btn-dark">Edit</a>      
     <a href="addCategory.php?type=vacancy&typeD=vacancyDelete&did=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete</a>
                    <?php
                }
            ?>


            </td>

            </tr>
              <?php            
          }
      
      
      ?>


  </tbody>
</table>
</div>

<script>
    $(document).ready(function(){

    })
    function updateVacancy(){
        $('#xx3').load('divTags.php #vacancyCat');
        $('#xx3').load('divTags.php #vacancyCat');
        $('#xx3').load('divTags.php #vacancyCat');
        $('#xx3').load('divTags.php #vacancyCat');
    }

</script>

<form action="addCategory.php?&type=vacancy" method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="vacancyC" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateVacancy()" value="Add Category">
</form>
        <?php
    }elseif($_GET['type'] == 'house'){
        ?>
                <h3>Current house Category</h3>

<div id="xxh">


<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>

  <tbody>



      <?php
      $out = allCategoryLister('housesell');
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>

            <?php
                if($row['category'] != 'OTHER' ){
                    ?> 
             <a  href="adCatEdit.php?id=<?php echo $row['id'] ?>&type=house"  class="btn btn-dark">Edit</a> 
             <a href="addCategory.php?type=house&typeD=houseDelete&did=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete</a>
                    <?php
                }
            ?>


            </td>

            </tr>
              <?php            
          }
      
      
      ?>
<script>


</script>

  </tbody>
</table>
</div>
<form id="adzC" action="addCategory.php?&type=house" method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="houseC" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateHouse()" value="Add Category">
</form>

        <?php
    }elseif($_GET['type'] == 'electronics'){
        ?>
        
        
        <h3>Current Electronics Category</h3>

<div id="xxh2">


<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>

  <tbody>



      <?php
      $out = allCategoryLister('electronics');
    //   $i = 0;
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>

            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>

            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
     <a  href="adCatEdit.php?id=<?php echo $row['id'] ?>&type=elec"  class="btn btn-dark">Edit</a>  
     <a href="addCategory.php?type=electronics&typeD=electronicsDelete&did=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete</a>
                    <?php
                }
            ?>


            </td>

            </tr>
              <?php   
            //   $i++;         
          }
      
      
      ?>


  </tbody>
</table>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->




<form id="adzxcC" action="addCategory.php?&type=electronics" method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="elc" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateElc()" value="Add Category">
</form>

        
        <?php
    }
}
include "../includes/adminFooter.php";

?>

</main>
    </div>

</body>

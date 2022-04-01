<?php
include "../includes/adminSide.php";
?>
<main id="main" class="main">
<div id="editAd">
    <?php
    require_once "../php/adminCrude.php";
    require_once "../php/auth.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

     
    // ad category editor
    if(isset($_POST['edCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['edCat'];
        echo $cat;
        $out3 = allCategoryUpdater($cat, 'ad', $id2);
        if($out3){
            echo 'Category Edited!';
        }else{
            echo $out;
        }
    }

    //car category editoer
    if(isset($_POST['carCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['carCat'];
        echo $cat;
        $out3 = allCategoryUpdater($cat, 'car', $id2);
        if($out3){
            echo 'Category Edited!';
        }else{
            echo $out;
        }
    }

    //vacancy category editor
    if(isset($_POST['vacancyCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['vacancyCat'];
        echo $cat;
        $out3 = allCategoryUpdater($cat, 'vacancy', $id2);  
        if($out3){
            echo 'Category Edited!';
        }else{
            echo $out;
        }  }

    //house category editor
    if(isset($_POST['houseCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['houseCat'];
        echo $cat;
        $out3 = allCategoryUpdater($cat, 'housesell', $id2);  
        if($out3){
            echo 'Category Edited!';
        }else{
            echo $out;
        }  }

        //house category editor
        if(isset($_POST['elecCat'], $_POST['id'])){
            echo 'ind';
            $id2 = $_POST['id'];
            $cat = $_POST['elecCat'];
            echo $cat;
            $out3 = allCategoryUpdater($cat, 'electronics', $id2);  
            if($out3){
                echo 'Category Edited!';
            }else{
                echo $out;
            }     
         }

         if(isset($_POST['big'], $_POST['id'])){
            echo 'ind';
            $id2 = $_POST['id'];
            $cat = $_POST['big'];
            echo $cat;
            $out3 = allCategoryUpdater($cat, 'ad', $id2);  
            if($out3){
                echo 'Category Edited!';
            }else{
                echo $out;
            }     
         }

         

    ?>     
<head>
<script src="assets/jquery.js"></script>

<script>
    $(document).ready(function(){
        // $('form').on('submit', function(e){
        //     // alert('innn')
        //     e.preventDefault()
        //     $.ajax({
        //         url: 'adCatEdit.php',
        //         type: 'post',
        //         data: $('form').serialize(),
        //         success: function(){

        //         }
        //     })
        //     })

    })

</script> 
</head>
<?php
if(isset($_GET['type'])){
    if($_GET['type'] == 'ad'){
        ?>
        <td>

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="edCat" placeholder="Job"> 
          <button type="submit" onclick="update()"  class="btn btn-dark">Edit</button>
</form></td>
        <?php
    }elseif($_GET['type'] == 'car'){
        ?>
        <td>
<script src="../assets/jquery.js"></script>

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="carCat" placeholder="Job"> 
          <button type="submit" onclick="updateCar()"  class="btn btn-dark">Edit</button>
</form></td>
        <?php
    }elseif($_GET['type'] == 'vacancy' ){
        ?>
        <script src="../assets/jquery.js"></script>

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="vacancyCat" placeholder="Job"> 
          <button type="submit" onclick="updateVacancy()"  class="btn btn-dark">Edit</button>
</form></td>
        <?php
    }elseif($_GET['type'] == 'house'){
        ?>
        <script src="../assets/jquery.js"></script>
        
        <form id="adCatEdit.php?type=house" method="POST">
        <input hidden name="id" value="<?php echo $id ?>">
        <input type="text" class="form-control" id="adCategory" 
                  aria-describedby="emailHelp" name="houseCat" placeholder="Job"> 
                  <button type="submit"   class="btn btn-dark">Edit</button>
        </form></td>        
        <?php
    }elseif($_GET['type'] == 'elec'){
        ?>
        <!-- <script src="assets/jquery.js"></script> -->
        <script>
            function updateElc(){
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
            }

        </script>
        <form id="editAd2" method="POST">
        <input hidden name="id" value="<?php echo $id ?>">
        <input type="text" class="form-control" id="adCategory" 
                  aria-describedby="emailHelp" name="elecCat" placeholder="Job"> 
                  <button type="submit" onclick="updateElc()"  class="btn btn-dark">Edit</button>
        </form></td>        
        <?php
    }elseif($_GET['type'] == 'big'){
        ?>
        <!-- <script src="assets/jquery.js"></script> -->
        <script>
            function updateElc(){
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
                $('#xxh2').load('divTags.php #elecCat')
            }

        </script>
        <form id="editAd2" method="POST">
        <input hidden name="id" value="<?php echo $id ?>">
        <input type="text" class="form-control" id="adCategory" 
                  aria-describedby="emailHelp" name="big" placeholder="Job"> 
                  <button type="submit" onclick="updateElc()"  class="btn btn-dark">Edit</button>
        </form></td>        
        <?php
    }elseif($_POST['type'] == 'vacancyDelete'){
        $delVac = postDeleterCat('adCategory', $id);
    }elseif($_POST['type'] == 'adDelete'){
        $delVac = postDeleterCat('adCategory', $id);
    }elseif($_POST['type'] == 'carDelete'){
        $delVac = postDeleterCat('adCategory', $id);
    }elseif($_POST['type'] == 'houseDelete'){
        $delVac = postDeleterCat('adCategory', $id);
    }elseif($_POST['type'] == 'elecDel'){
        $delVac = postDeleterCat('adCategory', $id);
    }elseif($_POST['type'] == 'bigcDel'){
        $delVac = postDeleterCat('adCategory', $id);
    }

}
?>


</div>
</main>
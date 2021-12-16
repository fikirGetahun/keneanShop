<div id="editAd">
    <?php
    require_once "../php/adminCrude.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    // ad category editor
    if(isset($_POST['edCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['edCat'];
        echo $cat;
        $out3 = $admin->updateAdCat($cat, $id2);
    }

    //car category editoer
    if(isset($_POST['carCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['carCat'];
        echo $cat;
        $out3 = $admin->carCategoryEdit($id2, $cat);
    }

    //vacancy category editor
    if(isset($_POST['vacancyCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['vacancyCat'];
        echo $cat;
        $out3 = $admin->vacancyCategoryEdit($id2, $cat);
    }

    //house category editor
    if(isset($_POST['houseCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['houseCat'];
        echo $cat;
        $out3 = $admin->houseCategoryEdit($id2, $cat);
    }

    ?>
<head>
<script>
    $(document).ready(function(){
        $('form').on('submit', function(e){
            // alert('innn')
            e.preventDefault()
            $.ajax({
                url: 'adCatEdit.php',
                type: 'post',
                data: $('form').serialize(),
                success: function(){

                }
            })
            })

    })

</script> 
</head>
<?php
if(isset($_POST['type'])){
    if($_POST['type'] == 'ad'){
        ?>
        <td>
<!-- <script src="../assets/jquery.js"></script> -->

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="edCat" placeholder="Job"> 
          <button type="submit" onclick="update()"  class="btn btn-dark">Edit</button>
</form></td>
        <?php
    }elseif($_POST['type'] == 'car'){
        ?>
        <td>
<!-- <script src="../assets/jquery.js"></script> -->

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="carCat" placeholder="Job"> 
          <button type="submit" onclick="updateCar()"  class="btn btn-dark">Edit</button>
</form></td>
        <?php
    }elseif($_POST['type'] == 'vacancy' ){
        ?>
        <!-- <script src="../assets/jquery.js"></script> -->

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="vacancyCat" placeholder="Job"> 
          <button type="submit" onclick="updateVacancy()"  class="btn btn-dark">Edit</button>
</form></td>
        <?php
    }elseif($_POST['type'] == 'house'){
        ?>
        <!-- <script src="../assets/jquery.js"></script> -->
        
        <form id="editAd2" method="POST">
        <input hidden name="id" value="<?php echo $id ?>">
        <input type="text" class="form-control" id="adCategory" 
                  aria-describedby="emailHelp" name="houseCat" placeholder="Job"> 
                  <button type="submit" onclick="updateHouse()"  class="btn btn-dark">Edit</button>
        </form></td>        
        <?php
    }elseif($_POST['type'] == 'vacancyDelete'){
        $delVac = $admin->vacancyCategoryDelete($id);
    }elseif($_POST['type'] == 'adDelete'){
        $delVac = $admin->adCategoryDelete($id);
    }elseif($_POST['type'] == 'carDelete'){
        $delVac = $admin->carCategoryDelete($id);
    }elseif($_POST['type'] == 'houseDelete'){
        $delVac = $admin->houseCategoryDelete($id);
    }

}
?>


</div>
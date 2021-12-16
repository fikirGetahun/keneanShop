<?php 

require_once "../php/adminCrude.php";

if(isset($_POST['adCat'])){
    $cat = $_POST['adCat'];
    $out = $admin->adsCategoryAdder($cat);
}

if(isset($_POST['carC'])){
    $cat = $_POST['carC'];
    $out = $admin->carCategoryAdder($cat);
}

if(isset($_POST['vacancyC'])){
    $cat = $_POST['vacancyC'];
    $out = $admin->vacancyCategoryAdder($cat);
}

if(isset($_POST['houseC'])){
    $cat = $_POST['houseC'];
    $out = $admin->houseCategoryAdder($cat);
}



?>
<head>
    <script src="../assets/jquery.js"></script>
    <script>
        $(document).ready(function(){

            $('form').on('submit', function(e){
                e.preventDefault()
                
                $.ajax({
                    url: 'addCategory.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(){
                        $('#adCat').val() = "";
                        
                    }
                })
 
            })



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


    </script>
</head>
<body>
    <div id="delete"></div>
<?php
if(isset($_POST['type'])){
    if($_POST['type'] == 'ad'){
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
      $out = $admin->adsCategoryLister();
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>
            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
                    <button onclick="edit(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
                    <button onclick="adDelete(<?php echo $row['id'] ?>)" class="btn btn-dark">Delete</button>
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
<form id="adC" method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="adCat" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="update()" value="Add Category">
</form>

        <?php
    }elseif($_POST['type'] == 'car'){
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
      $out = $admin->carCategoryLister();
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>
            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
             <button onclick="editCar(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button onclick="carDelete(<?php echo $row['id'] ?>)" class="btn btn-dark">Delete</button>
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
    function updateCar(){
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
        $('#xx2').load('divTags.php #carCat');
    }

</script>

<form  method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="carC" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateCar()" value="Add Category">
</form>
        
        <?php
    }elseif($_POST['type'] == 'vacancy'){
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
      $out = $admin->vacancyCategoryLister();
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>

            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
             <button onclick="editVacancy(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button onclick="vacDelete(<?php echo $row['id'] ?>)" class="btn btn-dark">Delete</button>
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

<form  method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="vacancyC" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateVacancy()" value="Add Category">
</form>
        <?php
    }if($_POST['type'] == 'house'){
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
      $out = $admin->houseCategoryLister();
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>

            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
             <button onclick="editHouse(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button onclick="houseDelete(<?php echo $row['id'] ?>)" class="btn btn-dark">Delete</button>
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
<form id="adC" method="POST">
<div id="registerBox">
    <label for="exampleInputEmail1">Add Category</label>
    <input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="houseC" placeholder="Job">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
</div><br>
<input class="btn btn-light" type="submit" onclick="updateHouse()" value="Add Category">
</form>

        <?php
    }
}

?>


</body>

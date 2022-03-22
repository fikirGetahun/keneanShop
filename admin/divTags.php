<?php
include "../includes/lang.php";

?>

<div id="otherCity" >
            <div class="form-group">
              <label for="exampleInputEmail1">Other City</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="otherCity" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>


<div id="otherAd" >
            <div class="form-group">
              <label for="exampleInputEmail1">Other Type</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="type" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>


<div id="otherSubCity" >
            <div class="form-group">
              <label for="exampleInputEmail1">Other SubCity</Title></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="subCity" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>

<div id="typeCar" >
            <div class="form-group">
              <label for="exampleInputEmail1">Other</Title></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="type2" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>

<div id="jobType" >
            <div class="form-group">
              <label for="exampleInputEmail1">Other</Title></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="jobType" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>

<div id="houseTypeOther" >
            <div class="form-group">
              <label for="exampleInputEmail1">Other</Title></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="type" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>

<div id="changeProfile">
<label for="exampleInputEmail1">Upload Profile Photo</label>
          <input type="file" class="form-control" id="photo" 
           name="photoq" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
</div>

<div id="adP1">
    <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="photo1" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div id="adP2">
    <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="photo2" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div id="adP3">
    <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="photo3" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div id="houseType" class="input-group mb-3">
  
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Type : </label>
        </div>
        <select class="custom-select" name="type" id="selHouseType">
          <option selected>Choose...</option>
<?php
    require_once "../php/adminCrude.php";
    $house = houseCategoryLister();
    while($houseRow = $house->fetch_assoc()){
      ?>
      <option value="<?php echo $houseRow['category'] ?>"><?php echo $houseRow['category'] ?></option>
      <?php
    }

?>
        </select>
</div>


<div id="bedBath">
<div class="form-group">
              <label for="exampleInputEmail1">Number Of BedRoom :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bedRoomNo" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Bath Of BedRoom :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bathRoomNo" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>


<div id="carCat">


<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
      <?php
      require_once "../php/adminCrude.php";
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


<div id="cBox">
<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>

  <tbody>
      <?php
      require_once "../php/adminCrude.php";
      $out2 = allCategoryLister('ad');

      while($row = $out2->fetch_assoc()){

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


<div id="targetFor" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"><?php echo $lang['for'] ?> : </label>
        </div>
        <select class="custom-select" name="for" id="inputGroupSelect01">
          <option value=" "><?php echo $lang['Gender'] ?></option>
          <option value="Male"><?php echo $lang['Male'] ?></option>
          <option value="Female"><?php echo $lang['Female'] ?></option>
          <option value="Both"><?php echo $lang['Both'] ?></option>
        </select>
</div>


<div id="carCform1">
          <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="x1" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div id="carCform2">
          <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="x2" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="carCform3">
          <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="x3" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>


    <div id="hform1">
    <label for="exampleInputEmail1">Upload Profile Photo 1</label>
          <input type="file" class="form-control" id="photo" 
           name="xy1" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="hform2">
    <label for="exampleInputEmail1">Upload Profile Photo 2</label>
          <input type="file" class="form-control" id="photo" 
           name="xy2" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="hform3">
    <label for="exampleInputEmail1">Upload Profile Photo 3</label>
          <input type="file" class="form-control" id="photo" 
           name="xy3" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="vacancyCat">
    <table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
      <?php
      require_once "../php/adminCrude.php";
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

    <div id="houseCat">
    <table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>

  <tbody>



      <?php
      require_once "../php/adminCrude.php";
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
             <button onclick="editHouse(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button onclick="houseDelete(<?php echo $row['id'] ?>)" class="btn btn-dark">Delete</button>
                    <?php
                }
            ?>

            </tr>
              <?php            
          }
      
      
      ?>


  </tbody>
</table>
    </div>


      <div id="sizeInch" class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="size" placeholder="<?php echo $lang['sizeInInch'] ?>">
         </div>

              <div id="ram" class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="ram" placeholder="<?php echo $lang['RAM'] ?>">
         </div>

        <div id="proc" class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="processor" placeholder="<?php echo $lang['processorType'] ?>">
         </div>

        <div id="storage" class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="storage" placeholder="<?php echo $lang['storageSize'] ?>">
         </div>

        <div id="core" class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="core" placeholder="<?php echo $lang['coreCount'] ?>">
        </div>


        <div id="elecp1">
<label for="exampleInputEmail1">Upload Photo 1</label>
      <input type="file" class="form-control" id="photo" 
       name="elc1" >
      <small id="emailHelp" class="form-text text-muted"><?php echo $lang['coreCount'] ?></small>
</div>

<div id="elecp2">
<label for="exampleInputEmail1">Upload Photo 2</label>
      <input type="file" class="form-control" id="photo" 
       name="elc2" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div id="elecp3">
<label for="exampleInputEmail1">Upload Photo 3</label>
      <input type="file" class="form-control" id="photo" 
       name="elc3" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div id="elecCat">


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
      while($row = $out->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>

            <?php
                if($row['category'] != 'OTHER' ){
                    ?>
             <button onclick="editElec(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button onclick="elecDelete(<?php echo $row['id'] ?>)" class="btn btn-dark">Delete</button>
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
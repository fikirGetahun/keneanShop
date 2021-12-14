<?php 

require_once "../php/adminCrude.php";

if(isset($_POST['adCat'])){
    $cat = $_POST['adCat'];
    $out = $admin->adsCategoryAdder($cat);
}

if(isset($_POST['edCat'])){

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
            $('#editAd'+id).load("adCatEdit.php",{id: id})
        }
        function update(){
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
            $("#xx").load("divTags.php #cBox"); 
        }

    </script>
</head>
<body>
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
             <button onclick="edit(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button class="btn btn-dark">Delete</button>
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
</body>

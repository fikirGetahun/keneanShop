<div id="editAd">
    <?php
    require_once "../php/adminCrude.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['edCat'], $_POST['id'])){
        echo 'ind';
        $id2 = $_POST['id'];
        $cat = $_POST['edCat'];
        echo $cat;
        $out3 = $admin->updateAdCat($cat, $id2);
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
<td>
<!-- <script src="../assets/jquery.js"></script> -->

<form id="editAd2" method="POST">
<input hidden name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" id="adCategory" 
          aria-describedby="emailHelp" name="edCat" placeholder="Job"> 
          <button type="submit" onclick="update()"  class="btn btn-dark">Edit</button>
</form></td>
</div>
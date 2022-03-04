<?php

require_once "../php/adminCrude.php";
require_once "../php/auth.php";
require_once "../php/fetchApi.php";
include "../includes/header.php";
/////////////real estate posting api
if(isset($_POST['posterId'], $_POST['title'], $_POST['company'], $_POST['phone'], $_POST['email'], $_POST['price'], $_POST['fixidOrN'], $_POST['info'], $_FILES['photo'], $_POST['selectKey'],$_POST['city'])){

global $selectKey, $posterId, $title, $company, $phonem, $email, $price, $fixidOrN, $info, $fileVar, $city, $subCity, $wereda, $floor, $area, $rsType, $forRentOrSell,$up ;

    $selectKey = $_POST['selectKey'];
    $posterId = $_POST['posterId'];
    $title = $_POST['title'];
   $company = $_POST['company'];
   $phonem = $_POST['phone'];
  $email = $_POST['email'];
  $price = $_POST['price'];
  $fixidOrN = $_POST['fixidOrN'];
  $info = $_POST['info'];
  $fileVar = $_FILES['photo'];
  $city = $_POST['city'];
  
//   echo 'sssss'.$selectKey;
  
    if(isset($_POST['forRentOrSell'], $_POST['wereda'], $_POST['floor'] , $_POST['area'])){
      echo 'realz';
      $forRentOrSell = $_POST['forRentOrSell'];
      $rsType= $_POST['rsType'];
     
  
      //so that there are cities which doesnot have subcity
      if(isset($_POST['subCity'])){
        $subCity = $_POST['subCity'];
      }
     
      $wereda = $_POST['wereda'];
      $floor = $_POST['floor'];
      $area = $_POST['area'];
    }else{
      echo 'else rel';
        // null data entery if real estate is not selected
    $forRentOrSell = " ";
    $rsType = " ";
  
    $subCity = " ";
    $wereda = 0;
    $floor = 0;
    $area = 0;
    }
  
  
    
    $up = uploadPhotos('realestate', $fileVar);
    if($up[4] == 'error'){
      foreach($up as $val){
        echo $val;
      }
    }
    elseif($up[4] == 'work'){
    //   $enter = realEstate($posterId,$rsType, $title, $company, $phonem, $city, $wereda, $floor, $forRentOrSell, $subCity, $area  , $email, $price, $fixidOrN, $info, $up[0], $selectKey);
    //   if($enter){
    //     echo 'Posted Successfully.';
    //   }else{
    //     echo 'Error';
    //   }
    }


  
  }

  if(isset($_GET['sub'])){
      echo $selectKey;
      ?>
<!--       
      /// if they are submiting for the first time... the form will send request to this page and holds the submited data. then the payment page will appear. if the user pays all the needed info will be submitted to the database but if the user chooses the post data and pay latter button, it only uploads the post data -->
      <script src="../assets/jquery.js"></script>
<script>


    function payed(){
        // e.preventDefault()
        alert('in')
        $.ajax({
            url: 'userApi.php',
            type: 'post',
            data:  $('form').serialize(),
            success: function(data){
                alert(data)
                alert(data+"YOu can find your post in the pending section.")
                location = "../Account.php?yourPost=true" 
            },
            
    
        })
        return false;
    }
</script>


<body>
<div class="container">
    <script>
        function pkgHandler(pkg){
            
        }
    </script>
    <div class="card m-4">
    <div class="row">
        <div  class="col-4" >
        <h5>Available Pakages!</h5>
        <?php
        $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'pkg' );
        while($row = $fpkg->fetch_assoc()){
            $jjf = explode(',', $row['subcityKey']);

            ?>
    <h4><?php echo $row['category'].' Pakage' ?></h4>
<p><?php echo $jjf[0] ?></p>
        <h5 id="amount" class="text-success">Amount: <?php echo $jjf[1] ?> birr </h5> 
            <?php
        }
        ?>
        
       
        </div>
        
    </div>
    <hr>


    <!-- /// if the user desided to pay and post, then all the user inputed data will not be lost thats why we put it inthe paying form with the previous inputed data  -->
    <form onsubmit="return false" method="POST" enctype="multipart/form-data">
        <input hidden type="text" name="posterId"  value="<?php echo $posterId ?>">
        <input hidden type="text" name="selectKey"  value="<?php echo $selectKey ?>">
        <input hidden type="text" name="title"  value="<?php echo $title ?>">
        <input hidden type="text" name="company"  value="<?php echo $company ?>">
        <input hidden type="text" name="phone"  value="<?php echo $phonem ?>">
        <input hidden type="text" name="email"  value="<?php echo $email ?>">
        <input hidden type="text" name="price"  value="<?php echo $price ?>">
        <input hidden type="text" name="fixidOrN"  value="<?php echo $fixidOrN ?>">
        <input hidden type="text" name="info"  value="<?php echo $info ?>">
        <input hidden type="text" name="fileVar"  value="<?php echo $up[0]?>">
        <input hidden type="text" name="city"  value="<?php echo $city ?>">
        <input hidden type="text" name="forRentOrSell"  value="<?php echo $forRentOrSell ?>">
        <input hidden type="text" name="rsType"  value="<?php echo $rsType ?>">
        <input hidden type="text" name="subCity"  value="<?php echo $subCity ?>">
        <input hidden type="text" name="wereda"  value="<?php echo $wereda ?>">
        <input hidden type="text" name="floor"  value="<?php echo $floor ?>">

    <label for="exampleFormControlFile1">Select Packages</label>
        <select  class="form-select" onchange ='pkgHandler(this.value)'  aria-label="Default select example" name="pkg" id="forWho">
            <?php
                $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'pkg' );
                
                while($row = $fpkg->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['category'] ?>" ><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>
        <br>

        <script>
            $(document).ready(function(){
                $('#pend').click(function(){
                    alert('<?php echo $selectKey?>')
                    $.ajax({
            url: 'userApi.php',
            type: 'post',
            data: {
    selectKey : '<?php echo $selectKey?>',
    posterId : '<?php echo $posterId?>',
    title : '<?php echo $title?>',
   company : '<?php echo $company?>',
   phonem : '<?php echo $phonem?>',
  email : '<?php echo $email?>',
  price : '<?php echo $price?>',
  fixidOrN : '<?php echo $fixidOrN?>',
  info : '<?php echo $info?>',
  fileVarx : '<?php echo $up[0]?>',
  city : '<?php echo $city?>',
  forRentOrSell : '<?php echo $forRentOrSell?>',
    rsType: '<?php echo $rsType?>',
  
    subCity: '<?php echo $subCity?>',
    wereda : '<?php echo $wereda?>',
    floor : '<?php echo $floor?>',
    area : '<?php echo $area?>',
            },
            success: function(data){
                alert(data)
                alert(data+"YOu can find your post in the pending section.")
                location = "../Account.php?yourPost=true"
            }
        })
                })
            })




            function bnk(sbnk){
                $.ajax({
                    url: 'userApi.php',
                    type: 'post',
                    data: {
                        bank: sbnk
                    },
                    success: function(data){
                        $('#showw').load(data)
                    }
                })
            }



        </script>

        <h5>Pay For Sponcership!</h5>
        <div class="row">

        <div class="col-5">
        <label for="exampleFormControlFile1">Choose Banks</label>
        <select  class="form-select" onchange ='bnk(this.value)'  aria-label="Default select example" name="bankName" id="forWho">
                <option>No Bank Selected</option>
            <?php
                $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'bank' );

                while($row = $fpkg->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['category'] ?>" ><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>

               <div id="showw">

               </div>
                
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Enter Transaction Id:</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="tid" placeholder="be caryfull dont make a mistake">
                    
            </div>
            <button class="btn btn-success" onclick="payed()" type="submit" >Submit Payment! and Post</button>
        </div>
    </form>

    <button id="pend"  class="btn btn-primary"  >Place Post in Pending and pay Letter</button>
    <?php

    
    ?>

    </div>
</div>
</body>
      
      <?php
  }


/// this is if the user pays from pending page
if(isset($_GET['pendding'])){
    if(isset($_GET['id'])){
        $pidd = $_GET['id'];
    }
  
    ?>
    <body>
<div class="container">
    <script>
        function pkgHandler(pkg){
            
        }
    </script>
    <div class="card m-4">
    <div class="row">
        <div  class="col-4" >
        <h5>Available Pakages!</h5>
        <?php
        $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'pkg' );
        while($row = $fpkg->fetch_assoc()){
            $jjf = explode(',', $row['subcityKey']);

            ?>
    <h4><?php echo $row['category'].' Pakage' ?></h4>
<p><?php echo $jjf[0] ?></p>
        <h5 id="amount" class="text-success">Amount: <?php echo $jjf[1] ?> birr </h5> 
            <?php
        }
        ?>
        
       
        </div>
        
    </div>
    <hr>
    <form action="paymentPage.php?pendding=true" method="POST">
        <input hidden type="text" name="pid" value="<?php echo $pidd ?>">
    <label for="exampleFormControlFile1">Select Packages</label>
        <select  class="form-select" onchange ='pkgHandler(this.value)'  aria-label="Default select example" name="pkg" id="forWho">
            <?php
                $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'pkg' );
                
                while($row = $fpkg->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['category'] ?>" ><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>
        <br>

        <script>
            function bnk(sbnk){
                $.ajax({
                    url: 'userApi.php',
                    type: 'post',
                    data: {
                        bank: sbnk
                    },
                    success: function(data){
                        $('#showw').load(data)
                    }
                })
            }



        </script>

        <h5>Pay For Sponcership!</h5>
        <div class="row">

        <div class="col-5">
        <label for="exampleFormControlFile1">Choose Banks</label>
        <select  class="form-select" onchange ='bnk(this.value)'  aria-label="Default select example" name="bankName" id="forWho">
                <option>No Bank Selected</option>
            <?php
                $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'bank' );

                while($row = $fpkg->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['category'] ?>" ><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>

               <div id="showw">

               </div>
                
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Enter Transaction Id:</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="tid" placeholder="be caryfull dont make a mistake">
                    
            </div>
            <button class="btn btn-success" type="submit" >Submit Payment!</button>
        </div>
    </form>

    <?php

    
    ?>

    </div>
</div>
</body>
    
    <?php
}
//// sponsered payment handler api
if(isset($_POST['pkg'], $_POST['bankName'], $_POST['tid'], $_POST['pid'])){

    $pid = $_POST['pid'];
    $pkg = $_POST['pkg'];
    $bname = $_POST['bankName'];
    $tid = $_POST['tid'];
  
    $send = sponseredPay($pkg, $bname, $tid, $pid);
    if($send){
      echo 'Payment done';
    }else{
      echo 'error';
    }
  
  }



//// to edit the transaction id and bank after a user payd just in case there is a mistake in thier part
if(isset($_GET['edit'])){
    if(isset($_GET['id'])){
        $pidd = $_GET['id'];
    }


  
    ?>
    <body>
<div class="container">
    <script>
        function pkgHandler(pkg){
            
        }
    </script>
    <div class="card m-4">
        <?php
        //// for editing api
if(isset($_POST['pkgx'], $_POST['bankName'], $_POST['tid'], $_POST['pid'])){

    $pid = $_POST['pid'];
    $pkg = $_POST['pkgx'];
    $bname = $_POST['bankName'];
    $tid = $_POST['tid'];
  
    $send = updateOn3Colomen('realestate', 'pkg', $pkg, 'payBank', $bname, 'transId', $tid, $pid);
    if($send){
      ?>
      <h4 class="text-warning btn btn-sm btn-outline-success" > Transaction Edited! </h4>  <a href="../Account.php?yourPost=true" >Go Back</a>
      <?php
    }else{
      echo 'error';
    }
}
  
        ?>
    <div class="row">
        <div  class="col-4" >
        <h5>Available Pakages!</h5>
        <?php
        $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'pkg' );
        while($row = $fpkg->fetch_assoc()){
            $jjf = explode(',', $row['subcityKey']);

            ?>
            <h4><?php echo $row['category'] ?></h4>
            <h4><?php echo $row['category'].' Pakage' ?></h4>
            <p><?php echo $jjf[0] ?></p>
        <h5 id="amount" class="text-success">Amount: <?php echo $jjf[1] ?> birr </h5> 
            <?php
        }
        ?>
        
       
        </div>
        
    </div>
    <hr>
    <?php
     //to fetch users submited data
     $usd = allPostListerOnColumen('realestate', 'id', $pidd);
     $rusd = $usd->fetch_assoc();
    ?>
    <form action="paymentPage.php?edit=true&id=<?php echo $pidd ?>" method="POST">
        <input hidden type="text" name="pid" value="<?php echo $pidd ?>">
    <label for="exampleFormControlFile1">Select Packages</label>
        <select  class="form-select" onchange ='pkgHandler(this.value)'  aria-label="Default select example" name="pkgx" id="forWho">
            <?php
                $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'pkg' );
                ?>
                <option selected><?php echo $rusd['pkg'] ?></option>
                <?php
                while($row = $fpkg->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['category'] ?>" ><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>
        <br>

        <script>
            function bnk(sbnk){
                $.ajax({
                    url: 'userApi.php',
                    type: 'post',
                    data: {
                        bank: sbnk
                    },
                    success: function(data){
                        $('#showw').load(data)
                    }
                })
            }



        </script>

        <h5>Pay For Sponcership!</h5>
        <div class="row">

        <div class="col-5">
        <label for="exampleFormControlFile1">Choose Banks</label>
        <select  class="form-select" onchange ='bnk(this.value)'  aria-label="Default select example" name="bankName" id="forWho">
                <option selected><?php echo $rusd['payBank'] ?></option>
            <?php
                $fpkg = allPostListerOnColumen('adcategory', 'tableName', 'bank' );

                while($row = $fpkg->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['category'] ?>" ><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>

               <div id="showw">

               </div>
                
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Enter Transaction Id:</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="tid" placeholder="be caryfull dont make a mistake" value="<?php echo $rusd['transId'] ?>" >
                    
            </div>
            <button class="btn btn-success" type="submit" >Submit Payment!</button>
        </div>
    </form>

    <?php

    
    ?>

    </div>
</div>
</body>
    
    <?php
}

  ?>





<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}
require "../php/fetchApi.php";


if(isset($_GET['listType'])){
    $s = $_GET['listType'];
}

if($s == 'user'){
  $oneTablePostList = $get->allPostListerOnColumenD('user', 'auth', 'USER', $_SESSION['allUser'] , 10);
}elseif($s == 'editor'){
  $oneTablePostList = $get->allPostListerOnColumenD('user', 'auth', 'EDITOR', $_SESSION['allUser'] , 10);
}elseif($s == 'admin'){
  $oneTablePostList = $get->allPostListerOnColumenD('user', 'auth', 'ADMIN', $_SESSION['allUser'] , 10);
}
    
    ?>

 
      <?php
      $i = $_SESSION['allUser']+1;
      while($row = $oneTablePostList[0]->fetch_assoc()){  

  
        ?>
      
      
    <tr>
   
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['firstName'].' '.$row['lastName'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['auth'] ?></td>
      <td><a href="./userInfo.php?poster=<?php echo $row['id'] ?>"  class="btn btn-dark"> View User</a></td>
     </tr>
</a>


        <?php
$i++;
      }
    
    

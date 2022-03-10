<?php
require "../php/fetchApi.php";

if(isset($_POST['searchData'])){
    $search = $_POST['searchData'];
}

?>

<table class="table table-bordered">
  <thead>
    <tr>
   
      <th scope="col">Name </th>
      <th scope="col">City</th>
      <th scope="col"> - - -</th>

     </tr>
  </thead>
  <tbody>
      <?php
      $askSearch = searchCMemeber('mambership', $search, 0, 15);
      if($askSearch[1]->num_rows != 0){
          while($row = $askSearch[0]->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><a class="btn btn-outline-dark flex-shrink-0" href="./Account.php?message=true&outter=true&memberId=<?php echo $row['userId'] ?>" >Go to Messages</a></td>
            </tr>
            <?php
          }

      }else{
          echo "<span class='text-danger'>No Match Found!</span>";
      }
      
      ?>

    </tr>
  </tbody>
</table>
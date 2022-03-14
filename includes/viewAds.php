<?php
require_once "php/fetchApi.php";
?>
<div class="container-fluid">
        <?php
        // ad fetcher
        $ad = allPostListerOn2Columen('webAd', 'position', 'Post View', 'status', 'ACTIVE');
        if($ad->num_rows != 0){
        while($row=$ad->fetch_assoc()){
            ?>
            <div class="card bg-none p-1 my-2 ">
                <a href="<?php echo $row['website'] ?>">
                <img class="img-fluid" src="<?php echo $row['photoPath1'] ?>" >
            </a>
            </div>     
            <?php
        }
    }else{
        // ad fetcher
        $ad = allPostListerOnColumen('webAd',  'id', 33);
        if($ad->num_rows != 0){
        while($row=$ad->fetch_assoc()){
            ?>
            <div class="card bg-none p-1 my-2 ">
                <a href="<?php echo $row['website'] ?>">
                <img class="img-fluid" src="<?php echo $row['photoPath1'] ?>" >
            </a>
            </div>     
            <?php
        }
        
    }
}
        ?>

</div>
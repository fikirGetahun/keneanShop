<?php
include "includes/header.php";
include "includes/lang.php";
include "includes/secnav.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";

///page number calculation
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}



$content_per_page = 8;

$startPage = ($page * $content_per_page) - $content_per_page;
// echo $startPage.'z';
$endPage =  $content_per_page;
// echo $endPage;
	?>
<div class="container-fluid">
<div class="row">
 <div class="col-md-8">
  <?php 
    if(isset($_GET['cat'], $_GET['postId'], $_GET['label'], $_GET['type'])){
      $type = $_GET['cat'];
      $pid = $_GET['postId'];
      $label = $_GET['label'];
      $tt = $_GET['type'];
      $fetch = aSinglePostView($pid, $type);    
          
      $row = $fetch->fetch_assoc();
      
      /////////////////vacancy 
if($_GET['cat'] == 'vacancy'){
  // to add aview count to this post
  $viewadd = viewAdder($type, $pid);


  } 

  ?>

      <h3 class="pb-4 mb-4 fst-italic border-bottom">
       <?php echo $row['title'] ?>
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title"> <?php echo $row['title'] ?></h2>
        <h6 class="card-title"> Category: <?php echo $row['type'] ?></p>
                      <p class="blog-post-meta"> Job Title : <?php echo $row['title'] ?></p>
                      <p class="blog-post-meta"> Type : <?php echo $row['positionType'] ?></p>
                      <p class="blog-post-meta"> Gender : <?php echo $row['sex'] ?></p>
                      <p class="blog-post-meta"> Requierd Position : <?php echo $row['positionNum'] ?></p>
                      <p class="blog-post-meta">Salary : <?php echo $row['salary'] ?></p>
                      <p class="blog-post-meta">   <?php echo $row['address'] ?></p>
        <p class="blog-post-meta">Posted on:January 1, 2021 by </p>
        <p class="blog-post-meta">Deadline:January 1, 2021 by</p>

        <!-- <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p> -->
        <hr>
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Job Description
      </h3>
        <p>
        <?php echo $row['info'] ?>
        </p>
        <!-- <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <h2>Blockquotes</h2>
        <p>This is an example blockquote in action:</p>
        <blockquote class="blockquote">
          <p>Quoted text goes here.</p>
        </blockquote>
        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <h3>Example lists</h3>
        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout. This is an example unordered list:</p>
        <ul>
          <li>First list item</li>
          <li>Second list item with a longer description</li>
          <li>Third list item to close it out</li>
        </ul>
        <p>And this is an ordered list:</p>
        <ol>
          <li>First list item</li>
          <li>Second list item with a longer description</li>
          <li>Third list item to close it out</li>
        </ol>
        <p>And this is a definition list:</p>
        <dl>
          <dt>HyperText Markup Language (HTML)</dt>
          <dd>The language used to describe and define the content of a Web page</dd>
          <dt>Cascading Style Sheets (CSS)</dt>
          <dd>Used to describe the appearance of Web content</dd>
          <dt>JavaScript (JS)</dt>
          <dd>The programming language used to build advanced Web sites and applications</dd>
        </dl>
        <h2>Inline HTML elements</h2>
        <p>HTML defines a long list of available inline tags, a complete list of which can be found on the <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element">Mozilla Developer Network</a>.</p>
        <ul>
          <li><strong>To bold text</strong>, use <code class="language-plaintext highlighter-rouge">&lt;strong&gt;</code>.</li>
          <li><em>To italicize text</em>, use <code class="language-plaintext highlighter-rouge">&lt;em&gt;</code>.</li>
          <li>Abbreviations, like <abbr title="HyperText Markup Langage">HTML</abbr> should use <code class="language-plaintext highlighter-rouge">&lt;abbr&gt;</code>, with an optional <code class="language-plaintext highlighter-rouge">title</code> attribute for the full phrase.</li>
          <li>Citations, like <cite>— Mark Otto</cite>, should use <code class="language-plaintext highlighter-rouge">&lt;cite&gt;</code>.</li>
          <li><del>Deleted</del> text should use <code class="language-plaintext highlighter-rouge">&lt;del&gt;</code> and <ins>inserted</ins> text should use <code class="language-plaintext highlighter-rouge">&lt;ins&gt;</code>.</li>
          <li>Superscript <sup>text</sup> uses <code class="language-plaintext highlighter-rouge">&lt;sup&gt;</code> and subscript <sub>text</sub> uses <code class="language-plaintext highlighter-rouge">&lt;sub&gt;</code>.</li>
        </ul>
        <p>Most of these elements are styled by browsers with few modifications on our part.</p>
        <h2>Heading</h2>
        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <h3>Sub-heading</h3>
        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <pre><code>Example code block</code></pre>
        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p> -->
      </article>
    </div>

    <div class="col-md-4">
         <!-- <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Posted Date</th>
      <th scope="col">Job Position/title</th>
      <th scope="col">Company</th>
      <th scope="col">City</th>
      <th scope="col">Deadline</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php" >Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
    <tr>
      <td>Mar 25, 2022</td>
      <td><a href="vacdesc.php">Software Engineer</a></td>
      <td>Kenean Digital Technology</td>
      <td>Addis abeba</td>
      <td class="text-primary">mar 30, 2022</td>
    </tr>
  </tbody>
</table> -->
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Posted Date</th>
      <th scope="col">Job Position/title</th>
      <th scope="col">Company</th>
      <th scope="col">City</th>
      <th scope="col">Deadline</th>
    </tr>
  </thead>
  <tbody>
  <?php
  // if(isset($_GET['cat'])){
            if($_GET['cat'] == 'vacancy'){
              $cat = $_GET['cat'];
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];                                  
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search1C($cat, 'type', $dbType ,$search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnColumenD($cat, 'type', $dbType , $startPage, $endPage);
                }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOn2ColumenD($cat, 'type', $dbType, 'address', $_SESSION['location'], $startPage, $endPage );
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = searchC($cat, $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnTableD($cat, $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search1C($cat,$dyCol, $dyArg, $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnColumenD($cat,$dyCol, $dyArg, $startPage, $endPage);
                }
              }
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search1C($cat, 'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOnColumenD($cat, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = search2C($cat,$dyCol, $dyArg,'address', $_SESSION['location'], $search, $startPage, $endPage);
                }else{
                  $fetchPost = allPostListerOn2ColumenD($cat,$dyCol, $dyArg, 'address', $_SESSION['location'], $startPage, $endPage);
                }
              }
              if($fetchPost[1]->num_rows != 0){

              while($row = $fetchPost[0]->fetch_assoc()){
                if(!in_array($row['id'], $_SESSION['userScroll'])){
                  $dated=date_create($row['postedDate']);
                 
                  $st = date_create($row['deadLine']);
                  $exdate = date_format($st,"F j, Y ");
                  $stdate = date_format($dated,"F j, Y ");
                  $future_date = new DateTime($row['deadLine']);
                  $now = new DateTime();
                  $interval = $future_date->diff($now);
                  // echo 'interval '.$interval;

                  $deadLineInF = date_format($st,"Y-m-d");
                  $startInF= date_format($dated,"Y-m-d");
                  $start = strtotime($startInF);
                  $end = strtotime($deadLineInF);
                  $days_between = ceil(($end - $start) / 86400);

                    ?>
                    
                    <tr>
                      <td><?php echo $stdate ?></td>
                      <td><a href="vacdesc.php"><?php echo $row['title']  ?></a></td>
                      <td><?php echo $row['companyName'] ?></td>
                      <td><?php echo $row['address'] ?></td>
                      <?php 
                      if($days_between <= 0){
                        ?>
                         <td class="text-primary bg-danger"><?php echo $exdate;   ?></td>
                        <?php
                      }else{
                        ?>
                         <td class="text-primary"><?php echo $exdate;   ?></td>
                        <?php
                      }
                      ?>
                     
                    </tr>
                    <?php
                }
              }
            }
          }
        }
              ?>

  
  </tbody>
</table>
<?php
// }
?>
<?php
// this condition will dictate the pageination 
if($fetchPost[1]->num_rows != 0){
            ?>
      <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php
    $pageNumberPerPAGE = 2; 
    
      if(isset($_GET['end']) && $_GET['end'] != 0){
      $_SESSION['pgn'] =  $_GET['end'];
     }
    elseif(isset($_GET['end']) && $_GET['end'] > 0 || !isset($_GET['end'])){
      $_SESSION['pgn'] =  1;
    } 
    
    ?>
    <li class="page-item">
      <?php

      if($_SESSION['pgn']!= 1){
        $urll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
        $urll = parse_str($urll['query'], $params); // to make an assoc array of all the parameter key with the value
        unset($params['page']);
        unset($params['end']);
        $string = http_build_query($params);
        ?>
        <a class="page-link" href="vacdesc.php?<?php echo $string ?>&end=<?php echo $_SESSION['pgn']-$pageNumberPerPAGE ?>"  >Previous</a>
        <?php
      }
      ?>
    </li>
            <?php
            // echo $fetchPost[1]->num_rows;

            $pageCount = ceil($fetchPost[1]->num_rows/$content_per_page);
            for($j= $_SESSION['pgn'];$j<=$pageCount;$j++){
              $urll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              $urll = parse_str($urll['query'], $params); // to make an assoc array of all the parameter key with the value
              unset($params['page']);
              unset($params['end']);
              $string = http_build_query($params);
              // var_dump($string);
              // $string = str_replace('+', '%20', $string);
       

              if(isset($_GET['page'])){
                if($_GET['page'] == $j){
                  ?>
                  <li class="page-item active"><a class="page-link" href="vacdesc.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }else{
                  ?>
                  <li class="page-item"><a class="page-link " href="vacdesc.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }
              }elseif($j == 1 ){
                ?>
                <li class="page-item active"><a class="page-link" href="vacdesc.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php    
              }else{
                ?>
                <li class="page-item"><a class="page-link " href="vacdesc.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php               
              }


              // this is to show the max page numbers displayed on page.. then it will break.
              if($j == $pageNumberPerPAGE + $_SESSION['pgn'] - 1){
                break;
              }
            }
            ?>
            <?php

            // this is a limit condition so that it doesent show the next button if there is not more page numbers are available
            if($j + 1 < $pageCount){
              ?>
              <a class="page-link" href="vacdesc.php?<?php echo $string ?>&page=<?php echo $j+1 ?>&end=<?php echo $j+1 ?>">Next</a>
              <?php
            }
            ?>
    </li>
<?php
}
?>

  </ul>
</nav>

<!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->

    </div>
  </div>
</div>












	<?php 
include "includes/footer.php";
?>
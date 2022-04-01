<?php

include "includes/lang.php"; 
include "includes/header.php";
include "includes/secnav.php";
include "includes/navbar.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Blog Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body> 
    <?php
       if(isset($_GET['cat'], $_GET['postId'], $_GET['label'], $_GET['type'])){
        $type = $_GET['cat'];
        $pid = $_GET['postId'];
        $label = $_GET['label'];
        $tt = $_GET['type'];
        $fetch = aSinglePostView($pid, $type);    
            
        $row = $fetch->fetch_assoc(); 
        ///////////tender////////
if($_GET['cat'] == 'tender'){
  // to add aview count to this post
  // $type = $_GET['cat'];
  $viewadd = viewAdder($type, $pid);

  $dated=date_create($row['startingDate']); 
  $postedDate=date_create($row['postedDate']);   
  $st = date_create($row['deadLine']);
  $exdate = date_format($st,"F j, Y ");
  $stdate = date_format($dated,"F j, Y ");
  $p = date_format($postedDate, "F j, Y");
  $future_date = new DateTime($row['deadLine']);
  $now = new DateTime();
  $interval = $future_date->diff($now);
  // echo 'interval '.$interval;
  $date = time_elapsed_string($row['postedDate']);
  $deadLineInF = date_format($st,"Y-m-d");
  $startInF= date_format($dated,"Y-m-d");
  $start = strtotime($startInF);
  $end = strtotime($deadLineInF);
  $days_between = ceil(($end - $start) / 86400);
    ?>
<main class="container">
  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
     <?php echo $row['title'] ?>
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title"><?php echo ' '.$row['type'] ?></h2>
        <p class="blog-post-meta"><?php echo ' '.$p ?>  </p>

        <p>
            <?php echo $row['info'] ?>

        </p>
        <!-- <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p>
        <hr>
        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
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

      <nav class="blog-pagination" aria-label="Pagination">


    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <!-- <img src="assets/img/zumra1.jpg" class="img-fluid" alt="..."> -->
        <?php  
          include "includes/descriptionAd.php";
          ?>
        <!-- <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div> -->

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
          <?php
// archive functuion
function monthYearDataLister($month, $year, $table, $limitStart, $limitEnd){
  include "./php/connect.php";
  $q2 = "SELECT * FROM `$table` 
  WHERE MONTH(`postedDate`) = $month or YEAR(`postedDate`) = $year";
  $q = "SELECT * FROM `$table` 
  WHERE MONTH(`postedDate`) = $month or YEAR(`postedDate`) = $year LIMIT $limitStart, $limitEnd ";
  $ask = $mysql->query($q);
  $ask2 = $mysql->query($q2);
  return array($ask, $ask2);
}

$currentMonth = date('m');
$currentYear = date('y');
                                                                             
if($currentMonth != 12){
    for($month=$currentMonth;$month <=12+$currentMonth; $month++){
      if($month > 12){
        $realMonth = abs($month -12);
        $realYear = $currentYear;
      }else{
        $realMonth=$month;
        $realYear = $currentYear -1; // this is to start from last year
      }
      $dateObj   = DateTime::createFromFormat('!m', $realMonth);
      $monthName = $dateObj->format('F');

      $data = monthYearDataLister($realMonth, $realYear, 'tender',0,12); // to check if there is data on this particular year and monty
      if($data[1]->num_rows != 0){
        ?>
        <li><a href="tenders.php?cat=tender&month=<?php echo $realMonth ?>&year=<?php echo $realYear ?>"><?php echo $monthName." ".$realYear ?></a></li>
        <?php
      }else{
        // echo 'no result';
      }
      // echo ' '.$realMonth;
      // echo ' '.$monthName;
    }
}else{
  for($month=1;$month <=12; $month++){
    $dateObj   = DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');

    $data = monthYearDataLister($month, $currentYear, 'tender',0,12); // to check if there is data on this particular year and monty
    if($data[1]->num_rows != 0){
      ?>
      <li><a href="tenders.php?cat=tender&month=<?php echo $month ?>&year=<?php echo $currentYear ?>"><?php echo $monthName." ".$realYear ?></a></li>
      <?php
    }else{
      // echo 'no result';
    }
  }
}

 
?>
<!-- //             <li><a href="#">March 2021</a></li>
//             <li><a href="#">February 2021</a></li>
//             <li><a href="#">January 2021</a></li>
//             <li><a href="#">December 2020</a></li>
//             <li><a href="#">November 2020</a></li>
//             <li><a href="#">October 2020</a></li>
//             <li><a href="#">September 2020</a></li>
//             <li><a href="#">August 2020</a></li>
//             <li><a href="#">July 2020</a></li>
//             <li><a href="#">June 2020</a></li>
//             <li><a href="#">May 2020</a></li>
//             <li><a href="#">April 2020</a></li> -->
          </ol>

        </div>
<!--     
       
  
        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div> -->
      </div>
    </div>
  </div>

</main>
 <hr>
    <?php
}}
    ?>
  </body>
</html>

<?php 
  
  include "includes/footer.php";

?>
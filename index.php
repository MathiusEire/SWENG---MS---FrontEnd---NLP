<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="ANSI">
      <meta name="viewport" content="width=device-width">
      <meta name="description" content="An attempt at natural language processing no judge plz">
      <meta name="keywords" content="natural language processing, microsoft project, college project , web-design, front end">
      <meta name="author" content="Microsoft Group 1"
      <title> M N L P A |Home</title>
      <link rel="stylesheet" href="./css/style.css">
  </head>
  <body >
      <header>
        <div class=container">
            <div class="logo"><img src = "logo.png">
            <div id="branding">

              <h1><span class="highlight">Microsoft</span> MNLPA</h1>
            </div>
            <nav>
              <ul>
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Services.html">Services</a></li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropbtn">Topics</a>
                  <div class="dropdown-content">
                    <a href="Topics_Business.php">Business</a>
                    <a href="Topics_Entertainment.php">Entertainment</a>
                    <a href="Topics_Politics.php">Politics</a>
                    <a href="Topics_Sport.php">Sport</a>
                    <a href="Topics_Tech.php">Technology</a>
                  </div>
                </li>
              </ul>
            </nav>

            </div>

      </header>
                                                                 
      <section id="showcase">
        <div class="container">
          <h3> A Trinity College Project<h3>
        </div>
      </section>

      <section id="newsletter">
        <!--<div class="container">
          <h1>Search BBC Archives</h1>-->
      </section>

      <section id="boxes">
        <div class="container">

        <h1> Sport </h1>
          <div style="height:200px;width:400px;overflow:auto;border:8px solid #e8491d;padding:2%">
            <? firstArticle("Sport"); ?>
          </div>

        <button class="collapsible">Summary</button>
        <div class="content">
        <p><? firstSummary("Sport"); ?></p>
         
        </div>

        <h1> Politics </h1>
          <div style="height:200px;width:400px;overflow:auto;border:8px solid #e8491d;padding:2%">
            <? firstArticle("Politics"); ?>
          </div>
        <button class="collapsible">Summary</button>
        <div class="content">
        <p><? firstSummary("Politics"); ?></p>
        </div>

        <h1> Business </h1>
        <div style="height:200px;width:400px;overflow:auto;border:8px solid #e8491d;padding:2%">
          <? firstArticle("Business"); ?>
        </div>
        <button class="collapsible">Summary</button>
        <div class="content">
        <p><? firstSummary("Business"); ?></p>
        </div>

        <h1> Technology </h1>
        <div style="height:200px;width:400px;overflow:auto;border:8px solid #e8491d;padding:2%">
          <? firstArticle("Tech"); ?>
        </div>
        <button class="collapsible">Summary</button>
        <div class="content">
        <p><? firstSummary("Tech"); ?></p>
        </div>

        <h1> Entertainment </h1>
        <div style="height:200px;width:400px;overflow:auto;border:8px solid #e8491d;padding:2%">
          <? firstArticle("Entertainment"); ?>
        </div>
        <button class="collapsible">Summary</button>
        <div class="content">
        <p><? firstSummary("Entertainment"); ?></p>
        </div>

        </div>
      </section>
      <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
            });
          }
        </script>
      <footer>
        <p> Microsoft-Trinity Collaboration Project &copy; 2019 </p>
      </footer>
  </body>
</html>

<?php
  function firstSummary($topic){
     $serverName = "text-sum-server.database.windows.net";
     $connectionOptions = array(
      "Uid" => "Group1",
      "PWD" => "1234567a!",
      "Database" => "NLP_Database"
     );
     // Create connection
     $conn = sqlsrv_connect($serverName, $connectionOptions);
     // Check connection
     $sql = "SELECT Title, Content FROM summarized_articles WHERE Topic='" . $topic . "' ORDER BY Title asc;";
     $result = sqlsrv_query($conn, $sql);
     if ($result == FALSE){
      echo "Query issue. <br>";
     }
     else{
      $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
      echo $row["Content"];
     }
  }
  
  function firstArticle($topic){
     $serverName = "text-sum-server.database.windows.net";
     $connectionOptions = array(
      "Uid" => "Group1",
      "PWD" => "1234567a!",
      "Database" => "NLP_Database"
     );
     // Create connection
     $conn = sqlsrv_connect($serverName, $connectionOptions);
     // Check connection
     $sql = "SELECT Title, original FROM summarized_articles WHERE Topic='" . $topic . "' ORDER BY Title asc;";
     $result = sqlsrv_query($conn, $sql);
     if ($result == FALSE){
      echo "Query issue. <br>";
     }
     else{
      $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
      echo "Title: ". $row["Title"] . "<br> Article: <br> " . $row["original"];
     }
  }
?>
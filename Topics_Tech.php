<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <meta name="description" content="An attempt at natural language processing no judge plz">
      <meta name="keywords" content="natural language processing, microsoft project, college project , web-design, front end">
      <meta name="author" content="Microsoft Group 1"
      <title> M N L P A |Topics</title>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Services.html">Services/Upload</a></li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropbtn">Topics</a>
                  <div class="dropdown-content">
                    <a href="Topics_Business.php">Business</a>
                    <a href="Topics_Entertainment.php">Entertainment></a>
                    <a href="Topics_Politics.php">Politics</a>
                    <a href="Topics_Sport.php">Sport</a>
                    <a href="Topics_Tech.php">Technology</a>
                  </div>
                  </li>
              </ul>
            </nav>

            </div>

      </header>

      <?php
        function topicquery($offset){
          //Data Source=tcp:text-sum-server.database.windows.net,1433;Initial Catalog=NLP_Database;User ID=Group1;Password=1234567a!
          $serverName = "text-sum-server.database.windows.net";
          $connectionOptions = array(
            "Uid" => "Group1",
            "PWD" => "1234567a!",
            "Database" => "NLP_Database"
          );
    	     // Create connection
    	    $conn = sqlsrv_connect($serverName, $connectionOptions);
    	     // Check connection
            $sql = "SELECT * FROM summarized_articles WHERE Topic='Tech' ORDER BY Title asc;";
      	    $result = sqlsrv_query($conn, $sql);
            if ($result == FALSE){
              echo "Query issue. <br>";
            }
      	    else{
      		     // output data of each row
      		     for($x = 0; $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) and $x < $offset + 5; $x++) {
                 if($x >= $offset){
        			      echo "<br>Title: " . $row["Title"] . "<br> Summary: " . $row["Content"] . " <br>";
                    //getArticle($row["Title"]);
                 }
      		     }
               echo "<br>";
               sqlsrv_free_stmt($result);
      	    }
        }
        topicQuery(0);
        
       ?>
      
      <a href="#" class="previous">&laquo; Load last 10</a>
      <a href="#" class="next">Load Next 10 &raquo;</a>
      
  </body>

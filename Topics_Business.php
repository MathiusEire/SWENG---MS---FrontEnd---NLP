<? $offset =0 ?>
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
      <div class="container">
        <h1> Business </h1>
        <div class = "writeHere">
       <?php
         //$offset = 0;
        //echo(topicquery($offset));
         
        function topicquery($offset){
          $serverName = "text-sum-server.database.windows.net";
          $connectionOptions = array(
            "Uid" => "Group1",
            "PWD" => "1234567a!",
            "Database" => "NLP_Database"
          );
    	     // Create connection
    	    $conn = sqlsrv_connect($serverName, $connectionOptions);
    	     // Check connection
            $sql = "SELECT * FROM summarized_articles WHERE Topic='Business' ORDER BY Title asc;";
      	    $result = sqlsrv_query($conn, $sql);
            if ($result == FALSE){
              echo "Query issue. <br>";
            }
      	    else{
      		     // output data of each row
      		     for($x = 0; $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) and $x < $offset + 5; $x++) {
                 if($x >= $offset){
        			      echo  "<strong> <br>Title: </strong>" . $row["Title"] . "<br> Article: " . $row["original"] . "<br><br><strong> Summary: </strong> " . $row["Content"] . " <br><br> __________________________________________________";
                 }
      		     }
               $offset+=5;
               echo "<br>";
               sqlsrv_free_stmt($result);
      	    }
        }
        
        
       ?>
      </div>
      <button type = "button" id="prev">Load Last 5</button>
      <button type = "button" id="next">Load Next 5</button>
        <script>
        document.getElementById("prev").onclick=function(){
        var myDiv = document.getElementById("writeHere");
        myDiv.InnerHTML="";
        myDiv.InnerHTML=" <?php topicquery(0); ?>";
        };
      </script>
      <script>
        document.getElementById("next").onclick=function(){
        var myDiv = document.getElementById("writeHere");
        myDiv.InnerHTML="";
        myDiv.InnerHTML=" <?php topicquery(5); ?>";
        };
      </script>
       <!--<script class ="nextID">
        function nextID(){
        var myDiv = document.getElementById("writeHere");
        myDiv.InnerHTML="";
        myDiv.InnerHTML=" <?php topicquery(5); ?>";
        };
        </script>
        <script class ="prevID">
        function prevID(){
        var myDiv = document.getElementById("writeHere");
        myDiv.InnerHTML=" <?php topicquery(0); ?>";
        };
      </script>-->
      </div>

  </body>

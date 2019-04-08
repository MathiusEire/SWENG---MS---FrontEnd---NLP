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
            <div class="logo"><a href ="#"><img src = "logo.png">
            <div id="branding">
              <h1><span class="highlight">Microsoft</span> MNLPA</h1>
            </div>
            <nav>
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Services.html">Services/Upload</a></li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropbtn">Topics</a>
                  <div class="dropdown-content">
                    <a class="current" href="Topics.php">Business</a>
                    <a class="current" href="Topics.php">Entertainment</a>
                    <a class="current" href="Topics.php">Politics</a>
                    <a class="current" href="Topics.php">Sport</a>
                    <a class="current" href="Topics.php">Technology</a>
                  </div>
                  </li>
              </ul>
            </nav>

            </div>

      </header>

      <a href="#" class="previous">&laquo; Load last 10</a>
      <a href="#" class="next">Load Next 10 &raquo;</a>
      <?php echo topicQuery(0, 'Business'); ?>

  </body>

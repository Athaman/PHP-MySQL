<?php include 'database.php'; ?>
<?php
//get the total number of questions
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <header>
      <div class="container">
        <h1>PHP Quizzer</h1>
      </div>
    </header>
    <main>
      <div class="container">
        <h2>Test Your PHP Knowledge</h2>
        <p>
          This is a multiple choice quiz to test your knowledge of PHP.
        </p>
        <ul>
          <li>
            <strong>Number of Questions: </strong><?=$total?>
          </li>
          <li>
            <strong>Type: </strong> Multiple choice
          </li>
          <li>
            <strong>Estimated Time: </strong> <?=$total/2?> minutes
          </li>
        </ul>
        <a href="questions.php?n=1" class="start">Start Quiz</a>
      </div>
    </main>
    <footer>
      <div class="container">
        Copyright &copy; 2016, PHP Quizzer
      </div>
    </footer>
  </body>
</html>

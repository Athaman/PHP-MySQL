<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
  //set the question number from super global get
  $number = (int) $_GET['n'];

  // get the question
  $query = "SELECT * FROM `questions` WHERE question_number = $number";
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $question = $result->fetch_assoc();

  //get the answer options
  $query = "SELECT * FROM `choices` WHERE question_number = $number";
  $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
        <div class="current">
          Question <?=$question['question_number'];?>
        </div>
        <p class="question">
          <?php echo $question['text']; ?>
        </p>
        <form method="post" action="process.php">
          <ul class="choices">
            <?php while($row = $choices->fetch_assoc()) : ?>
              <li>
                <input name="choice" type="radio" value="<?php echo $row['id']?>" /> <?php echo $row['text'] ?>
              </li>
            <?php endwhile; ?>
          </ul>
          <input type="submit" value="Submit" />
          <input type="hidden" name="number" value="<?=$number?>"/>
        </form>
      </div>
    </main>
    <footer>
      <div class="container">
        Copyright &copy; 2016, PHP Quizzer
      </div>
    </footer>
  </body>
</html>

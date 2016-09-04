<?php include 'database.php' ; ?>
<?php session_start(); ?>
<?php
  //check to see if the score has been set
  if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
  }

  if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number + 1;

    // get the total number of questions
    $query = "SELECT * FROM `questions`";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;


    // get the correct answer
    $query = "SELECT * FROM `choices` WHERE question_number = $number
        AND is_correct = 1";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    //get the row
    $row = $result->fetch_assoc();

    //set the correct choice id
    $correct_choice = $row['id'];

    if($correct_choice == $selected_choice){
      $_SESSION['score']++;
    }

    //check if it's the last question.
    if($number == $total){
      header("Location: final.php");
    }else{
      header("Location: questions.php?n=".$next);
    }
  }
 ?>

<?php
  //Connect to db
  $dsn = "mysql://hostname=localhost;dbname=survey"; // Data Source Name
  $user = "abeer";
  $pass = "abeer";

  try {
      $db = new PDO($dsn, $user, $pass);
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
// Returns all survey questions in db
  function get_all_survey_questions(){
    global $db;
    $stmt = $db->prepare("SELECT * FROM survey_questions");
    $stmt->execute();
    return $stmt->fetchAll();
  }
// INSERTS row into db of answers from survey
  function create($question_id, $answer) {
    global $db;
    $stmt = $db->prepare("INSERT INTO survey_answers( question_id, answer) VALUES (?,?)");
    return $stmt->execute([$question_id, $answer]);
  }

// Returns the count of each multiple choice answer
  function multiple_choice_report(){
    global $db;
    $stmt = $db->prepare("SELECT a.answer, COUNT(*) as count FROM survey_answers AS a JOIN survey_questions AS q ON q.id = a.question_id WHERE q.type = 'mc' GROUP BY answer");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function common_text_answers(){
    global $db;
    $stmt = $db->prepare("SELECT a.answer, q.id FROM survey_answers AS a JOIN survey_questions AS q ON q.id = a.question_id WHERE q.type = 'text' GROUP BY a.answer, q.id ORDER BY COUNT(*) DESC LIMIT 3");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function unique_text_answers(){
    global $db;
    $stmt = $db->prepare("SELECT a.answer, q.id FROM survey_answers AS a JOIN survey_questions AS q ON q.id = a.question_id WHERE q.type = 'text' GROUP BY a.answer, q.id ORDER BY COUNT(*) ASC LIMIT 3");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
?>

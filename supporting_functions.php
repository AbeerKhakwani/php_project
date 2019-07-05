<?php
include 'db.php';

// If it is a post request create the survey and direct to Thank You! page
if($_POST){
  foreach ($_POST as $qid => $answer) {
    $success = create($qid, $answer);
  }

  if ($success) {
    header("Location:thankyou.php");
  }
}
function top_three_inputs($answer){
  $array = $answer();
  $newarray = array();
  foreach ($array as $key => $value) {
    if(array_key_exists($value['id'],$newarray)){
      array_push($newarray[$value['id']], [$value['answer'],$value['count']]);
    }else{
      $newarray[$value['id']] = [[$value['answer'], $value['count']]];
    }
  }
  return $newarray;
}

  function each_multiple_choice_x_used(){
    foreach (multiple_choice_report() as $a) {
      echo "</br> " .$a['answer'] . " was answered  " . $a['count'] . " times";
    }
  }
  ?>

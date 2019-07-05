<?php
  include 'db.php';

  // If it is a post request create the survey and direct to Thank You! page
  if($_POST){
    $success = create($_POST['pony_type'], $_POST['princess_type'], $_POST['fav_pet'], $_POST['more_char'], $_POST['mlp_fanfic']);

    if ($success) {
      header("Location:thankyou.php");
    }
  }

  function print_multiple_choice_options($choice_array){
      foreach ($choice_array as $choice){
          echo "<option value='$choice'>" . $choice . "</option>";
      }
  }

  function top_three_inputs($answer){
    $array = $answer(["more_char", "mlp_fanfic"]);
    $newarray = array();
    foreach ($array as $input) {
      foreach ($input as $key => $value) {
        if(array_key_exists($key,$newarray)){
          array_push($newarray[$key], $value);
        }else{
          $newarray[$key] = [$value];
        }
      }
    }
    return $newarray;
  }

  function each_multiple_choice_x_used($answer){
    foreach (multiple_choice_report($answer) as $a) {
      echo "</br> " .$a[$answer] . " was answered  " . $a['count'] . " times";
    }
  }
?>

<?php
  include 'survey.php';

  function top_three_inputs($answer){
    $array = $answer(["more_char", "mip_fanfic"]);
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

  function three_most_unique_inputs(){


  }

  function each_multiple_choice_x_used(){


  }
?>

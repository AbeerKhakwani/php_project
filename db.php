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
  function create($pony_type, $princess_type, $fav_pet, $more_char, $mlp_fanfic) {
    global $db;
    $stmt = $db->prepare("INSERT INTO surveys( pony_type, princess_type, fav_pet, more_char, mlp_fanfic) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$pony_type, $princess_type, $fav_pet, $more_char, $mlp_fanfic]);
  }

  function multiple_choice_report($type){
    global $db;
    $sql = "SELECT ?, COUNT(*) as count FROM surveys GROUP BY ?";
    $sql = str_replace('?', $type, $sql);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function common_text_answers($array){
    global $db;
    $sql = "SELECT [column] FROM surveys GROUP BY [column] ORDER BY COUNT(*)  DESC LIMIT 3";
    $sql = str_replace('[column]', join(",",$array), $sql);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function unique_text_answers($array){
    global $db;
    $sql = "SELECT [column] FROM surveys GROUP BY [column] ORDER BY COUNT(*) ASC LIMIT 3";
    $sql = str_replace('[column]', join(",",$array), $sql);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
?>

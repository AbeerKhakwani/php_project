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

  // $success = create();

 // if ($success) {
 //    header("Location:thankyou.php");
 // }

  function create($type) {
    global $db;
    $stmt = $db->prepare("INSERT INTO surveys( pony_type, princess_type, fav_pet, more_char, mlp_fanfic) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute($type, $type, $type, $type,$type);
  }

  function multiple_choice_report($type){
    global $db;
    $stmt = $db->prepare("SELECT ?, COUNT(*) FROM surveys GROUP BY ?");
    $stmt->execute([$type, $type]);
    return $stmt->fetchAll();
  }

  function common_text_answers($column,$column2){
    global $db;
    $sql = "SELECT [column], [column2] FROM surveys GROUP BY [column],[column2] ORDER BY COUNT(*) DESC LIMIT 3";
    $sql = str_replace('[column]', $column, $sql);
    $sql = str_replace('[column2]', $column2, $sql);

    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }

  function unique_text_answers($type){
    global $db;
    $stmt = $db->prepare("SELECT ? FROM surveys GROUP BY ? ORDER BY COUNT(*) ASC LIMIT 3");
    $stmt->execute([$type, $type]);
    return $stmt->fetchAll();
  }
?>

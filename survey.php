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

  $success = create();

 if ($success) {
    header("Location:thankyou.php");
 }

  function create() {
    global $db;
    $stmt = $db->prepare("INSERT INTO surveys( pony_type, princess_type, fav_pet, more_char, mlp_fanfic) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$_POST['pony_type'], $_POST['princess_type'], $_POST['fav_pet'], $_POST['more_char'], $_POST['mip_fanfic']]);
  }

  function multiple_choice_report($type){
    global $db;
    $stmt = $db->prepare("SELECT ?, COUNT(*) FROM surveys GROUP BY ?");
    $stmt->execute([$type, $type]);
    return $stmt->fetchAll();
  }

  function common_text_answers($type){
    global $db;
    $stmt = $db->prepare("SELECT ? FROM surveys GROUP BY ? ORDER BY COUNT(*) DESC LIMIT 3");
    $stmt->execute([$type, $type]);
    return $stmt->fetchAll();
  }

  function unique_text_answers($type){
    global $db;
    $stmt = $db->prepare("SELECT ? FROM surveys GROUP BY ? ORDER BY COUNT(*) ASC LIMIT 3");
    $stmt->execute([$type, $type]);
    return $stmt->fetchAll();
  }
?>

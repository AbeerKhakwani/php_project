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
  if(isset($_POST['submit'])){
    $success = create();

    if ($success) {
      header("Location:thankyou.php");
    }
  }

  function create() {
    global $db;
    $stmt = $db->prepare("INSERT INTO surveys( pony_type, princess_type, fav_pet, more_char, mlp_fanfic) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute($_POST['pony_type'], $_POST['princess_type'], $_POST['fav_pet'], $_POST['more_char'], $_POST['mlp_fanfic']);
  }

  function multiple_choice_report($type){
    global $db;
    $sql = "SELECT [column], COUNT(*) FROM surveys GROUP BY [column]";
    $sql = str_replace('[column]', $type, $sql);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
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

<!DOCTYPE html>
<html>
  <body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="container-fluid">
      <div class="container">
        <div class="col-sm">
        </div>
        <div class="col-md">
          <br/>
          <br/>
          <br/>
          <h1>Survey
          </h1>
          <div class="card card-body bg-light">
            <form action="survey.php" method="post"/>
            <?php
              include 'questions.php';
              function print_multiple_choice_options($choice_array){
                foreach ($choice_array as $choice) {
                  echo "<option value='$choice'>". $choice ."</option>";
                }
                }
              foreach ($questions as $question) {
                if ($question["type"] == "text" ){
                  echo
                  "<div class='form-group'>
                  <label> " . $question['question'] . "</label>
                  <input name='" . $question['name']. "' class='form-control' type='text'>
                  </div>";
                  }elseif ($question["type"] == "mc") {
                  echo
                    "<div class='form-group'>
                    <label>" . $question['question'] ."</label>
                    <select name='". $question['name']."' class='form-control'>";
                    foreach ($question['answers'] as $choice) {
                      echo "<option value='$choice'>". $choice ."</option>";
                    };
                    echo "</select>
                  </div>";
                  }
                }
              ?>
            <button type="submit" class="btn btn-secondary">Submit
            </button>
            </form>
        </div>
      </div>
      <div class="col-sm">
      </div>
    </div>
    </div>
  </body>
</html>

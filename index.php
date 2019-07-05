<!DOCTYPE html>
<html>
  <body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="container-fluid">
      <div class="container">
        <div class="col-sm"></div>
        <div class="col-md">
          <br/>
          <br/>
          <br/>
          <h1>Survey</h1>
          <div class="card card-body bg-light">
            <form action="supporting_functions.php" method="post"/>
            <!-- This php loops through array of questions and creates a form with input type indicated by the question type.-->
            <!-- Assumption: The question set is Dynamic and can change. -->
            <?php
            // Include the questions
            include 'supporting_functions.php';
            // include 'supporting_functions.php';

            // For  every question if it's a text type creates input box else creates select dropdown.
            foreach (get_all_survey_questions() as $question){
                echo "<label> " . $question['question'] . "</label>";
                if ($question["type"] == "text"){
                    echo "<input name='" . $question['id'] . "' class='form-control' type='text' required>";
                }
                else{
                    $answers =  explode (",", $question['answers']);
                    echo "<select name='" . $question['id'] . "' class='form-control' required>";
                    foreach ($answers as $choice){
                        echo "<option value='" . strtolower($choice) . "'>" . $choice . "</option>";
                    };
                    echo "</select>";
                }
            }
            ?>
          </br>
            <button type="submit" class="btn btn-secondary">Submit </button>
            </form>
        </div>
        <a href="report.php"> View Survey Report</a>
      </div>
      <div class="col-sm"></div>
    </div>
    </div>
  </body>
</html>

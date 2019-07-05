<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container-fluid">
   <div class="container">
      <div class="col-sm"></div>
      <div class="col-md">
         <br/><br/>
         <div class="card card-body bg-light">
           <h1>Survey Report</h1>
           <?php
           include 'questions.php';
           include 'report_controller.php';

            $text_questions_common_3 = top_three_inputs("common_text_answers");
            $text_questions_unique_3 = top_three_inputs("unique_text_answers");
            // each_multiple_choice_x_used();
            foreach ($questions as $question) {
              echo " </br> </br> QUESTION: " . $question['question'];

              if ($question["type"] == "text" ){
                echo " </br> Top Three Common Answers </br>";
                echo "1: " . $text_questions_common_3[$question['name']][0];
                echo "</br> 2: " . $text_questions_common_3[$question['name']][1];
                echo "</br> 3: " .$text_questions_common_3[$question['name']][2];
                echo " </br> </br> Top Three Unique Answers </br>";
                echo "1: " . $text_questions_unique_3[$question['name']][0];
                echo "</br> 2: " . $text_questions_unique_3[$question['name']][1];
                echo "</br> 3: " .$text_questions_unique_3[$question['name']][2];
              }else{
                each_multiple_choice_x_used($question['name']);
              }
            }
          ?>
         </div>
      </div>
      <div class="col-sm"></div>
   </div>
</div>

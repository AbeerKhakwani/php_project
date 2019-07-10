<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container-fluid">
   <div class="container">
      <div class="col-sm"></div>
      <div class="col-md">
         <br/><br/>
         <div class="card card-body bg-light">
           <h1>Survey Report</h1>
           <?php
           include 'supporting_functions.php';
            // Retuen array of three top unique and common so to only query once:
            $text_questions_common_3 = top_three_inputs("common_text_answers");
            $text_questions_unique_3 = top_three_inputs("unique_text_answers");

            foreach (get_all_survey_questions() as $question) {
              echo " </br> </br> QUESTION: " . $question['question'];
              // If the question is text based
              // Shows the Top three common and Unique answers with count on how many times they have been amswered.
              // If the Question is Multiple Choice returns each answer and how many times it was answered. 
              if ($question["type"] == "text" ){
                echo " </br> Top Three Common Answers </br>";
                $common_q = $text_questions_common_3[$question['id']];
                foreach ($common_q as $index => $common) {
                  echo ($index +1) . " . " . $common[0] . " Count: " . $common[1] ."</br>";
                }
                echo " </br> </br> Top Three Unique Answers </br>";
                $unique_q = $text_questions_unique_3[$question['id']];
                foreach($unique_q as $index => $common) {
                  echo ($index +1) . " . " . $common[0] . " Count: " . $common[1] ."</br>";
                }
                }else{
                each_multiple_choice_x_used();
              }
            }
          ?>
         </div>
      </div>
      <div class="col-sm"></div>
   </div>
</div>

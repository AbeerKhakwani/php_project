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
             include 'survey.php';

             foreach ($questions as $question) {
               if ($question["type"] == "text" ){
                 echo " </br>" . $question['question']. " </br>";
                 echo " </br> Top Three Common Answers </br>";

                 foreach (common_text_answers($question["name"]) as $key => $value) {
                   echo ($key+1) . ". " .$value ."</br>";
                }else{
                  
                }
               }
             }
             ?>
         </div>
      </div>
      <div class="col-sm"></div>
   </div>
</div>

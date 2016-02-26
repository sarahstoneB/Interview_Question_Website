<!doctype html>
<html>
    <head>
        <title>DBA Interview Questions</title>

        <link href="Stylesheet/StyleSheet.css" rel="stylesheet" type="text/css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="Scripts/Script.js"></script>
             <script>
      $(function() {
        $( "#tabs" ).tabs();
      });
      </script>
    </head>

    <body>
        <header>
            <div class="container">
                <h1>DATABASE INTERVIEW PREPARATION</h1>
                    <nav>
                        <a href="#">Sign Up!</a> |
                      <a href="#">FAQ</a> |
                      <a href="#">Support</a>
                    </nav>
             </div>
        </header>

        <main>
               <div class="tabs">
                   <ul class="tab-links">
                         <?php
                    // First Get Tags Data    
                    $host = "ideashines.com"; 
                    $user = "kangmin"; 
                    $pass = "123qweasd"; 

                    $r = mysql_connect($host, $user, $pass);

                    $tags_query = "SELECT question_type_id, question_type_description FROM dev.Question_Type;";

                    $rs_tags = mysql_query($tags_query);
                    
                    $array_tags = array();
                    $array_tags_id = array();

                    $count_tags = 1;

                    while ($row_tag = mysql_fetch_assoc($rs_tags)) {
                        if ($count_tags == 1){
                            echo '<li class="active"><a href="#tab' . $row_tag['question_type_id'] . '">' . $row_tag['question_type_description'] . '</a></li>';
                            $count_tags = $count_tags + 1;
                        }
                        else{
                            echo '<li><a href="#tab' . $row_tag['question_type_id'] . '">' . $row_tag['question_type_description'] . '</a></li>';
                        }
                        
                        $array_tags_id[] = $row_tag['question_type_id'];
                        $array_tags[] = $row_tag['question_type_description'];
                    }

                    echo '<li><a href="#tab_other">Others</a></li>';
                   


                    ?>
                   </ul>
                             
               
                   <div class="tab-content">
                       <?php
                           $count_tags = 1;
                           foreach ($array_tags_id as $x)
                           {
                               if ($count_tags == 1)
                               {
                                    echo '<div id="tab' . $x . '" class ="tab active">';
                                    $count_tags = $count_tags + 1;
                               }
                               else
                               {
                                   echo '<div id="tab' . $x . '" class ="tab">';
                               }

                               // Tab Content
                                $question_query = "SELECT question_id,question FROM dev.Question WHERE dev.Question.question_type_id=" . $x . ";" ;

                                $rs_question = mysql_query($question_query);
                    
                                echo "<ul class=\"question_list\">";

                                while ($row_question = mysql_fetch_assoc($rs_question)) {
                                    $question_id = $row_question['question_id'];
                                    $answer_query = "SELECT description FROM dev.Answer WHERE question_id = " . $question_id;
                       
                                    $rs_answer = mysql_query($answer_query);

                                    $str_answer = "";

                                    while ($row_answer = mysql_fetch_assoc($rs_answer)) {
                                        $str_answer = $str_answer . $row_answer['description'] . "<br>";             
                                    }
                  
                                    echo "<li class=\"content_list\">" . " " . $row_question['question'] . " " . "<button id=\"btn" . $question_id . "\" onclick=\"ShowAnswer(this.id)\">+</button>
                                    <p id=\"ans" . $question_id . "\" style=\"display: none\">" . $str_answer . "</p></li>";

                                } 


                                echo "</ul>";



                               echo '</div>';


                              
                           }

                           echo '<div id="tab_other" class ="tab">';

                            $question_query = "SELECT question_id,question FROM dev.Question WHERE dev.Question.question_type_id IS NULL;";

                                $rs_question = mysql_query($question_query);
                    
                                 echo "<ul class=\"question_list\">";

                                while ($row_question = mysql_fetch_assoc($rs_question)) {
                                    $question_id = $row_question['question_id'];
                                    $answer_query = "SELECT description FROM dev.Answer WHERE question_id = " . $question_id;
                       
                                    $rs_answer = mysql_query($answer_query);

                                    $str_answer = "";

                                    while ($row_answer = mysql_fetch_assoc($rs_answer)) {
                                        $str_answer = $str_answer . $row_answer['description'] . "<br>";             
                                    }
                  
                                    echo "<li class=\"content_list\">" . " " . $row_question['question'] . " " . "<button id=\"btn" . $question_id . "\" onclick=\"ShowAnswer(this.id)\">+</button>
                                    <p id=\"ans" . $question_id . "\" style=\"display: none\">" . $str_answer . "</p></li>";

                                } 
                           
                                echo "</ul>";

                                echo '</div>';
                            mysql_close();

                        ?>
                   
                   </div>
               </div>

         
        </main>

        <footer>
        </footer>



  
    </body>

</html>



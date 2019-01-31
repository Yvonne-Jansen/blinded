<?php header("Cache-Control: no-cache, must-revalidate"); // study 4?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title></title>
        <script src="code.js" type="text/javascript" charset="utf-8"></script>        
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    
    
    <body class="jobs">
    
<noscript>You need to activate javascript to do this experiment. Please activate javascript now and then reload this page.</noscript>

<h2 id="window_too_narrow">Your browser window is not wide enough. Please make the window wider until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<h2 id="window_too_short">Your browser window is not high enough. Please increase the height of this window  until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<h2 id="window_too_small">Your browser window is too small. Please increase both the height and width of this window  until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<div id="loading" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center;";>Loading...</div>

<div id="content" style="display: none;">
<form name="answers" onsubmit="return validateComments()" method="POST" action="./export.php">
<?php 
$start_code = $_GET["start_code"];
$rep_text = "";
if(hexdec($start_code) < 720608) {
  $condition = 0;
} else {
  $condition = 1;
  $rep_text = ' Incidence of illness drops from 83% to 63% with the medication.';
}
//$condition = mt_rand(1,100) % 2;
?>
<div id="replication">
  <div class="task-description" id="graph_box">
  <input type="hidden" name="time_replication_started" id="time_replication_started"/>
    <p>A large pharmaceutical company has recently developed a new drug to boost peoples' immune function. It reports that trials it conducted demonstrated a drop of twenty percent (from eighty three to sixty three percent) in occurrence of the common cold. It intends to market the new drug as soon as next winter, following FDA approval.</p>
    <input type="hidden" name="condition" value=<?php if ($condition == 0) {
      echo '"graph"';
    } else {
      echo '"no_graph"';
    }
     ?>>
    <input type="hidden" name="start_code" value=<?php echo '"' . $start_code . '"';?>>
    <input type="hidden" name="start_time" value=<?php echo '"' . time() . '"';?>>
    <?php if ($condition == 0) {
      echo '<p><img id="graph" src="../exp2_graph.jpg"></p>';
    } else {
      echo $rep_text;
    }

    ?>
 
    
  </div>
  
  <hr>

  <div class="ratings cml_field"><p>Please rate your agreement with the following statement:</p><h2 class="legend">I believe the new drug is effective.</h2>
<div class="cml_row">
  
<table>
  <thead>
    <tr>
      <th></th>
      
      <th class="likert">1</th>
      
      <th class="likert">2</th>
      
      <th class="likert">3</th>
      
      <th class="likert">4</th>
      
      <th class="likert">5</th>
      
      <th class="likert">6</th>
      
      <th class="likert">7</th>
      
      <th class="likert">8</th>
      
      <th class="likert">9</th>
      
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Strongly disagree </td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="1" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="2" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="3" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="4" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="5" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="6" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="7" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="8" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td class="likert"><input name="how_effective_is_the_new_medication" type="radio" value="9" class="how_effective_is_the_new_medication validates-required validates">
</td>
      
      <td> Strongly agree</td>
    </tr>
  </tbody>
</table>
</div>
</div>

<button type="button" onclick="finishedReplication()">Next</button>



    </div>
    
    
    
    
    
    <div id="comprehension" style="display:none">
    <div class="task-description">
    <input type="hidden" name="time_comprehension_started" id="time_comprehension_started"/>
    <p id="reminder-text">Remember you cannot go back or reload this page.</p>
    <p>Suppose the findings reported by the pharmaceutical company are <strong>accurate</strong>.</p> 
    <p>Imagine a group of 20 people who would all get the common cold without the new drug.</p> 
      <p><img id="people" src="http://yvonnejansen.me/study_material/20peoplesick.jpg"/></p>
      <p>Now suppose they all took the new drug ahead of time.</p></div>
      <h2 class="legend">How many should we expect to get the common cold despite the drug?</h2>
      <p><img id="people20" src="http://yvonnejansen.me/study_material/20people/20.jpg"/></p>
<p id="helper-text">Move the slider below to give your answer. The closer you are to the correct anwer, the better.</p>
<div id="slider-box">
<input id="comprehension_input" onchange="updateFrequency(this.value);" oninput="updateFrequency(this.value);" name="comprehension" type ="range" min ="0" max="20" step ="1" value ="20"/>
    <div class="" id="comprehension_output" ></div>
    </div>
    <button type="button" onclick="finishedComprehension()">Next</button>

    </div>
    
    
    
    
    <div id="previous-studies" style="display:none">
       <input type="hidden" name="time_previous_started" id="time_previous_started"/>
   
    <p class="legend">Have you heard of (or participated in) a very similar study before?
    </p>
    <!-- <p id="helper-text">Your answer to this question will have no effect on your payment.</p> -->
    
      <div class="cml_row"><label class=""><input name="participated_in_previous_study" type="radio" value="yes" class="participated_in_previous_study validates-required validates" required>
 Yes</label></div>
<div class="cml_row"><label class=""><input name="participated_in_previous_study" type="radio" value="no" class="participated_in_previous_study validates-required validates" required>
 No</label></div>
<div class="cml_row"><label class=""><input name="participated_in_previous_study" type="radio" value="unsure" class="participated_in_previous_study validates-required validates" required>
 Unsure</label></div>
<hr>
  <!-- <h2 style="margin-bottom: 0">Demographic Questions</h2> -->
    <p class="demographics">
    <div class="legend">What is your age?</div>
      <input type="number" name="age"></p>
 <hr> 
    <p class="demographics">
    <div class="legend">What is your gender?</div>
      <div class="cml_row"><label><input type="radio" name="gender" value="female"> Female</input></label></div>
      <div class="cml_row"><label><input type="radio" name="gender" value="male"> Male</input></label></div>
      <div class="cml_row"><label><input type="radio" name="gender" value="no_answer"> Other</input></label></div></p>
 <hr> 
    <p class="legend" style="clear: left;">What is your highest level of education?</p>
      <div class="cml_row"><label><input type="radio" name="education" value="high-school"> Finished high school or equivalent</input></label></div>
      <div class="cml_row"><label><input type="radio" name="education" value="some_college"> Some college education</input></label></div>
      <div class="cml_row"><label><input type="radio" name="education" value="college_or_more"> 4-year college or more</input></label></div>
      <div class="cml_row"><label><input type="radio" name="education" value="neither"> None of the above</input></label></div>

    <button type="button" onclick="finishedPreviousStudies()">Next</button>
</div>



<div id="test_and_comments" style="display: none;">
    <input type="hidden" name="time_final_started" id="time_final_started"/>
<h2 style="margin-top: 20px">Final Questions (1/2)</h2>  
    <p class="legend">Which disease was mentioned in this study?</p>
    <!-- <p id="helper-text">Your answer to this question WILL affect your payment.</p> -->
      <div class="cml_row"><label><input type="radio" name="test_question" value="measles" required> Measles</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="meningitis" required> Meningitis</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="common_cold" required> Common cold</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="ebola" required> Ebola</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="zika_virus" required> Zika virus</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="typhoid_fever" required> Typhoid fever</input></label></div>
    <p class="legend">In the scenario described on the second page, how many people took the drug?</p>
    <div class="cml_row"><label><input type="number" name="attention_people"></input> people</label></div>



    <button type="button" onclick="finishedFinalQuestions()">Next</button>
</div>





<div id="comments" style="display: none;">
<h2 style="margin-top: 20px">Final Questions (2/2)</h2>  


  <div class="task-description"><h2 class="legend">Do you generally believe in science?</h2>
<div class="cml_row">
  
<table>
  <thead>
    <tr>
      <th></th>
      
      <th class="likert">1</th>
      
      <th class="likert">2</th>
      
      <th class="likert">3</th>
      
      <th class="likert">4</th>
      
      <th class="likert">5</th>
      
      <th class="likert">6</th>
      
      <th class="likert">7</th>
      
      <th class="likert">8</th>
      
      <th class="likert">9</th>
      
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Not at all </td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="1" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="2" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="3" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="4" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="5" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="6" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="7" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="8" class="belief_in_science validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_science" type="radio" value="9" class="belief_in_science validates-required validates" required="">
</td>
      
      <td> Very much</td>
    </tr>
  </tbody>
</table>
</div>
</div>
<hr>
  <div class="ratings cml_field"><h2 class="legend">The drug we mentioned was fictional. Nevertheless, do you think that a large pharmaceutical company can design an effective drug for preventing the common cold?</h2>
<div class="cml_row">
  
<table>
  <thead>
    <tr>
      <th></th>
      
      <th class="likert">1</th>
      
      <th class="likert">2</th>
      
      <th class="likert">3</th>
      
      <th class="likert">4</th>
      
      <th class="likert">5</th>
      
      <th class="likert">6</th>
      
      <th class="likert">7</th>
      
      <th class="likert">8</th>
      
      <th class="likert">9</th>
      
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Extremely unlikely </td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="1" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="2" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="3" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="4" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="5" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="6" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="7" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="8" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td class="likert"><input name="belief_in_drug" type="radio" value="9" class="belief_in_drug validates-required validates" required="">
</td>
      
      <td> Extremely likely</td>
    </tr>
  </tbody>
</table>
</div>
</div>
<hr>
  <p class="legend">Do you have any comments on this study? <i>(optional)</i></p>
  <textarea name="comments" rows="6" cols="80"></textarea>
          <div class="submit">
        <input id="check" type="submit" class="submit" value="Finish">
      </div>
    </div>

</form>
  </div>
  


    <div id="footer">
</div>





  

</body>
</html>
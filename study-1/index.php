<?php header("Cache-Control: no-cache, must-revalidate");?>
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


<div id="content">
<form name="answers" method="POST" action="./export.php">
<?php 
$start_code = $_GET["start_code"];
if(hexdec($start_code) < 701400) {
  $condition = 0;
} else {
  $condition = 1;
}
//$condition = mt_rand(1,100) % 2;
?>
<div id="replication">
  <div class="task-description" id="graph_box">
    <p>A large pharmaceutical company has recently developed a new drug to boost peoples' immune function. It reports that trials it conducted demonstrated a drop of forty percent (from eighty seven to forty seven percent) in occurrence of the common cold. It intends to market the new drug as soon as next winter, following FDA approval.</p>
    <input type="hidden" name="condition" value=<?php if ($condition == 0) {
      echo '"graph"';
    } else {
      echo '"no_graph"';
    }
     ?>>
    <input type="hidden" name="start_code" value=<?php echo '"' . $start_code . '"';?>>
    <input type="hidden" name="start_time" value=<?php echo '"' . time() . '"';?>>
    <?php if ($condition == 0) {
      echo '<p><img id="graph" src="../exp1_graph.jpg"></p>';
    }
    ?>

    
  </div>
  
  <hr>

  <div class="ratings cml_field"><h2 class="legend">How effective is the new medication?</h2>
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
      <td>Not at all effective </td>
      
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
      
      <td> Very effective</td>
    </tr>
  </tbody>
</table>
</div>
</div>
<hr>
  <div class="radios cml_field"><h2 class="legend">Does the medication really reduce illness?</h2>
  <div class="cml_row"><label class=""><input name="does_the_medication_really_reduce_illness" type="radio" value="yes" class="does_the_medication_really_reduce_illness validates-required validates">
 Yes</label></div>
<div class="cml_row"><label class=""><input name="does_the_medication_really_reduce_illness" type="radio" value="no" class="does_the_medication_really_reduce_illness validates-required validates">
 No</label></div>

</div>


<button type="button" onclick="finishedReplication()">Next</button>



    </div>
    
    
    
    
    
    <div id="comprehension" style="display:none">
        <p style="margin-top: 15px"><img id="people" src="http://yvonnejansen.me/study_material/20people.jpg"/></p>
    <div class="task-description">
    <p>Suppose the findings reported by the pharmaceutical company are accurate. Imagine a group of 20 people who would <strong>all</strong> get the common cold without the medication. Now suppose we give the medication to all of them.</p> 
    <h2 class="legend">How many do you think will still get the common cold?</div>
    </h2>
    <p id="helper-text">Don't try to compute an exact answer. Just give us your best guess.</p>
    <label class=""><input id="comprehension_input" name="comprehension" type="number" min="0" max="20" class="comprehension validates-required validates">&nbsp;out of 20</label>
    
    <button type="button" onclick="finishedComprehension()">Next</button>

    </div>
    
    
    
    
    <div id="previous-studies" style="display:none">
    <div id="explain_no_answer"  style="display: none">
    <p class="legend">On the first page, you answered "No" to the question "Does the medication really reduces illness?" Why did you choose this answer?</p>
    <div class="cml_row"><input id="why_no" type="text" name="why_no"></div>
    </div>
        
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
<!-- <hr> -->
    <p class="demographics">
    <div class="legend">What is your gender?</div>
      <div class="cml_row"><label><input type="radio" name="gender" value="female"> Female</input></label></div>
      <div class="cml_row"><label><input type="radio" name="gender" value="male"> Male</input></label></div>
      <div class="cml_row"><label><input type="radio" name="gender" value="no_answer"> Other</input></label></div></p>
<!-- <hr> -->
    <p class="legend" style="clear: left;">What is your highest level of education?</p>
      <div class="cml_row"><label><input type="radio" name="education" value="high-school"> Finished high school or equivalent</input></label></div>
      <div class="cml_row"><label><input type="radio" name="education" value="some_college"> Some college education</input></label></div>
      <div class="cml_row"><label><input type="radio" name="education" value="college_or_more"> 4-year college or more</input></label></div>
      <div class="cml_row"><label><input type="radio" name="education" value="neither"> None of the above</input></label></div>

    <button type="button" onclick="finishedPreviousStudies()">Next</button>
</div>



<div id="test_and_comments" style="display: none;">
  <h2 style="margin-top: 20px">Final Question</h2>  
    <p class="legend">Which disease was mentioned in this study?</p>
    <!-- <p id="helper-text">Your answer to this question WILL affect your payment.</p> -->
      <div class="cml_row"><label><input type="radio" name="test_question" value="measles" required> Measles</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="meningitis" required> Meningitis</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="common_cold" required> Common cold</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="ebola" required> Ebola</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="zika_virus" required> Zika virus</input></label></div>
      <div class="cml_row"><label><input type="radio" name="test_question" value="typhoid_fever" required> Typhoid fever</input></label></div>
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
<link rel="stylesheet" type="text/css" href="../../Converge/css/form-style.css">
<script src="../../Converge/js/formSubmit.js" type="text/javascript">
</script>
<div class="hidden event-name">inquizitive</div>
<form class="cmxform" id="event-form" name="inquizitive"  method="POST" >
<fieldset>


<!--
<p>
<label>Year</label>  
                        <select style="width: 236px" id="year" name="year">
                          <option value="1">Undergraduate 1st year</option>
                          <option value="2">Undergraduate 2nd year</option>
                          <option value="3">Undergraduate 3rd year</option>
                          <option value="4">Undergraduate 4th year</option>
                         
                       </select>
</p>
-->
<!--
<p>
<label for="dform">Dance Form</label>
<input id="dform" name="dform" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>
-->

<p>
<label for="tmem">Team Members</label>

<select name="team_members" id="team_members" onchange="(document.getElementById('team_members').value > 1) ? (document.getElementById('participant2').style.display = 'inline-block', document.getElementById('cemail2').required = true, document.getElementById('phone2').required = true, document.getElementById('email2').required = true, document.getElementById('ccol2').required = true, document.getElementById('course2').required = true): (document.getElementById('participant2').style.display = 'none',document.getElementById('event-form').reset(),document.getElementById('cemail2').required = false, document.getElementById('phone2').required = false, document.getElementById('email2').required = false, document.getElementById('ccol2').required = false, document.getElementById('course2').required = false)">
                              
                                                                     
                                                                      <option id="1" value="1">1</option>
                                                                      <option id="2" value="2">2</option>                                                                  													
                              </select>
</p>

<p>
<div class="open-arrow"></div><label for="cemail">Personal Details - Participant 1</label><br>
<label for="cemail">Full Name</label>
<input id="cemail" type="text" name="firstname1"  minlength="2" pattern="[A-Za-z-']+\s[A-Za-z-']+" title="Firstname Lastname" required>
</p>

<p>
<label>Year</label>  
                        <select style="width: 236px" id="year1" name="year1">                       
						  <option value="1">Undergraduate 1st year</option>
                          <option value="2">Undergraduate 2nd year</option>
                          <option value="3">Undergraduate 3rd year</option>
                          <option value="4">Undergraduate 4th year</option>
                          <option value="5">Undergraduate/Dual Degree 5th year</option>
						  <option value="6">Postgraduation</option>
						  <option value="0">School Student</option>
                       </select>
</p>

<p>
<label for="course1">Course (CSE,ECE,etc.)</label>
<input id="course1" name="course1" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>
<!--
<p>
<label for="cemail">Last Name</label>
<input id="cemail" type="text" name="lastname1"  minlength="2" pattern="[A-Za-z ]{1,30}" required>
</p>
-->
<p>
<label for="ccol">College</label>
<input id="ccol1" name="college1" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>

<p>
<label for="cemail">Phone</label>
<input id="phone1"  name="phone1" type="type" minlength="10" maxlength="10" pattern="[789]{1}[0-9]{9}" required>
</p>

<p>
<label for="cemail">E-Mail (required)</label>
<input id="cemail" type="email" name="email1" required>
</p>

<div id="participant2" style="display:none;">
<p>
<div class="open-arrow"></div><label for="cemail">Personal Details - Participant 2</label><br>
<label for="cemail">Full Name</label>
<input id="cemail2" type="text" name="firstname2"  minlength="2" pattern="[A-Za-z-']+\s[A-Za-z-']+" title="Firstname Lastname">
</p>

<!--
<p>
<label for="cemail">Last Name</label>
<input id="cemail" type="text" name="lastname1"  minlength="2" pattern="[A-Za-z ]{1,30}" required>
</p>
-->

<p>
<label>Year</label>  
                        <select style="width: 220px" id="year2" name="year2">
                          <option value="1">Undergraduate 1st year</option>
                          <option value="2">Undergraduate 2nd year</option>
                          <option value="3">Undergraduate 3rd year</option>
                          <option value="4">Undergraduate 4th year</option>
                          <option value="5">Undergraduate/Dual Degree 5th year</option>
						  <option value="6">Postgraduation</option>
						  <option value="0">School Student</option>
                       </select>
</p>

<p>
<label for="course2">Course <br>(CSE,ECE,etc.)</label>
<input id="course2" name="course2" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}">
</p>

<p>
<label for="ccol">College</label>
<input id="ccol2" name="college2" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}">
</p>

<p>
<label for="cemail">Phone</label>
<input id="phone2"  name="phone2" type="type" minlength="10" maxlength="10" pattern="[789]{1}[0-9]{9}">
</p>

<p>
<label for="cemail">Email (required)</label>
<input id="cemail" type="email" name="email2">
</p>
</div>

<p>
<input class="submit submit-form" type="submit" value="Submit">
</p>
</fieldset>
</form>
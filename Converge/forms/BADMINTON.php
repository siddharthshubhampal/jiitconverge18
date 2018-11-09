<!--<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>Awww Snap. Looks like you were a bit too late. Be a part of us next year.</div>-->
<link rel="stylesheet" type="text/css" href="../../Converge/css/form-style.css">
<script src="../../Converge/js/formSubmit.js"></script>
<div class="hidden event-name">badminton</div>
<form class="cmxform" id="event-form" name="badminton"  method="POST" >
<fieldset>


<p>
<label for="ccol">College</label>
<input id="ccol" name="college" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>
  <!-- 
<p>
<label>Event</label>  
                     <select style="width: 236px" id="event_type" name="event_type" 
                                onchange="(document.getElementById('event_type').value > 1) ? (document.getElementById('team_mem').style.display = 'block', document.getElementById('label_details').innerHTML='Team Captain Details') : (document.getElementById('team_mem').style.display = 'none', document.getElementById('event-form').reset(),document.getElementById('label_details').innerHTML='Personal Details')">
                <option value="1">Singles</option>
                          <option value="2">Team</option>                         
                       </select> 
</p>
 <p style="margin-left:20%;width:75%;text-align:right; font-color:#ccc;"> Singles event will only take place depending upon the number of registrations and available time slots.
	</p> -->
<p>
<label>Girls/Boys</label>  
                        <select style="width: 236px" id="gender" name="gender" 
                                onchange="(document.getElementById('gender').value > 1) ? (document.getElementById('3').disabled = true, document.getElementById('team_members').value = 4) : (document.getElementById('3').disabled = false)">
                          <option value="1">Girls</option>
                          <option value="2">Boys</option>                         
                       </select>
</p>
<br>

<div id="team_mem" style="display: block;">    <!--display:none for single and team event -->
<p>
<label for="tmem">Team Members</label>
<select name="team_members" id="team_members" required>                                                                                                                                                                                                                                              
                                                                      <option id="5" value="5">5</option>
                                                                      <option id="4" value="4">4</option>
                                                                      <option id="3" value="3">3</option>
                              </select>
</p>
</div>
<br>

<p>
<div class="open-arrow"></div><label for="cemail" id="label_details">Team Captain Details</label><br>
<label for="cemail">First Name</label>
<input id="cemail" type="text" name="firstname1"  minlength="2" pattern="[A-Za-z-']+\s[A-Za-z-']+" title="Firstname Lastname" required>
</p>

<!--
<p>
<label for="cemail">Last Name</label>
<input id="cemail" type="text" name="lastname1"  minlength="2" pattern="[A-Za-z ]{1,30}" required>
</p>
-->

<p>
<label for="cemail">Phone</label>
<input id="phone1"  name="phone1" type="type" minlength="10" maxlength="10" pattern="[789]{1}[0-9]{9}" required>
</p>

<p>
<label for="cemail">E-Mail (required)</label>
<input id="cemail" type="email" name="email1" required>
</p>


<p>
<input class="submit submit-form" type="submit" value="Submit">
</p>
</fieldset>
</form>
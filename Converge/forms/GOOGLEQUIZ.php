<link rel="stylesheet" type="text/css" href="../../Converge/css/form-style.css">
<script src="../../Converge/js/formSubmit.js" type="text/javascript">
</script>
<div class="hidden event-name">googlequiz</div>
<form class="cmxform" id="event-form" name="googlequiz"  method="POST" >
<fieldset>
<p>
<label for="tmem">Team Members</label>
<!--onchange="(document.getElementById('team_members').value > 1) ? (document.getElementById('participant2').style.display = 'inline-block', document.getElementById('cemail2').required = true, document.getElementById('phone2').required = true, document.getElementById('email2').required = true, document.getElementById('ccol2').required = true): (document.getElementById('participant2').style.display = 'none',document.getElementById('event-form').reset(),document.getElementById('cemail2').required = false, document.getElementById('phone2').required = false, document.getElementById('email2').required = false, document.getElementById('ccol2').required = false)"-->
<select name="team_members" id="team_members">
                              
                                                                     
                                                                      <option id="1" value="1">1</option>
                                                                      <option id="2" value="2">2</option>                                                                  													
                              </select>
</p>

<p>
<label for="cname">Teamname</label>
<input id="cname" name="teamname" minlength="2"  type="username" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>

<p>
<div class="open-arrow"></div><label for="cemail">Personal Details - Participant/Team Representative</label><br>
<label for="cemail">Full Name</label>
<input id="cemail" type="text" name="firstname1"  minlength="2" pattern="[A-Za-z-']+\s[A-Za-z-']+" title="Firstname Lastname" required>
</p>

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


<p>
<input class="submit submit-form" type="submit" value="Submit">
</p>
</fieldset>
</form>
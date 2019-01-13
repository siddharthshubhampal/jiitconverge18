<link rel="stylesheet" type="text/css" href="/mobile/Converge/css/form-style.css">
<script src="/mobile/Converge/js/formSubmit.js"></script>
<div class="hidden event-name">informals</div>
<form class="cmxform" id="event-form" name="informals" method="POST" >
<fieldset>


<p class="hidden">
				<label for="event">Event</label>
				<select name="event" id="event">
                              <option id="Paper Folding Dance" value="Paper Folding Dance">Paper Folding Dance</option>                                              									
</select>
</p>
	
<p>
<label for="ccol">College</label>
<input id="ccol" name="college" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>

<p class="hidden">
<label for="tmem">Team Members</label>
<select name="team_members" id="team_members">
                              
                                                                     
                                                                    <option id="1" value="1">1</option>
																   
</select>
</p>



<p>
<div class="open-arrow"></div><label for="cemail">Personal Details</label><br>
<label for="cemail">Full Name</label>
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
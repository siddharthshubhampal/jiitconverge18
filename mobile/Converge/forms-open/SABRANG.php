<link rel="stylesheet" type="text/css" href="/mobile/Converge/css/form-style.css">
<script src="/mobile/Converge/js/formSubmit.js"></script>
<div class="hidden event-name">sabrang</div>
<form class="cmxform" id="event-form" name="sabrang" method="POST" >
<fieldset>

<p>
<label for="cname">Teamname</label>
<input id="cname" name="teamname" minlength="2"  type="username" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>

<p>
<label for="ccol">College</label>
<input id="ccol" name="college" minlength="2"  type="text" pattern="[A-Za-z,-_ ]{1,60}" required>
</p>

<p>
<label for="tmem">Team Members</label>
<select name="team_members" id="team_members">
                              
                                                                     


                                                                      <option id="8" value="8">8</option>
                                                                      <option id="9" value="9">9</option>
                                                                      <option id="10" value="10">10</option>
                                                                      <option id="11" value="11">11</option>
                                                                      <option id="12" value="12">12</option>
                                                                      <option id="13" value="13">13</option>
                                                                      <option id="14" value="14">14</option>
                                                                      <option id="15" value="15">15</option>
                                                                      <option id="16" value="16">16</option>														
                              </select>
</p>

<p>
<label>Year</label>  
                        <select style="width: 236px" id="year" name="year">
                          <option value="1">Undergraduate 1st year</option>
                          <option value="2">Undergraduate 2nd year</option>
                          <option value="3">Undergraduate 3rd year</option>
                          <option value="4">Undergraduate 4th year</option>
                         
                       </select>
</p>

<p>
<div class="open-arrow"></div><label for="cemail">Team Head Details</label><br>
<label for="cemail">First Name</label>
<input id="cemail" type="text" name="firstname1"  minlength="2" pattern="[A-Za-z ]{1,30}" required>
</p>

<p>
<label for="cemail">Last Name</label>
<input id="cemail" type="text" name="lastname1"  minlength="2" pattern="[A-Za-z ]{1,30}" required>
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
<div class="open-arrow"></div><label for="cemail">Team Representative Details</label><br>
<label for="cemail">First Name</label>
<input id="cemail" type="text" name="firstname2" pattern="[A-Za-z ]{1,30}" >
</p>

<p>
<label for="cemail">Last Name</label>
<input id="cemail" type="text" name="lastname2" pattern="[A-Za-z ]{1,30}" >
</p>

<p>
<label for="cemail">Phone</label>
<input id="ph"  name="phone2" type="text" minlength="10" maxlength="10" pattern="[789]{1}[0-9]{9}">
</p>

<p>
<label for="cemail">E-Mail (required)</label>
<input id="cemail" type="email" name="email2" >
</p>

<p>
<input class="submit submit-form" type="submit" value="Submit">
</p>
</fieldset>
</form>
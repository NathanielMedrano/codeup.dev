<?php

echo "<p>GET:</p>";
var_dump($_GET);

echo "<p>POST:</p>";
var_dump($_POST);

?>




<html>
<head>
    <title>Form Page</title>
</head>
<h2>User Login</h2>
<form method="POST" action="">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Enter Username">
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter Password">
    </p>
    <p>
        <!--<input name="submit" value="login" type="submit"> -->
        <button type="submit">Login</button>
    </p>
</form>
    <h2>Email Info</h2>
<form>
    <p>
        <label for="username">TO:</label>
        <input type="text" id="first_name" name="first_name" value="" placeholder="example@you.com">
    </p>
    <p>
        <label for="email">FROM:</label>
        <input id="email" name="email" type="email" placeholder="example@me.com">
    </p>
     <p>
        <label for="username">SUBJECT:</label>
        <input type="text" id="first_name" name="first_name" value="" placeholder="Memo">
    </p>
    <p>
        <label for="password">BODY:</label>
    </p>
    <p>
        <textarea id="email_body" name="email_body" rows="5" cols="20" placeholder="Hello..."></textarea>
        
    </p>
        <!--<input name="submit" value="login" type="submit"> -->
        <button type="submit">Submit</button>
</form>

<label for="mail_back">
    <input type="checkbox" id="mail_back" name="mailing_back" value="yes" checked> Email a copy to you?
</label>


<h2>Test Questions</h2>

<form method="POST" action="http://requestb.in/r5hg16r5">
    <p>
        How much wood, would a wood chuck chuck, if a wood chuck could chuck wood?
    </p>
    <p>
        <label for="ans1"><input type="radio" id="ans1" name="ans" value="five"> 5</label>
    </p>
    <p>
        <label for="ans2"><input type="radio" id="ans2" name="ans" value="hundred"> 100</label>
    </p>
    <p>
        <label for="ans3"><input type="radio" id="ans3" name="ans" value="chuck"> None. Chuck Norris chucked them all already.
        </label>
    </p>
    </p>
</form>

    <h2>Select Testing</h2>

<form>

</form><label for="question">Did you have a nice day? </label>
    <select id="question" name="question">
    <option value="1">Yes</option>
    <option value="2">No</option>
</select>
</html>
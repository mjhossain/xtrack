<?php
include('signup.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Contact Form</title>
      <style>
          html{
              box-sizing: border-box;
          }
          .sign-up-form{
              width: 200px;
              margin: auto;
              position: absolute;
              left: 50%;
              top: 50%;
              transform: translate(-50%,-50%);
              text-align: center;
          }
          input[type='text'],input[type='email'],input[type='password']{
              width: 100%;
              box-sizing : border-box;
              border: 1px solid #dfdfdf;
          }
          input{
              padding: 10px;
              font-size: 1.3em;
              margin-bottom: 10px;
              border-radius: 5px;
              outline: none;
          }
          input:focus{outline: none;}
          input[type='submit']{
              width: 100%;
              background-color: #2A34E2;
              color: aliceblue;
              border: none;
              cursor: pointer;
          }
          p.error-msg{
              margin-top: 0;
              color: red;
              text-align: left;
              display: none;
          }
          ul.password-list{
              margin: 0;
              text-align: left;
              color: grey;
              margin-bottom: 15px;
          }
          ul li.valid{
              color: limegreen;
          }
      </style>
  </head>
  <body>
    <form id="sign-up-form" class="sign-up-form" action="index.php" method="post" onsubmit="event.preventDefault(); ">
        <h1>Sign Up Form</h1>
        <input type="text" id="name" name="full_name" value="" placeholder="Full Name" oninput="removeErrors();" autofocus>
        <p class="error-msg" id="name-err">error</p>
        <input type="email" id="email" name="email" value="" placeholder="Email Address" oninput="removeErrors();">
        <p class="error-msg" id="email-err">error</p>
        <input type="password" id="password" name="password" placeholder="Password" oninput="passwordCheck()">
        <p class="error-msg" id="pass-err">error</p>
        <ul class="password-list" id="passwordlist">
            <p>You password must</p>
            <li id="has-char">at least be 8 characters long</li>
            <li id="has-num">contain at least one number</li>
            <li id="has-lowerc">contain at least one lowercase letter</li>
            <li id="has-upperc">contain at least one uppercase letter</li>
        </ul>
        <input type="password" id="conf-password" name="con-password" placeholder="Confirm Password" oninput="removeErrors();">
        <p class="error-msg" id="con-pass-err">error</p>
        <input type="Submit" name="submit" value="Submit" onclick="validateForm();passwordCheck();isValid();">
    </form>
    <script src="script.js"></script>
  </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Register</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<div class="container">
<form id="register" action = "register.php" method="post">
<fieldset>
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="username" >Username:</label>
<input type="text" name="username" id="username" placeholder="Username" maxlength="50" /><br />
<label for="email" >Email:</label>
<input type="text" name="email" id="email" placeholder="Email address" maxlength="50" /><br />
<label for="password" >Password:</label>
<input type="password" name="password" id="password" placeholder="Password" maxlength="50" />
<label for="password" >Password Confirmation:</label>
<input type="password" name="password_confirmation" id="password" placeholder="Password" maxlength="50" />
<!-- Recaptcha -->
<script type="text/javascript">
  var RecaptchaOptions = {
     theme : 'custom',
     custom_theme_widget: 'recaptcha_widget'
  };
</script>
<div id="recaptcha_widget" style="display:none">
  <div class="control-group">
      <label class="control-label">reCAPTCHA</label>
      <div class="controls">
          <a id="recaptcha_image" class="thumbnail"></a>
          <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
      </div>
  </div>
     <div class="control-group">
         <label class="recaptcha_only_if_image control-label">Enter the words above:</label>
        <label class="recaptcha_only_if_audio control-label">Enter the numbers you hear:</label>

        <div class="controls">
            <div class="input-append">
                <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="input-recaptcha" />
                <a class="btn" href="javascript:Recaptcha.reload()"><i class="icon-refresh"></i></a>
                <a class="btn recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')"><i title="Get an audio CAPTCHA" class="icon-headphones"></i></a>
                <a class="btn recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')"><i title="Get an image CAPTCHA" class="icon-picture"></i></a>
              <a class="btn" href="javascript:Recaptcha.showhelp()"><i class="icon-question-sign"></i></a>
            </div>
        </div>
  </div>
</div>
<noscript>
Please enable scripts to view the recaptcha widget.</br>
</noscript>
<button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
</form>
</fieldset>
<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=6LekYdsSAAAAAJzQ7e8vf9QzbcQBwDfgZ106yfcM"></script>
</div>
</body>
</html>

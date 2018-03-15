<?php
    require 'PHPMailer/PHPMailerAutoload.php';

    $alert = "";
    if($_POST){
        
        if(!$_POST["email"]){
            $alert = "The email field is required <br> ";
        }

        if (!$_POST["contentTextArea"]) {
            $alert .= "The content field is required <br> ";
        }

        if (!$_POST["subject"]) {
            $alert .= "The subject field is required <br> ";
        }

        if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
            $alert .= "Invalid email address <br> ";
        }

        if ($alert != "") {
            $alert =  ' <div class=" container alert alert-danger role= "alert"><p><strong>There were error(s):</strong></p>'. $alert .'</div>';
        }
        else{
            $mail = new PHPMailer;
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'stepwany8@gmail.com';   // SMTP username
            $mail->Password = 'REStaTiOnsCuSeB';        // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom($_POST["email"]);
            $mail->addReplyTo($_POST["email"]);
            $mail->addAddress("someone@gmail.com");          // Add a recipient

            $mail->Subject = $_POST["subject"];
            $mail->Body    = $_POST["contentTextArea"];

            if(!$mail->send()) {
                $error = 'Message could not be sent <br>';
                $error .= 'Mailer Error: ' . $mail->ErrorInfo;
                $alert = '<div class="alert alert-danger container" role="alert"><strong>'.$error.'</strong></div>';
            } else {
                $alert .= '<div class="alert alert-success container" role="alert"><strong>Message sent. We will get back to you soon.</strong></div>';
            }

        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="scripts/main.js"></script>

    <title>Contact Form</title> 
  </head>
  <body>
      <div class="container">
          <h1>Contact Us</h1>
      </div>

      <div id="error"><?php echo $alert; ?></div>

      <div class="container">
          <form method = "post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name = "subject" class="form-control" id="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="contentTextArea">What would you like to ask us?</label>
                    <textarea class="form-control" name = "contentTextArea" id="contentTextArea" rows="3"></textarea>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>   
    
  </body>
</html>


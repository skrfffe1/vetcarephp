<?php
  include('security.php');
  require_once("connection.php");

  $sql_user="select user_id,username,name from users order by name asc";
  $res_user=mysqli_query($con,$sql_user);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="contact-form-16/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="contact-form-16/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="contact-form-16/css/style.css">

    <title>Manage Email Notification</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          

          <div class="row justify-content-center">
            <div class="col-md-6">
              
              <h3 class="heading mb-4">Let's talk about everything!</h3>
              <p>What do you think about Vetcare pet clinic ? if you ever have question pls visit us directly in Burgos street tacloban city well waiting for you !!!</p>

              <p><img src="contact-form-16/images/undraw-contact.svg" alt="Image" class="img-fluid"></p>


            </div>
            <div class="col-md-6">
              
              <form class="mb-5" action="send.php" method="post" id="contactForm" name="contactForm">
                <div class="row">
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <select class="form-control" name="to_id" required>

                          <option value="">Select User</option>
                            <?php while($row_user=mysqli_fetch_assoc($res_user)){?>
                          <option value="<?php echo $row_user['user_id']?>"><?php echo $row_user['username']?></option>
                        <?php } ?>

                    </select>

                  </div>
                </div>


                <div class="row">
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" name="messages" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                  </div>
                </div>  

                <div class="row">
                  <div class="col-12">
                    <input type="submit" value="Send Message" name="send" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                  </div>
                </div>

                <div class="row" style="margin-left: 330px; margin-top: -50px;">
                  <div class="col-12">
                    <a href="appointment.php" value="Return" class="btn btn-primary rounded-0 py-2.1 px-4">Return</a>
                  <span class="submitting"></span>
                  </div>
                </div>

              </form>

              <div id="form-message-warning mt-4"></div> 
              <div id="form-message-success">
                Your message was sent, thank you!
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

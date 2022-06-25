<html>
    <head>
        <title>Feedback form for E-Pharmacy site</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='custom.css' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">

                    <h1>Feedback form for E-Pharmacy site <a href="https://e-pharmacy01.netlify.app/">E_Pharmacy</a></h1>

                    <p class="lead">Your Feedback Is Important For Us.</p>


                    <form id="contact-form" method="post" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *"  data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *"  data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone *" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="ok" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> These fields are required. Feedback form by <a href="https://e-pharmacy01.netlify.app/" target="_blank">E_Pharmacy</a>.</p>
                                </div>
                            </div>
                        </div>

                    </form>
            <?php 
            if(isset($_POST['ok'])){
                include_once 'function.php';

                $n = $_POST['name'];
                $s = $_POST['surname']; 
                $m = $_POST['phone'];
                if (empty($n)) {
                    echo '<span style="color:red;">Your credentials are required *</span>';
                    return false;
                } 
                        if (empty($s)) {
                            echo '<span style="color:red;">Your credentials are required *</span>';
                            return false;
                        }
                
                if (!preg_match ("/^[a-zA-Z\s]+$/", $n)) {
                    echo '<span style="color:red;">Enter these credentials as ONLY String *</span>'; 
                    return false;
                } 
                        if (!preg_match ("/^[a-zA-Z\s]+$/", $s)) {
                            echo '<span style="color:red;">Enter these credentials as ONLY String *</span>'; 
                            return false;
                        }
                
                if (!preg_match ('/^[0-9]*$/', $m)) {
                    echo '<span style="color:red;">Only mobile number required *</span>'; 
                    return false;
                }
                
                if(strlen($m)<10){
                    echo '<span style="color:red;">Please enter proper Mobile Number! *</span>';
                   return false;
                } 
                
                if(strlen($m)>10){
                    echo '<span style="color:red;">Your Mobile Number is out of range...enter valid number! *</span>'; 
                   return false;
                } 

                $obj=new Contact();
                $res=$obj->contact_us($_POST);
                if($res==true){
                    echo "<script>alert('Query successfully Submitted.Thank you')</script>";
                }else{
                    echo "<script>alert('Query successfully Submitted.Thank you')</script>";
                }
            }
            ?>

                </div><!-- /.8 -->

            </div> <!-- /.row-->

        </div> <!-- /.container-->

        <!--  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="validator.js"></script>
        <script src="contact.js"></script> -->
        
    </body>
</html>

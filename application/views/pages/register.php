<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Registration</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


</head>
<body>

<span style="background-color:red;">
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
<div class="row"><!-- row class is used for grid system in Bootstrap-->
  <div class="page-header">
    <h3 class="text-center">Signup form</h3>
  </div>
    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Please do Registration here</h3>
            </div>
            <div class="panel-body">
              <?php 

              $attribute_form = array(
                'role'=> 'form', 
                'method'=> 'post', 
                'class'=> 'register_form', 
                'id'=> 'register_form'
              );
              echo form_open("user/register_submit", $attribute_form);
              echo form_fieldset();

              $data_name = array(
                'type'=> 'text',
                'name'=> 'user_name', 
                'class'=> 'form-control', 
                'placeholder'=> 'Please enter Name',
                'autofocus'=> true
              );
              echo "<div class='form-group'>".form_input($data_name)."</div>";              

              $data_email = array(
                'type'=> 'email', 
                'name'=> 'user_email', 
                'class'=> 'form-control', 
                'placeholder'=> 'Please enter E-mail',
                'autofocus'=> true
              );
              echo "<div class='form-group'>".form_input($data_email)."</div>";

              $data_pswd = array(
                'name'=> 'user_password', 
                'class'=> 'form-control', 
                'placeholder'=> 'Enter Password'
              );
              echo "<div class='form-group'>".form_password($data_pswd)."</div>";

              $data_age = array(
                'type'=> 'number', 
                'name'=> 'user_age', 
                'class'=> 'form-control', 
                'placeholder'=> 'Enter your age'
              );
              echo "<div class='form-group'>".form_input($data_age)."</div>";

              $data_mb = array(
                'type'=> 'number', 
                'name'=> 'user_mobile', 
                'class'=> 'form-control', 
                'placeholder'=> 'Enter your mobile No.'
              );
              echo "<div class='form-group'>".form_input($data_mb)."</div>";

              $data_btn = array(
                'type'=> 'submit',
                'name'=> 'register',
                'class'=> 'btn btn-lg btn-success btn-block',                
                'value'=> 'Register'
              );
              echo form_submit($data_btn);
              
              echo form_fieldset_close();
              echo form_close();
              ?>

<!--               <form role="form" method="post" action="jfkgjfk">
                    <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Please enter Name" name="user_name" type="text" autofocus>
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Please enter E-mail" name="user_email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="">
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Enter Age" name="user_age" type="number" value="">
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Enter 10 diMobile No" name="user_mobile" type="number" value="">
                        </div>

                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                    </fieldset>
                </form> -->

              <center>
                <b>You have Already registered ?</b> <br>
                <a href="<?php echo base_url('user'); ?>"> Please Login</a>
              </center><!--for centered text-->
            </div>
        </div>
    </div>
</div>
</div>





</span>




</body>
</html>
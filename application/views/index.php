<style type="text/css">
.error_msg{
color:red
}

</style>
<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>
<?php error_reporting(0);
ini_set('display_errors', 1);?>


    <div class="page-title" style=" background-repeat:no-repeat;background-image: url('');?>">
        
        <?php if(isset($flash_message)){?>
</div>
</div>
</div>
</br>
    <div class="box-header">
    <div class="col-lg-12">
<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Invalid username. or Password !!
</div>
</div>
    <?php }?>
</div>
</div>
   <section id="contact-page">
        <div class="container">
            <div class="large-title text-center">        
               
                <div>
                
</div>
</div>
    <div class="col-lg-12"> 
<form  class="contact-form" action="signin"  method="post" >
<div class="col-lg-12">
<div class="form-group">
                            <label style="color:black;">Email *</label>
                            <input type="email" name="username" id="email" class="form-control"required="required" >
                            <p class = "error_msg"><?php echo form_error('username'); ?> </p>
                          </div>
                       
                         <div class="form-group">
                            <label style="color:black;">password*(PASSWORD LENGTH MUST BE 9 TO 15 CHARACTERS)</label>
                            <input type="password" name="password"  id="password" class="form-control" required="required" >
                            <p class = "error_msg"><?php echo form_error('password'); ?> </p>
                            
                            <button type="submit" id="submit" value='login' class="btn btn-primary btn-lg" >Login </button>
                        </div>
                         <center> <p><a href="<?=base_url()?>registration" style="color:#348eff">Already have an Account ? sign up</a></p></center> </div>
                                          
                    </div>
                    
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->


   <?php $this->load->view('footer');?>
   <script>
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        function isValid(phone) {
        var phoneRe = /^[2-9]\d{2}[2-9]\d{2}\d{4}$/;
 
            return phoneRe.test(phone);
        }

        $('#submit').on('click', function () {
            $(".error_msg").html('');

            
            if ($('#email').val() == '') {
                $('#email').next(".error_msg").html('Please enter email id ');
                $('#email').focus();
               
                return false;
            }
         
            if (!isEmail($('#email').val())) {
                $('#email').next(".error_msg").html('Please enter a valid email id ');
                $('#email').focus();
                
                return false;

            }
           
            
        
            
			if ($('#password').val() == '') {
                $('#password').next(".error_msg").html('Please enter password');
                $('#password').focus();
                return false;
            }
            if (($('#password').val().length<9) ||($('#password').val().length>15)){
                $('#password').next(".error_msg").html('Please enter password between 9 to 15 characters');
                $('#password').focus();
                return false;
            }
           
           
            
           
        });




     
    </script>
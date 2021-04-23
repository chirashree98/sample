

<?php $this->load->view('header'); ?>

<style type="text/css">
.error_msg{
color:red
}
.error_msgs{
color:red
}
.error_msgss{
color:red
}
.error_msg2{
color:red
}
.error_msg3{
color:red
}
</style>



    <div class="page-title" style=" background-repeat:no-repeat;background-image: url('');?>">
        

</div>
   <section id="contact-page">
        <div class="container">
            <div class="large-title text-center">        
               
                <div id="result" style="display:none;">
                   <div class="box-header">
                    
    <div class="col-md-12">
<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Thank You for sucessfully Registration</div>
        </div>
      </div>
                </div>
            </div> 
            <div class="row contact-wrap"> 
               
                <form  class="contact-form" id="user_form"  method="post" >
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="form-group">
                            <label style="color:black;" ><b>FulltName *</b></label>
                            <input type="text" name="name" id="name" class="form-control" >
							<p class = "error_msg"><?php echo form_error('name'); ?> </p>
                        </div>
                        <div class="form-group">
                            <label style="color:black;"><b>Email *</b></label>
                            <input type="email" name="username" id="email"  class="form-control" >
                            <p class = "error_msgs"><?php echo form_error('email'); ?> </p>
                             <p class="error_msg_email"><?php echo form_error('email'); ?></p>  
           
                        </div>
                        <div class="form-group">
                            <label style="color:black;"><b>Phone*</b></label>
                            <input type="number" name="phone" id="phone" class="form-control">
                            <p class="error_msgss"><?php echo form_error('phone'); ?></p>   
                            <p class="error_msg_phone"><?php echo form_error('phone'); ?></p>   
                        </div>
                         <div class="form-group">
                            <label style="color:black;"><b>password*(password length must be 9 to 15 characters)</b></label>
                            <input type="password" name="password"  id="password" class="form-control" 
                             >
							 <p class="error_msg2"><?php echo form_error('password'); ?></p>  
                          </div>
                        <div class="form-group">
                      <label style="color:black;"><b>confirm password*</b></label>
                            <input type="password" name="confirmpassword"  id="confirmpassword" class="form-control">
			<p class="error_msg3"><?php echo form_error('confirmpassword'); ?></p>   
                          
                           
              </div>
                             <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg" >Submit </button>
                        </div>
                       
                    
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
      </div>
        <div class="row contact-wrap"> 
        <div class="form-group">
                           <center> <p><a href="<?=base_url()?>signin" style="color:#348eff">Already have an Account ? sign in</a></p></center> </div>             
                    </div></div>
                    </div>
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
			$(".error_msgs").html('');
				$(".error_msgss").html('');
				$(".error_msg2").html('');
				$(".error_msg3").html('');


            if ($('#name').val() == '') {
                $('#name').next(".error_msg").html('Please enter Full name');
                $('#name').focus();
                return false;
            }
            if ($('#email').val() == '') {
                $('#email').next(".error_msgs").html('Please enter email id ');
                $('#email').focus();
               
                return false;
            }
         
            if (!isEmail($('#email').val())) {
                $('#email').next(".error_msgs").html('Please enter a valid email id ');
                $('#email').focus();
                
                return false;

            }
           
            
            if ($('#phone').val() == '') {
                $('#phone').next(".error_msgss").html('Please enter mobile number');
                $('#phone').focus();
                return false;
            }
            if (!isValid($('#phone').val())) {
                $('#phone').next(".error_msgss").html('Please enter a valid phone no ');
                $('#phone').focus();
                return false;

            }
           
            
			if ($('#password').val() == '') {
				
                $('#password').next(".error_msg2").html('Please enter password');
				
                $('#password').focus();
                return false;
            }
            if (($('#password').val().length<9) ||($('#password').val().length>15)){
                $('#password').next(".error_msg2").html('Please enter password between 9 to 15 characters');
                $('#password').focus();
                return false;
            }
           
            if ($('#confirmpassword').val() == '') {
                $('#confirmpassword').next(".error_msg3").html('Please enter confirm password');
                $('#confirmpassword').focus();
                return false;
            }
            if (($('#confirmpassword').val()) !=($('#password').val())) {
                $('#confirmpassword').next(".error_msg3").html('Password and confirm password not match');
                $('#confirmpassword').focus();
                return false;
            }
            else{
                $('#confirmpassword').next(".error_msg3").html('Password and confirm password match'); 
            }
            
           
        });




     
    </script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script type="text/javascript">
    $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();  
           var username = $('#username').val();  
           var phone = $('#phone').val();  
           var name = $('#name').val();
             var password = $('#password').val();
             var confirmpassword = $('#confirmpassword').val();
             if(name == ''  || username =='' ||  phone ==''|| password=='' || confirmpassword =='' )  {
              alert('Both fields  are required');
             }
         
    if(password == confirmpassword){
          if(name != ''  && username !='' &&  phone !=''&& password.length !='' &&  confirmpassword!='')  
           {  
                $.ajax({  
                     url:"<?php echo base_url()?>registration",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false, 
                     cache:false,
                     async:false,
                     success:function(response)  
                     {  
                          //alert('Data submit Successfully');  
                          $('#user_form').hide();
                         $('#result').show();
  

                      }  
                });  
           }  
    }
           
      }); 
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>email_avilable",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                         //alert(data);
                          $('.error_msg_email').html(data); 
						  //$('.error_msgss').hide();
                     }  
                });  
           }  
      });  
 });  
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){  
      $('#phone').change(function(){  

           var phone = $('#phone').val();  
           if(phone != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>phone_avilable",  
                     method:"POST",  
                     data:{phone:phone},  
                     success:function(data){  
                          $('.error_msg_phone').html(data);  
                          //$('.error_msgss').hide();
                     }  
                });  
           }  
      });  
 });  
</script>
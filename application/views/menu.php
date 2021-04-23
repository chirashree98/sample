<?php 
error_reporting(0);
    ini_set('display_errors', 1);
$check='';
 $userdata=$this->session->all_userdata();
 if($_SESSION['id']&& !empty($_SESSION['id'])){
    $check="set";
 }
 ?>
 
<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                 
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <div class="social">
                    <ul class="social-share">
                         
                                
                            </ul>
                        </br>
                            <div class="top-number">
                           
                            <?php if($check=='set') {?>
                    <div class="collapse navbar-collapse navbar-right">
          <div class="col-md-6">
      <a href="<?php echo base_url();?>logouts"><h2 style ="color:red;font-family:germand;size:2px"> Logout</h2></a>
    </div></div>
</div>
   <?php }else{?>
    
       <div class="collapse navbar-collapse navbar-right">
          <div class="col-md-6">
        <a href="<?php echo base_url()?>registration">
          <h2 style ="color:red;font-family:germand;size:2px">Signup</h2></a></div>
          <div class="col-md-6"><a href="<?php echo base_url()?>signin">
           <h2 style ="color:red;font-family:germand;size:2px">Login</h2></a></div>
     </div>
   </div>
      </div>

      <?php
  }
  ?>
</div>
</div>

                </div>
            </div>
            <!--/.container-->
        </nav>
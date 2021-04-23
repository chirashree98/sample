<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            

   <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:1240px;  
                height:4000px;
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;
                margin-bottom:20px;  
           }  
           .color{
            color:pink;
           }
		   .error_msg{
			color:red;
		   }
      </style>  
 </head>  
 <body>  
 

      <div class="container box"> 
	  <a style="color:blank">Edit Product</a>
	  <form method="post" action="<?=base_url();?>edit_product/<?=$fetch[0]['id'];?>" enctype="multipart/form-data">
	  <input type="hidden" name="id"  value="<?=$fetch[0]['id'];?>">
		<td><label>product Name*</label>
		
			
		<input type="name" name="name" id="name" class="form-control" placeholder="Name" value="<?=$fetch[0]['name'];?>" required>
		<p class="error_msg"><?php echo form_error('name');?></p>
		</td>
		</tr>
		</br>
		<tr>
		<td><label>product Description*</label>
			
		<textarea name="description" class="form-control" id="description" placeholder="Description" required><?=$fetch[0]['description'];?></textarea>
		<p class="error_msg"><?php echo form_error('description');?></p>
		</td>
		</td>
		</tr>
		</br>
		<tr>
		<td><label>product Price*</label>
			
		<input type ="number" name="price" class="form-control" id="price" placeholder="Price" value="<?=$fetch[0]['price'];?>" required>
		<p class="error_msg"><?php echo form_error('price');?></p>
		</td>
		</td>
		</tr>
		</br>
		<tr>
		<td>
			<img src="<?= base_url();?>/images/<?=$fetch[0]['image'];?>" style="width:200px"></br>
			<label>product Image(Image)*</label>
			<input type="hidden" name="upload" value="<?=$fetch[0]['image'];?>">
		<input type ="file" name="images" class="form-control" id="image"  >
		<p class="error_msg"><?php echo form_error('image');?></p>
		</td>
		</td>
		</tr>
		
		<tr>
		</br>
		<td>
		<input type ="submit" name="Submit"  id="submit" value="Edit" class="btn btn-primary btn-lg upload"></td>
		
		</tr>
		
		
		
</table>
</form>
</div>
</div>
</div>
</span>
</body>
<script>

        $('#submit').on('click', function () {
			
            $(".error_msg").html('');

            if ($('#name').val() == '') {
				
                $('#name').next(".error_msg").html('Please enter product name');
                $('#name').focus();
                return false;
            }
            if ($('#description').val() == '') {
                $('#description').next(".error_msg").html('Please enter product description');
                $('#description').focus();
               
                return false;
            }
         if ($('#price').val() == '') {
                $('#price').next(".error_msg").html('Please enter product price');
                $('#price').focus();
               
                return false;
            }
			
         
            
         
           
        });
		</script>
		 <script type="text/javascript">
    $(function () {
        $(".upload").bind("click", function () {
            if (typeof ($("#image")[0].files) != "undefined") {
                var size = parseFloat($("#image")[0].files[0].size / 1024).toFixed(2);
				
                alert(size + " KB.");
            } else {
                alert("This browser does not support HTML5.");
            }
        });
    });
</script>




   
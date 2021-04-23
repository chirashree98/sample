<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>  
           <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>  
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
      </style>  
 </head>  
 <body>  

      <div class="container box"> 
	  <a href="<?=base_url();?>logouts">Logout</a>
   <a href="<?=base_url();?>add_product"> <button type="button"  class="btn btn-info">Add Product</button> </a>
              <i class="fas fa-plus-circle"></i>
      <?php echo $_SESSION['name'];?> Dashboard Profile
      <div class="table-responsive">  
               
             
              <div>
              
                <table id="user_data" class="table table-bordered table-striped">  <thead>  
                          <tr>  
                               
                              <th width="5%">Product Name</th>
                              
<th width="5%">Product Description</th>
							   <th width="5%">Product Price</th>
							   <th width="5%">Product Image</th>
                               <th width="5%">Edit</th>
							   <th width="5%">Delete</th>
							    
                              
                          </tr>  
                     </thead> 
                     <tbody>
  
<br /><br />
</tbody>
</table>  

<script>  
 $(document).ready(function(){  
      $('#user_data').DataTable({  
           "ajax"     :     "fetch_product_json",  
           "columns"     :     [  
                {     "data"     :     "name"  },  
                 
                {     "data"     :     "description"} ,
			    {     "data"     :     "price"} ,
			   {
    "data": "image",
    "render": function(data, type, row) {
        return '<img src="<?=base_url();?>images/'+data+'" style="height:100px;width:100px;" />';
    }
    },
					
     {
		 "data": "id",
		 "render": function ( data, type, row ) {
                        return '<a href="<?=base_url();?>edit_product/'+data+'">Edit</a>';
						
		 }
	 },
			 
	 
		 {
		 "data": "id",
		 "render": function ( data, type, row ) {
                        return '<a href="<?=base_url();?>delete_product/'+data+'">Delete</a>';
						
		 }
	 }
		 
                
                   
					
           ]  
      });  
 });  
 </script>  

  
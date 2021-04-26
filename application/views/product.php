<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <!-- Datatable CSS -->
     <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
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
              
                 <table id='empTable' class='display dataTable'>
                         
       <thead>
         <tr>
                              <th >Product Name</th>
                              <th >Product Description</th>
							   <th >Product Price</th>
							   <th >Product Image</th>
                               <th >Edit</th>
							   <th >Delete</th>
							    
                              
                          </tr>  
                     </thead> 
                     <tbody>
  
<br /><br />
</tbody>
</table>  

<script>  
 $(document).ready(function(){  
      $('#empTable').DataTable({  
		  'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
           
			  'ajax': {
             'url':'<?=base_url()?>fetch_product_json'
          },
           'columns'     :     [  
                {     data    :     'name' },  
                 
                {     data     :     'description'} ,
			    {     data     :     'price'},
			   {
    data: 'image',
    "render": function(data, type, row) {
        return '<img src="<?=base_url();?>images/'+data+'" style="height:100px;width:100px;" />';
    }
    },
					
     {
		 data: 'id',
		 "render": function ( data, type, row ) {
                        return '<a href="<?=base_url();?>edit_product/'+data+'">Edit</a>';
						
		 }
	 },
			 
	 
		 {
		 data: 'id',
		 "render": function ( data, type, row ) {
                        return '<a href="<?=base_url();?>delete_product/'+data+'">Delete</a>';
						
		 }
	 }
		 
                
                   
					
           ]  
      });  
 });  
 </script>  

  

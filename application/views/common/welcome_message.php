<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>
    
	<link rel="stylesheet" href=<?php echo base_url()."assets/font-awesome/css/font-awesome.min.css";?>  type="text/css">
  	<link rel="stylesheet" href=<?php echo base_url()."assets/style.css";?>>
  	<link rel="stylesheet" href=<?php echo base_url()."assets/bootstrap.min.css"; ?> >
    <link rel="stylesheet" href=<?php echo base_url()."assets/sb-admin.css"; ?> >
</head>
<body>
	    <!--<form action="seachgroup" name="seachgroup" id="seachgroup">
    		<div class="input-append">
  				
  				<input type="text" class="form-control" placeholder="Username">
				<button type="submit" class="add-on"><i class="icon-search"></i></button>
			</div>
    	</form>-->
    	<form role="form" action="abc" name="search_group_form" id="search_group_form">
	    	<div class="form-group input-group">
	            <input type="text" class="form-control" name="group_search_nm" id="group_search_nm">
	            <span class="input-group-btn"><button id="submit" type="button" class="btn btn-default"><i class="fa fa-search"></i></button></span>
	        </div>
	    </form>
        
</form>
</body>
<script src=<?php echo base_url()."assets/js/jquery.js"; ?>></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=<?php echo base_url()."assets/js/bootstrap.min.js"; ?> ></script>
<script>
	
	$( document ).ready(function() {
    	$('#submit').click(function(){
    		$.ajax({
    			type: "post",
    			url: '<?php echo base_url();?>'+'group/search_data',
    			data: {groupname : $('#group_search_nm').val()},
	        	success: function(msg)
	        	{
	        		var jason = $.parseJSON(msg);
	        		if (jason.length >1) {
	        			for(i in jason){
	        				//alert()
	        				alert(jason[i].grp_id);
	        			}
	        		}else{

	        		}
	        	}

    		});
    	});
	});
</script>
</html>
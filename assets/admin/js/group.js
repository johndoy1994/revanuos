


 var autocomplete;
    function initialize() {
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById('metting_location')),
          { types: ['geocode'] });
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        var latitude =place.geometry.location.lat();
        var longitude = place.geometry.location.lng();


        
        $('#grp_latitude').val(latitude);
        $('#grp_longitude').val(longitude);

        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
      });
    }

$(document).ready(function(){
  //Group visibility on change
  
    $('input:radio[name=display]').change(function () {
      $('input:radio[name=display]').prop('checked', false);
        $('#'+this.id).prop('checked', true);
    });

    
    $('input:radio[name=repet]').change(function () {
      $('input:radio[name=repet]').prop('checked', false);
        $('#'+this.id).prop('checked', true);
    });

    $('input:radio[name=repet]').change(function () {
      if ($(this).val() == 0) {
        $('#group_repet_hide').show();
      }else{
        $('#group_repet_hide').hide();
      }
      
    });
})
$(function() {

   $('.btn-toggle').click(function() {

    $(this).find('.btn').toggleClass('active');


    if ($(this).find('.btn-primary').size()>0) {
      $(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
      $(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
      $(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
      $(this).find('.btn').toggleClass('btn-info');
    }

    $(this).find('.btn').toggleClass('btn-default');

});

   
  	$( "input[name$='status']" ).click(function() {
  		if ($(this).val() == 'Offline') {
  			$('#metting_location_area').show();
  		}else{
  			$('#metting_location_area').hide();
  		}
	   });

    $( "#metting_start_date" ).datepicker({
      
    showSecond: true,
    dateFormat: "dd-mm-yy", 
    	changeYear: true,
    	minDate: 0,
    	onSelect: function(selected) {

        //var d = new Date(); // for now
        //datetext= d.getHours()+": "+d.getMinutes()+": "+d.getSeconds();
       
       // $('#exampleInputAmount').val(datetext);


	          $("#metting_end_date").datepicker("option","minDate", selected),
	          $("#metting_schedule").datepicker("option","minDate", selected)
	    }
    });
    $( "#metting_end_date" ).datepicker({
    	dateFormat: 'dd-mm-yy', 
    	changeYear: true,
    	minDate: 0,
    	onSelect: function(selected) {
	          $("#metting_schedule").datepicker("option","maxDate", selected)
	    }
    });

    /*$( "#metting_schedule" ).datepicker({
    	dateFormat: 'dd-mm-yy', 
    	changeYear: true,
    	minDate: $( "#metting_start_date" ).val(),
    	maxDate: $( "#metting_end_date" ).val()
    });*/

    $( "#metting_end_date" ).change(function(){
    	if($( "#metting_start_date" ).val().length > 1){
    		if($( "#metting_start_date" ).val() > $( "#metting_end_date" ).val()){
    			alert("Meeting End Date is Not Less Of Meeting Start Date");
    			$( "#metting_end_date" ).val('');
    		}
    	}else{
    		alert("Please Select Meeting Start Date");
    		$( "#metting_end_date" ).val('');

    	}
    })
    $( "#metting_schedule" ).change(function(){
    	if(($( "#metting_start_date" ).val().length > 1) && ($( "#metting_end_date" ).val().length > 1)){
    		
    	}else{
    		alert("Please Select Meeting Start Date and End Date");
    		$( "#metting_schedule" ).val('');

    	}
    })

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
  		//return arg != value;
  		if (value.length > 0) 
         {
           return true;
         }else{
         	return false;
         }
 	}, "Value must not equal arg.");


    jQuery.validator.addMethod("lettersonly", function(value, element) 
    {
  		return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");

    var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
    jQuery.validator.addMethod("onlyimageallow", function(value, element) 
    {

        var res_field = value;   
          var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();
          
          if (res_field.length > 1)
             {
                  if (allowedExtensions.indexOf(extension) === -1) 
                 {
                   alert('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed.');
                   return false;
                 }else{
                 	return true;
                 }
                 //return true;
            }
            return true;
    }, "Invalid file Format. Only "+ allowedExtensions.join(', ') +" are allowed.");

    $("#add_group_form").validate({
	  rules: {
	    // simple rule, converted to {required:true}
	    

	    skill: { valueNotEquals: "default" },
	    group_name: {
	    	required: true,
	    	//lettersonly: true,
	    	//minlength: 3,
	    	//maxlength : 20,
	    },
	    'pac-input':"required",
	    metting_location:"required",
	    //metting_schedule: "required",
      sedualdate_time: "required",
	    metting_start_date: "required",
	    metting_end_date: "required",
	    description: "required",
	    grp_image:{
            onlyimageallow: true,
        },
        repet_forever:{valueNotEquals: "default"}
	  },
	  messages:{
        group_name:{
	        required: "Enter Group Name",
	        //minlength: jQuery.format("Enter at least (2) characters"),
	        //maxlength:jQuery.format("First name too long more than (80) characters"),
	        //lettersonly:jQuery.format("letters only mate")
        },
        'pac-input':"Enter Meeting Location",
        skill: { valueNotEquals: "Please select an item!" },
        metting_location:{
        	required: "Enter Meeting Location",
        },
        /*metting_schedule:{
        	required: "Enter Schedule Meeting",
        },*/
        sedualdate_time:{
          required: "Enter Schedule Time",
        },
        metting_start_date:{
        	required: "Enter Meeting Start Date",
        }, 
        metting_end_date:{
        	required: "Enter Meeting End Date",
        },
        description:{
        	required: "Enter Description",
        },
        repet_forever: { valueNotEquals: "Please select an item!" },
      },
      submitHandler: function() 
      { 
        var check = 'no';
        if($('input:radio[name=repet]:checked').val() == 0){
            $('input:checkbox[name="repet_day[]"]:checked').each(function(i){
              check = 'yes';
            });
        }else{
          check = 'yes';
        }
        
        if(check == 'yes') {
          $("#add_group_form").submit();
        }else{
          alert("Please select any one day repeat");
        }
        
      }
	});

$("#add_skill").validate({

	  rules: {
	    // simple rule, converted to {required:true}
	    skill_name: {
	    	required: true,
	    },
	  },
	  messages:{
        skill_name:{
	        required: "Enter Skill Name",
        },
      },
      submitHandler: function() 
      {

      	$.ajax({
	        type: "post",
	        url: baseurl+'admin/add_skill',
	        data: 'skill_name=' +$("#skill_name").val(),
	        success: function(msg)
	        {
		        var jason = $.parseJSON(msg);
		        $('#skill').append("<option value='"+jason.skill_id+"' selected='selected'>"+jason.skill_name+"</option>");
	    		$('#myModal').modal('toggle');
	    		$("#skill_name").val('');
	    	}
         });
  	  }
	});

  });

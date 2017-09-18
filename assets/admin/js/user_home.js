/*$( window ).load(function() {
  initialize();
  change_miles('5') ;
  $('#calender_ctn').hide();
});*/

$( document ).ready(function() {

 initialize();
  change_miles('5') ;
  $('#calender_ctn').hide();


  //group on hower
  $("[rel='tooltip']").tooltip();
  $('.thumbnail').hover(
      function(){
          $(this).find('.caption').slideDown(250); //.fadeIn(250)
      },
      function(){
          $(this).find('.caption').slideUp(250); //.fadeOut(205)
      }
  );

});


  var geocoder;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction, {timeout:10000});
    }
    //Get the latitude and the longitude;
    function successFunction(position) {
        
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;

        $('#latitude').val(lat);
        $('#longitude').val(lng);
        $.ajax({  
              url:base_url+"Group/get_let_setsession",
              type:'POST',
              data:{'miles' : $('#miles').val(), 'latitude' : $('#latitude').val(),'longitude' : $('#longitude').val() },
              success: function (msg) {

               }
        })
        codeLatLng(lat, lng)
    }
    function errorFunction(error) {
        console.log(error);
        alert("Geocoder failed");
    }
    function initialize() {
        geocoder = new google.maps.Geocoder();
    }
    function codeLatLng(lat, lng) {
        var latlng = new google.maps.LatLng(lat, lng);
        
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                
                change_miles('5') ;

                //console.log(results);
                if (results[1]) {
                    var indice = 0;
                    for (var j = 0; j < results.length; j++) {
                        if (results[j].types[0] == 'locality') {
                            indice = j;
                            break;
                        }
                    }
                    //alert('The good number is: '+j);
                    //console.log(results[j]);
                    for (var i = 0; i < results[j].address_components.length; i++) {
                        if (results[j].address_components[i].types[0] == "locality") {
                            //this is the object you are looking for
                            city = results[j].address_components[i];
                        }
                        if (results[j].address_components[i].types[0] == "administrative_area_level_1") {
                            //this is the object you are looking for
                            region = results[j].address_components[i];
                        }
                        if (results[j].address_components[i].types[0] == "country") {
                            //this is the object you are looking for
                            country = results[j].address_components[i];
                        }
                    }
                    //city data
                    var state_name = region.long_name;
                    var local_add = city.long_name + " , " + region.long_name + " , " + country.short_name;
                    document.getElementById("local_city").innerHTML = local_add;
                    //document.getElementById("local_state").innerHTML = state_name;
                } else {
                    alert("No results found");
                }
                //}
            } else {

                alert("Geocoder failed due to: " + status);
            }
        });
    }

$('#groups').click(function(){
    //$('#group_list').html('');
    $('#calender_ctn').hide();

    $('#page_content').show();

    miles = $('#miles').val();
    
    
    change_miles(miles) ;
    $('#calender').removeClass('active');
    $('#groups').addClass('active');
})

$('#calender').click(function(){
   // $("#group_list div.col-md-4").remove();
    //$('#group_list_data').hide();
    
    $('#page_content').hide();

    $('#calender_ctn').show();
    $('#show_more_btn').hide();

    //default show calender using list
    var d=new Date();
    
    var dd=d.getDate();
    var mm=d.getMonth()+1;
    var yy=d.getFullYear();


    $.ajax({  
      //  url: <?php echo base_url()."Group/get_let_log"; ?>,
      url:base_url+"Group/get_let_log",
      type:'POST',
      data:{'miles' : $('#miles').val(), 'latitude' : $('#latitude').val(),'longitude' : $('#longitude').val(),'type' : 'calender' ,'day' : dd,'month' : mm,'year' : yy },
      success: function (msg) {
            $("#calender_ctn_data .date-contain-box").remove();
            //$("#calender_ctn_data .text-center").remove();

            var test = $.parseJSON(msg);
            if (test.length === 0) {
                //$('#show_more_btn').hide();
                $("#calender_ctn_data").append('<div class="date-contain-box"><h3>No Group Found</h3></div>');
            }else{
                var dayNames = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                

                for (var j  in test) 
                {
                    var sedual_groupdate = test[j][0].grp_meeting_schedule;
                        meeting_groupdate = sedual_groupdate.replace(/-/g, "/"); 
                        //var date_new=new Date(d.split("-").reverse().join("-"));
                        // console.log(date_new);
                    var meeting_date =new Date(meeting_groupdate.split("-").reverse().join("-"));
                            

                     var ctn ='<div class="date-contain-box">';
                                ctn +='<div class="date-box">';
                                       ctn += '<div class="block-day">'+dayNames[meeting_date.getDay()]+'</div>';
                                       ctn += '<div class="block-date">'+meeting_date.getDate()+'  '+meeting_date.toLocaleString("en-us", { month: "short" })+'.</div>';
                                       ctn += '<div class="block-year">'+meeting_date.getFullYear()+'</div>';
                                ctn += '</div>';
                                ctn += '<div class="date-detail-box">';

                    for (var i  in test[j]) 
                    {

                        var sedualdate = test[j][i].grp_meeting_schedule;
                        var d = test[j][i].grp_meeting_schedule;
                            d = d.substr(0, 10).split("-");
                            d = d[2] + "-" + d[1] + "-" + d[0];
                            my_date = sedualdate.replace(/-/g, "/"); 
                            
                            var date_new=new Date(my_date.split("-").reverse().join("-"));
                            var hr = date_new.getHours();
                            var ampm = hr < 12 ? "AM" : "PM";

                         ctn += '<div class="date-detail">';
                              ctn += '<div class="time">'+date_new.getHours()+':'+date_new.getMinutes()+' <br><span>'+ampm+'</span></div>';
                              ctn += '<div class="date-detail-text">';
                                ctn += '<h2>'+test[j][i].grp_name+'</h2>';
                                ctn += '<a href="javascript:;">'+dayNames[meeting_date.getDay()]+', '+date_new.getHours()+':'+date_new.getMinutes()+ ' '+ampm+'  @<br> '+test[j][i].grp_meeting_location+'</a>';
                                ctn += '<p>'+test[j][i].tot_member+' '+test[j][i].grp_name+'  campers going</p>';
                              ctn += '</div>';
                         ctn += '</div>';
                                    
                        //$("#group_list").append(ctn);
                        //$("#group_list_data").append(ctn);

                    }
                    ctn += '</div>';
                    ctn += '</div>';
                    $("#calender_ctn_data").prepend(ctn);
               }
               //show more button on display more data
               show_calender_data();
            }
      }
    })


    $("#calender_disp").datepicker({

        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'dd-mm-yy',
        //maxDate: new Date(),
        yearRange: "-100:+0",
        onSelect: function( selectedDate ) {
            //alert(selectedDate);
            var result = selectedDate.split('-');
      

      $.ajax({  
      url:base_url+"Group/get_let_log",
      type:'POST',
      data:{'miles' : $('#miles').val(), 'latitude' : $('#latitude').val(),'longitude' : $('#longitude').val(),'type' : 'calender' ,'day' : result[0],'month' : result[1],'year' : result[2] },
      success: function (msg) {

        $("#calender_ctn_data .date-contain-box").remove();
            var test = $.parseJSON(msg);
              
            if (test.length === 0) {
                //$('#show_more_btn').hide();
                $("#calender_ctn_data").append('<div class="date-contain-box"><h3>No Group Found</h3></div>');
            }else{
                var dayNames = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                for (var j  in test) 
                {
                    var sedual_groupdate = test[j][0].grp_meeting_schedule;
                        meeting_groupdate = sedual_groupdate.replace(/-/g, "/"); 
                        //var date_new=new Date(d.split("-").reverse().join("-"));
                        // console.log(date_new);
                    var meeting_date =new Date(meeting_groupdate.split("-").reverse().join("-"));
                            

                     var ctn ='<div class="date-contain-box">';
                                ctn +='<div class="date-box">';
                                       ctn += '<div class="block-day">'+dayNames[meeting_date.getDay()]+'</div>';
                                       ctn += '<div class="block-date">'+meeting_date.getDate()+'  '+meeting_date.toLocaleString("en-us", { month: "short" })+'.</div>';
                                       ctn += '<div class="block-year">'+meeting_date.getFullYear()+'</div>';
                                ctn += '</div>';
                                ctn += '<div class="date-detail-box">';

                    for (var i  in test[j]) 
                    {

                        var sedualdate = test[j][i].grp_meeting_schedule;
                        var d = test[j][i].grp_meeting_schedule;
                            d = d.substr(0, 10).split("-");
                            d = d[2] + "-" + d[1] + "-" + d[0];
                            my_date = sedualdate.replace(/-/g, "/"); 
                            
                            
                            //var date_new=new Date(d.split("-").reverse().join("-"));
                           // console.log(date_new);
                            var date_new=new Date(my_date.split("-").reverse().join("-"));
                            var hr = date_new.getHours();
                            var ampm = hr < 12 ? "AM" : "PM";
                            

                         ctn += '<div class="date-detail">';
                              ctn += '<div class="time">'+date_new.getHours()+':'+date_new.getMinutes()+' <br><span>'+ampm+'</span></div>';
                              ctn += '<div class="date-detail-text">';
                                ctn += '<h2>'+test[j][i].grp_name+'</h2>';
                                ctn += '<a href="javascript:;">'+dayNames[meeting_date.getDay()]+', '+date_new.getHours()+':'+date_new.getMinutes()+ ' '+ampm+'  @<br> '+test[j][i].grp_meeting_location+'</a>';
                                ctn += '<p>'+test[j][i].tot_member+' '+test[j][i].grp_name+'  campers going</p>';
                              ctn += '</div>';
                         ctn += '</div>';
                                    
                        //$("#group_list").append(ctn);
                        //$("#group_list_data").append(ctn);

                    }
                    ctn += '</div>';
                    ctn += '</div>';
                    $("#calender_ctn_data").prepend(ctn);
               }
               show_calender_data();
            }
           
      }
    });
      }

    });

    //$('#group_list').html('<h4><center>This Functionality is in Progress</center></h4>');
    $('#groups').removeClass('active');
    $('#calender').addClass('active');
})



function show_calender_data(){
    
    $('#show_more_btn').hide();

    size_li = $("#calender_ctn_data .date-contain-box").size();
    x=2;

    

    $('#calender_ctn_data .date-contain-box').hide();
    $('#calender_ctn_data .date-contain-box:lt('+x+')').show();

    $('#show_more').click(function () {
        x= (x+2 <= size_li) ? x+2 : size_li;
      $('#calender_ctn_data .date-contain-box:lt('+x+')').show();
      
    });

    if (x < size_li) {
        $('#show_more_btn').show();
    }

}


$(window).scroll(function(){
    //if ($(window).scrollTop() + $(window).height() == $(window).height()){
 //   if ($(document).height() == ($(window).scrollTop() + 475)){
//    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 15) {

var nearToBottom = 1000;

if ($(window).scrollTop() + $(window).height() > $(document).height() + nearToBottom) { 

        if($("#pagenum:last").val() <= $("#pages").val()) {
            var pagenum = parseInt($("#pagenum:last").val()) + 1;
            $("#pagenum").val(pagenum);
           // getresult('getresult.php?page='+pagenum);
           //alert("call");

        $.ajax({
            url:base_url+"Group/get_let_log",
            type:'POST',
            data:{'miles' : $('#miles').val(), 'page' : $('#pagenum').val(),'latitude' : $('#latitude').val(),'longitude' : $('#longitude').val() },
            success: function (msg) {

                //remove old content
                //$("#group_list div.col-md-4").remove();

                var test = $.parseJSON(msg);
                for (var i  in test) 
                {
                if (i == 'pages') {
                    $('#pages').val(test[i]);
                }
                else{
                 //console.log(test[i].grp_name);
                 var ctn = '<div class="col-md-4 col-sm-4">';
                         ctn +='<div class="gallery-box">';
                            ctn +=' <div class="thumbnail">';
                                ctn +=  '<div class="caption">';
                                    ctn +=  '<a href='+base_url+'group/join_group/'+test[i].grp_id+' class="label-default"><i class="fa fa-link"></i></a>';
                                   ctn += '</div>';

                                   if(test[i].grp_image != '' && (test[i].grp_image).length >1){
                                
                                        ctn +=' <img src='+base_url+'uploads/group_image/'+test[i].grp_id+'/thumb/'+test[i].grp_image+' alt="" />';
                                   }else{

                                        ctn +='<img src='+base_url+'uploads/general/no-image-available.jpg alt="" />';
                                   }
                              ctn +='</div>';
                            ctn +='<div class="gallery-contain">';
                            ctn +='    <h3><a href='+base_url+'group/groupdetailshow/'+test[i].grp_id+' >'+test[i].grp_name+'</a></h3>';
                            ctn +='    <p>'+test[i].grp_desc+'</p>';
                            ctn +='        <h2><i class="fa fa-users"></i>'+test[i].tot_member+' Members</h2>';
                            ctn +='    </div>';
                        ctn +='    </div>';
                    ctn +='    </div>';

                    //$("#group_list").append(ctn);
                    $("#group_list_data").append(ctn);
                }
            }           
             $("[rel='tooltip']").tooltip();

            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        }
    });

        }
    }
});

jQuery.noConflict();
jQuery( document ).ready(function($){
	$('tr:odd').addClass('odd-row');			

	//----------------------------------------------------------------------------
	// Add Tabs on Front Page Blocks using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs" ).tabs();
         });
	$('#block-views-block-pgp-latest-news-events-block-1').addClass('front-page-tabs');
	$('#block-views-block-latest-news-events-ipm-block-1').addClass('front-page-tabs');
	$('.front-page-tabs').wrapAll('<div id="tabs"> </div>');
	
	$('#tabs').prepend("<ul><li> <a href='#block-views-block-pgp-latest-news-events-block-1'> PGP News </a></li><li> <a href='#block-views-block-latest-news-events-ipm-block-1'> IPM News </a></li></ul>");

	
	//----------------------------------------------------------------------------
	// Add Tabs on IPM and PGP club Blocks using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs1" ).tabs();
         });
	$('#block-views-block-pgp-club-block-1-6').addClass('front-page-tabs-1');
	$('#block-views-block-ipm-club-block-1-6').addClass('front-page-tabs-1');
	$('.front-page-tabs-1').wrapAll('<div id="tabs1"> </div>');
	
	$('#tabs1').prepend("<ul><li> <a href='#block-views-block-pgp-club-block-1-6'> PGP Club </a></li><li> <a href='#block-views-block-ipm-club-block-1-6'> IPM Club </a></li></ul>");

	//----------------------------------------------------------------------------
	// Add Tabs on Latest Article Blocks using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs2" ).tabs();
         });
	$('#block-views-block-latest-articles-block-1').addClass('front-page-tabs-2');
	$('#block-views-block-latest-articles-ipm-block-1').addClass('front-page-tabs-2');
	$('.front-page-tabs-2').wrapAll('<div id="tabs2"> </div>');
	
	$('#tabs2').prepend("<ul><li> <a href='#block-views-block-latest-articles-block-1'> PGP Articles </a></li><li> <a href='#block-views-block-latest-articles-ipm-block-1'> IPM Articles </a></li></ul>");
      
	  
	  
	//----------------------------------------------------------------------------
	// Add Tabs on Latest News & Events page using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs3" ).tabs();
         });
	$('#block-views-block-pgp-latest-news-events-block-2').addClass('front-page-tabs-3');
	$('#block-views-block-latest-news-events-ipm-block-2').addClass('front-page-tabs-3');
	$('.front-page-tabs-3').wrapAll('<div id="tabs3"> </div>');
	
	$('#tabs3').prepend("<ul><li> <a href='#block-views-block-pgp-latest-news-events-block-2'> PGP Events </a></li><li> <a href='#block-views-block-latest-news-events-ipm-block-2'> IPM Events</a></li></ul>");
 
 
   //----------------------------------------------------------------------------
	// Add Tabs on Latest Articles page using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs4" ).tabs();
         });
	$('#block-views-block-latest-articles-block-2').addClass('front-page-tabs-4');
	$('#block-views-block-latest-articles-ipm-block-2').addClass('front-page-tabs-4');
	$('.front-page-tabs-4').wrapAll('<div id="tabs4"> </div>');
	
	$('#tabs4').prepend("<ul><li> <a href='#block-views-block-latest-articles-block-2'> PGP Articles </a></li><li> <a href='#block-views-block-latest-articles-ipm-block-2'> IPM Articles</a></li></ul>");
 
	 

    //----------------------------------------------------------------------------
	// Add Tabs on Clubs page using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs5" ).tabs();
         });
	$('#block-views-block-pgp-club-block-2').addClass('front-page-tabs-5');
	$('#block-views-block-ipm-club-block-2').addClass('front-page-tabs-5');
	$('.front-page-tabs-5').wrapAll('<div id="tabs5"> </div>');
	
	$('#tabs5').prepend("<ul><li> <a href='#block-views-block-pgp-club-block-2'> PGP Clubs </a></li><li> <a href='#block-views-block-ipm-club-block-2'> IPM Clubs</a></li></ul>");
 

 
	//----------------------------------------------------------------------------
	// Add Tabs on Committees page using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs6" ).tabs();
         });
	$('#block-views-block-pgp-committees-block-1').addClass('front-page-tabs-6');
	$('#block-views-block-ipm-committees-block-1').addClass('front-page-tabs-6');
	$('.front-page-tabs-6').wrapAll('<div id="tabs6"> </div>');
	
	$('#tabs6').prepend("<ul><li> <a href='#block-views-block-pgp-committees-block-1'> PGP Committees </a></li><li> <a href='#block-views-block-ipm-committees-block-1'> IPM Committees</a></li></ul>");
   
   
   //----------------------------------------------------------------------------
	// Add Tabs on Login And Logout page using JQuery UI library. 
	//----------------------------------------------------------------------------
	 $('#block-loginiconblock').click(function(){
		$('#block-userlogin-3').toggle();
		
		$('#block-useraccountmenu').toggle();
		console.log('I was here');	
	});
	
    $(document).click(function(event) { 
	     
      if(!$(event.target).is($('#block-loginiconblock').find('*') ) && !$(event.target).is($('#block-userlogin-3').find('*')) && !$(event.target).is($('#block-userlogin-3'))) 
		{
           if($('#block-userlogin-3').css('display') == 'block') {
            $('#block-userlogin-3').toggle();
			$('#block-useraccountmenu').css('display','none');
			console.log($(event.target));
			console.log('This is login');
			console.log($('#block-userlogin-3').find('*'));
        }
      } 
	if(!$(event.target).is($('#block-loginiconblock').find('*') ) && !$(event.target).is($('#block-useraccountmenu').find('*')) && !$(event.target).is($('#block-useraccountmenu'))) 
		{
           if( $('#block-useraccountmenu').css('display') == 'block' ) {
			$('#block-useraccountmenu').toggle();
			console.log($(event.target));
			console.log('This is logout');
			console.log($('#block-useraccountmenu').find('*'));
        }
      } 	  
    });
     
   
	//----------------------------------------------------------------------------
	// Add Tabs on Latest News & Events page using JQuery UI library. 
	//----------------------------------------------------------------------------
	$(function() {
            $( "#tabs7" ).tabs();
         });
	$('#block-views-block-pgp-latest-news-events-block-1-2').addClass('front-page-tabs-7');
	$('#block-views-block-latest-news-events-ipm-block-1-2 ').addClass('front-page-tabs-7');
	$('.front-page-tabs-7').wrapAll('<div id="tabs7"> </div>');
	
	$('#tabs7').prepend("<ul><li> <a href='#block-views-block-pgp-latest-news-events-block-1-2'> PGP Events </a></li><li> <a href='#block-views-block-latest-news-events-ipm-block-1-2 '> IPM Events</a></li></ul>");
 
 
   //----------------------------------------------------------------------------
   //   Format Date Display
   //----------------------------------------------------------------------------

    $('#block-views-block-pgp-latest-news-events-block-1 .datetime').each(function(){
		var eventDate = $(this).text();
		var eventDateArr1 = eventDate.split(',');
		var eventDateArr2 = eventDateArr1[1].split(' ');
		var eventDateArr3 = eventDateArr1[2].split('-');
		var month = eventDateArr2[1];
		var date = eventDateArr2[2];
		var year = eventDateArr3[0].trim();
		var time = eventDateArr3[1].trim();
	

		var finalDate = '<div class="event-month">' + month + '</div>'
		              + '<div class="event-date">' + pad(date,2)  + '</div>'
		              + '<div class="event-year">' + year  + '</div>' 
		              + '<div class="event-time">' + time  + '</div>';
		
		$(this).html(finalDate);
	});
    $('#block-views-block-latest-news-events-ipm-block-1 .datetime').each(function(){
		var eventDate = $(this).text();
		var eventDateArr1 = eventDate.split(',');
		var eventDateArr2 = eventDateArr1[1].split(' ');
		var eventDateArr3 = eventDateArr1[2].split('-');
		var month = eventDateArr2[1];
		var date = eventDateArr2[2];
		var year = eventDateArr3[0].trim();
		var time = eventDateArr3[1].trim();
			
		var finalDate = '<div class="event-month">' + month + '</div>'
		              + '<div class="event-date">' + pad(date,2)  + '</div>'
		              + '<div class="event-year">' + year  + '</div>'
		              + '<div class="event-time">' + time  + '</div>';
		
		$(this).html(finalDate);
	});


	$('#block-views-block-latest-announcements-block-1 .views-field-title').each(function(){
		//Find Date from Announcement News in mm/dd/yyyy format
		var raw_date = $(this).siblings('.views-field-created').text().split(', ');
		var only_date = raw_date[1].split(' - ');
		
		
		//Fin Current Date in mm/dd/yyyy format
		var fullDate = new Date();
		//fullDate is in Format - Thu May 12 2016 17:16:38 GMT+1000 {}
		 
		//convert month to 2 digits
		var twoDigitMonth 	= ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
		var currentDate 	=  twoDigitMonth + "/" + fullDate.getDate() + "/" + fullDate.getFullYear();
		//Now the format is 05/12/2016		
	
		//Convert both dates into DATE format
		var news_publish_date = new Date(only_date[0]);
		var current_date      = new Date(currentDate);
		var miliSecondsPerDay = 1000 * 60 * 60 * 24;
		var days_since_publish = (current_date.getTime() - news_publish_date.getTime()) / miliSecondsPerDay;
		
		//Add New Image to the post which is less than 3 days old.
		if(days_since_publish <= 3){
			$(this).parent().addClass('newPost');
		}
	
	});
	
  
  
  
  $('#block-views-block-latest-news-events-ipm-block-1-2 .datetime').each(function(){
		var eventDate = $(this).text();
		var eventDateArr1 = eventDate.split(',');
		var eventDateArr2 = eventDateArr1[1].split(' ');
		var eventDateArr3 = eventDateArr1[2].split('-');
		var month = eventDateArr2[1];
		var date = eventDateArr2[2];
		var year = eventDateArr3[0].trim();
		var time = eventDateArr3[1].trim();
	

		var finalDate = '<div class="event-month">' + month + '</div>'
		              + '<div class="event-date">' + pad(date,2)  + '</div>'
		              + '<div class="event-year">' + year  + '</div>' 
		              + '<div class="event-time">' + time  + '</div>';
		
		$(this).html(finalDate);
	});
    $('#block-views-block-pgp-latest-news-events-block-1-2 .datetime').each(function(){
		var eventDate = $(this).text();
		var eventDateArr1 = eventDate.split(',');
		var eventDateArr2 = eventDateArr1[1].split(' ');
		var eventDateArr3 = eventDateArr1[2].split('-');
		var month = eventDateArr2[1];
		var date = eventDateArr2[2];
		var year = eventDateArr3[0].trim();
		var time = eventDateArr3[1].trim();
	
		
		var finalDate = '<div class="event-month">' + month + '</div>'
		              + '<div class="event-date">' + pad(date,2)  + '</div>'
		              + '<div class="event-year">' + year  + '</div>'
		              + '<div class="event-time">' + time  + '</div>';
		
		$(this).html(finalDate);
	});
  console.log("Menu I am here!	");
   $("ul.menu > li.menu-item--expanded > ul.menu > li.menu-item--expanded > ul.menu > li.menu-item--expanded > ul.menu").addClass("menu-12");
   $("ul.menu > li.menu-item--expanded > ul.menu > li.menu-item--expanded > ul.menu > li.menu-item--expanded").hover(function() {
	   $(this).children().toggleClass("menu-12");
   });
  console.log("Menu I am here2!	");

});

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
} 


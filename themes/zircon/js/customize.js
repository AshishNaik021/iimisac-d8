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
	// Add Tabs on Login page using JQuery UI library. 
	//----------------------------------------------------------------------------

	$('#block-loginiconblock').click(function(){
		$('#block-userlogin-3').toggle();
		$('#block-useraccountmenu').toggle();
	});
 
 
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
  

});

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
} 


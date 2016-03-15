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
 
	  
	  
});



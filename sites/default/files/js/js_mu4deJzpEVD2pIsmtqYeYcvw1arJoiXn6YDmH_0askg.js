(function(e){e.fn.farbtastic=function(f){e.farbtastic(this,f);return this};e.farbtastic=function(f,l){f=e(f).get(0);return f.farbtastic||(f.farbtastic=new e._farbtastic(f,l))};e._farbtastic=function(f,l){var a=this;e(f).html('<div class="farbtastic"><div class="color"></div><div class="wheel"></div><div class="overlay"></div><div class="h-marker marker"></div><div class="sl-marker marker"></div></div>');var k=e(".farbtastic",f);a.wheel=e(".wheel",f).get(0);a.radius=84;a.square=100;a.width=194;navigator.appVersion.match(/MSIE [0-6]\./)&&
e("*",k).each(function(){if(this.currentStyle.backgroundImage!="none"){var b=this.currentStyle.backgroundImage;b=this.currentStyle.backgroundImage.substring(5,b.length-2);e(this).css({backgroundImage:"none",filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=crop, src='"+b+"')"})}});a.linkTo=function(b){typeof a.callback=="object"&&e(a.callback).unbind("keyup",a.updateValue);a.color=null;if(typeof b=="function")a.callback=b;else if(typeof b=="object"||typeof b=="string"){a.callback=
e(b);a.callback.bind("keyup",a.updateValue);a.callback.get(0).value&&a.setColor(a.callback.get(0).value)}return this};a.updateValue=function(){this.value&&this.value!=a.color&&a.setColor(this.value)};a.setColor=function(b){var c=a.unpack(b);if(a.color!=b&&c){a.color=b;a.rgb=c;a.hsl=a.RGBToHSL(a.rgb);a.updateDisplay()}return this};a.setHSL=function(b){a.hsl=b;a.rgb=a.HSLToRGB(b);a.color=a.pack(a.rgb);a.updateDisplay();return this};a.widgetCoords=function(b){var c=e(a.wheel).offset();return{x:b.pageX-
c.left-a.width/2,y:b.pageY-c.top-a.width/2}};a.mousedown=function(b){if(!document.dragging){e(document).bind("mousemove",a.mousemove).bind("mouseup",a.mouseup);document.dragging=true}var c=a.widgetCoords(b);a.circleDrag=Math.max(Math.abs(c.x),Math.abs(c.y))*2>a.square;a.mousemove(b);return false};a.mousemove=function(b){var c=a.widgetCoords(b);if(a.circleDrag){b=Math.atan2(c.x,-c.y)/6.28;if(b<0)b+=1;a.setHSL([b,a.hsl[1],a.hsl[2]])}else{b=Math.max(0,Math.min(1,-(c.x/a.square)+0.5));c=Math.max(0,Math.min(1,
-(c.y/a.square)+0.5));a.setHSL([a.hsl[0],b,c])}return false};a.mouseup=function(){e(document).unbind("mousemove",a.mousemove);e(document).unbind("mouseup",a.mouseup);document.dragging=false};a.updateDisplay=function(){var b=a.hsl[0]*6.28;e(".h-marker",k).css({left:Math.round(Math.sin(b)*a.radius+a.width/2)+"px",top:Math.round(-Math.cos(b)*a.radius+a.width/2)+"px"});e(".sl-marker",k).css({left:Math.round(a.square*(0.5-a.hsl[1])+a.width/2)+"px",top:Math.round(a.square*(0.5-a.hsl[2])+a.width/2)+"px"});
e(".color",k).css("backgroundColor",a.pack(a.HSLToRGB([a.hsl[0],1,0.5])));if(typeof a.callback=="object"){e(a.callback).css({backgroundColor:a.color,color:a.hsl[2]>0.5?"#000":"#fff"});e(a.callback).each(function(){if(this.value&&this.value!=a.color)this.value=a.color})}else typeof a.callback=="function"&&a.callback.call(a,a.color)};a.pack=function(b){var c=Math.round(b[0]*255),d=Math.round(b[1]*255);b=Math.round(b[2]*255);return"#"+(c<16?"0":"")+c.toString(16)+(d<16?"0":"")+d.toString(16)+(b<16?"0":
"")+b.toString(16)};a.unpack=function(b){if(b.length==7)return[parseInt("0x"+b.substring(1,3))/255,parseInt("0x"+b.substring(3,5))/255,parseInt("0x"+b.substring(5,7))/255];else if(b.length==4)return[parseInt("0x"+b.substring(1,2))/15,parseInt("0x"+b.substring(2,3))/15,parseInt("0x"+b.substring(3,4))/15]};a.HSLToRGB=function(b){var c,d=b[0];c=b[1];b=b[2];c=b<=0.5?b*(c+1):b+c-b*c;b=b*2-c;return[this.hueToRGB(b,c,d+0.33333),this.hueToRGB(b,c,d),this.hueToRGB(b,c,d-0.33333)]};a.hueToRGB=function(b,c,
d){d=d<0?d+1:d>1?d-1:d;if(d*6<1)return b+(c-b)*d*6;if(d*2<1)return c;if(d*3<2)return b+(c-b)*(0.66666-d)*6;return b};a.RGBToHSL=function(b){var c,d,m,g,h=b[0],i=b[1],j=b[2];c=Math.min(h,Math.min(i,j));b=Math.max(h,Math.max(i,j));d=b-c;g=(c+b)/2;m=0;if(g>0&&g<1)m=d/(g<0.5?2*g:2-2*g);c=0;if(d>0){if(b==h&&b!=i)c+=(i-j)/d;if(b==i&&b!=j)c+=2+(j-h)/d;if(b==j&&b!=h)c+=4+(h-i)/d;c/=6}return[c,m,g]};e("*",k).mousedown(a.mousedown);a.setColor("#000000");l&&a.linkTo(l)}})(jQuery);
;
(function ($) {
  "use strict";

  /*
   *  Bind the colorpicker event to the form element
   */
  Drupal.behaviors.calendar_colorpicker = {
    attach: function(context) {
      $(".edit-calendar-colorpicker").on("focus", function() {
        var edit_field = this;
        var picker = $(this).closest('div').parent().find(".calendar-colorpicker");

        // Hide all color pickers except this one.
        $(".calendar-colorpicker").hide();
        $(picker).show();
        $.farbtastic(picker, function(color) {
          edit_field.value = color;
        }).setColor(edit_field.value);
      });
    }
  }
})(jQuery);

;
/**
 * @file
 * Add aria attribute handling for details and summary elements.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Handles `aria-expanded` and `aria-pressed` attributes on details elements.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.detailsAria = {
    attach: function () {
      $('body').once('detailsAria').on('click.detailsAria', 'summary', function (event) {
        var $summary = $(event.currentTarget);
        var open = $(event.currentTarget.parentNode).attr('open') === 'open' ? 'false' : 'true';

        $summary.attr({
          'aria-expanded': open,
          'aria-pressed': open
        });
      });
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * Polyfill for HTML5 details elements.
 */

(function ($, Modernizr, Drupal) {

  'use strict';

  /**
   * The collapsible details object represents a single details element.
   *
   * @constructor Drupal.CollapsibleDetails
   *
   * @param {HTMLElement} node
   */
  function CollapsibleDetails(node) {
    this.$node = $(node);
    this.$node.data('details', this);
    // Expand details if there are errors inside, or if it contains an
    // element that is targeted by the URI fragment identifier.
    var anchor = location.hash && location.hash !== '#' ? ', ' + location.hash : '';
    if (this.$node.find('.error' + anchor).length) {
      this.$node.attr('open', true);
    }
    // Initialize and setup the summary,
    this.setupSummary();
    // Initialize and setup the legend.
    this.setupLegend();
  }

  $.extend(CollapsibleDetails, /** @lends Drupal.CollapsibleDetails */{

    /**
     * Holds references to instantiated CollapsibleDetails objects.
     *
     * @type {Array.<Drupal.CollapsibleDetails>}
     */
    instances: []
  });

  $.extend(CollapsibleDetails.prototype, /** @lends Drupal.CollapsibleDetails# */{

    /**
     * Initialize and setup summary events and markup.
     *
     * @fires event:summaryUpdated
     *
     * @listens event:summaryUpdated
     */
    setupSummary: function () {
      this.$summary = $('<span class="summary"></span>');
      this.$node
        .on('summaryUpdated', $.proxy(this.onSummaryUpdated, this))
        .trigger('summaryUpdated');
    },

    /**
     * Initialize and setup legend markup.
     */
    setupLegend: function () {
      // Turn the summary into a clickable link.
      var $legend = this.$node.find('> summary');

      $('<span class="details-summary-prefix visually-hidden"></span>')
        .append(this.$node.attr('open') ? Drupal.t('Hide') : Drupal.t('Show'))
        .prependTo($legend)
        .after(document.createTextNode(' '));

      // .wrapInner() does not retain bound events.
      $('<a class="details-title"></a>')
        .attr('href', '#' + this.$node.attr('id'))
        .prepend($legend.contents())
        .appendTo($legend);

      $legend
        .append(this.$summary)
        .on('click', $.proxy(this.onLegendClick, this));
    },

    /**
     * Handle legend clicks.
     *
     * @param {jQuery.Event} e
     */
    onLegendClick: function (e) {
      this.toggle();
      e.preventDefault();
    },

    /**
     * Update summary.
     */
    onSummaryUpdated: function () {
      var text = $.trim(this.$node.drupalGetSummary());
      this.$summary.html(text ? ' (' + text + ')' : '');
    },

    /**
     * Toggle the visibility of a details element using smooth animations.
     */
    toggle: function () {
      var isOpen = !!this.$node.attr('open');
      var $summaryPrefix = this.$node.find('> summary span.details-summary-prefix');
      if (isOpen) {
        $summaryPrefix.html(Drupal.t('Show'));
      }
      else {
        $summaryPrefix.html(Drupal.t('Hide'));
      }
      // Delay setting the attribute to emulate chrome behavior and make
      // details-aria.js work as expected with this polyfill.
      setTimeout(function () {
        this.$node.attr('open', !isOpen);
      }.bind(this), 0);
    }
  });

  /**
   * Polyfill HTML5 details element.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.collapse = {
    attach: function (context) {
      if (Modernizr.details) {
        return;
      }
      var $collapsibleDetails = $(context).find('details').once('collapse').addClass('collapse-processed');
      if ($collapsibleDetails.length) {
        for (var i = 0; i < $collapsibleDetails.length; i++) {
          CollapsibleDetails.instances.push(new CollapsibleDetails($collapsibleDetails[i]));
        }
      }
    }
  };

  // Expose constructor in the public space.
  Drupal.CollapsibleDetails = CollapsibleDetails;

})(jQuery, Modernizr, Drupal);
;

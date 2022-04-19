	
// carousal slider js


// top header
$(window).on("scroll", function() {
	if ($(document).scrollTop() > 50) {
	  $('header').addClass('shrink');
	} else {
	  $('header').removeClass('shrink');
	}
	});
	
	// 
	/*--------------- slider ---------------*/
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

//Carousels
function carousels(){
  var carousel = $('.carouselslider'),
      options  = {
        itemsCustom : [
          [0, 1],
          [768, 2],
          [992, 3]
        ],
        navigation  : true
      };
  
  carousel.each(function(){
    var $this = $(this);

    if ($this.data('options')){
      options = $this.data('options');
    }

    $this.owlCarousel(options).addClass('loaded');
    
    $(window).on('resize', function(){
      delay(function(){
        bottomNavigation();
      }, 200);
    });

    function bottomNavigation(){
      if (
        ($this.hasClass('bottom-navigation')) && (!$this.find('.owl-pagination .owl-prev').length)
      ){
        $this.find('.owl-pagination').prepend('<a href="#" class="owl-prev"/>');
        $this.find('.owl-pagination').append('<a href="#" class="owl-next"/>');
        
        $this.find('.owl-next').html('<i class="fa fa-chevron-right"></i>').on('click',function (e){
          e.preventDefault();
          
          $this.trigger('owl.next');
        });
        
        $this.find('.owl-prev').html('<i class="fa fa-chevron-left"></i>').on('click',function (e){
          e.preventDefault();
          
          $this.trigger('owl.prev');
        });
      }
    }
    bottomNavigation();
  });
}
carousels();




// testimonials slider 

/* ------------------ TESTIMONIALS SLIDER-----------------*/
	
var owl = $('#carousel');
	owl.owlCarousel({
	loop:true,
	margin: 0,
	center:true,
	autoplayTimeout:5000,
	smartSpeed:450,
	dots:true,
	nav: true,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 3
	  }
	}
})



/* ------------------ TEAM SLIDER-----------------*/
	
var owl = $('#slider1');
	owl.owlCarousel({
	loop:true,
	margin: 0,
	// center:true,
	autoplayTimeout:5000,
	smartSpeed:450,
	dots:true,
	nav: true,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 3
	  }
	}
})




/* ------------------ Blog SLIDER-----------------*/
	
var owl = $('#slider2');
	owl.owlCarousel({
	loop:true,
	margin: 0,
	// center:true,
	autoplayTimeout:5000,
	smartSpeed:450,
	dots:true,
	nav: true,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 3
	  }
	}
})


/* ------------------ TESTIMONIALS SLIDER-----------------*/
	
var owl = $('#slider3');
	owl.owlCarousel({
	loop:true,
	margin: 0,
	center:true,
	autoplayTimeout:5000,
	smartSpeed:450,
	dots:true,
	nav: true,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 3
	  }
	}
})


/*************SEARCH POPUP*******************/
$(function() {
  $('a[href="#search"]').on("click", function(event) {
    event.preventDefault();
    $("#search").addClass("open");
    $('#search > form > input[type="search"]').focus();
  });

  $("#search, #search button.close").on("click keyup", function(event) {
    if (
      event.target == this ||
      event.target.className == "close" ||
      event.keyCode == 27
    ) {
      $(this).removeClass("open");
    }
  });

  $("form").submit(function(event) {
    event.preventDefault();
    return false;
  });
});

// pricing toggle button change 


$('.checkbox_switch').change(function() {
  if($(this).is(":checked")) {
    $('.pricing').each(function(){
      var data_price=$(this).data('year-price');
      $(this).html(data_price);
      $(".pricing-text").html('/month');
    });
  }
  else{
    $('.pricing').each(function(){
      var data_price=$(this).data('month-price');
      $(this).html(data_price);
      $(".pricing-text").html('/year');
    });
  }
});

// $('#cascade-slider').cascadeSlider({
              
// });


// casecade

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();





/*************HEADER MENU*******************/
$(function() {
  $('#main-menu').smartmenus({
    mainMenuSubOffsetX: -1,
    mainMenuSubOffsetY: 4,
    subMenusSubOffsetX: 6,
    subMenusSubOffsetY: -6
  });
});

// SmartMenus CSS animated sub menus - toggle animation classes on sub menus show/hide
$(function() {
  $('#main-menu').bind({
    'show.smapi': function(e, menu) {
      $(menu).removeClass('hide-animation').addClass('show-animation');
    },
    'hide.smapi': function(e, menu) {
      $(menu).removeClass('show-animation').addClass('hide-animation');
    }
  }).on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', 'ul', function(e) {
    $(this).removeClass('show-animation hide-animation');
    e.stopPropagation();
  });
});


/*---------------Contact_Form--------------*/

$('#contact-us-form').submit(function() {
      var form = $(this);
      var formData = $(this).serialize();
     
      $.post('../mail.html', formData, function(data) {
        //form.find('.send_mes').val('');
        form.append('<div class="success-msg" style="color:#fff; font-weight:bold;">Mail Sent.</div>');
      }).fail(function() {
        //form.find('.required-field').val('');
        form.append('<div class="error-msg">Error occurred.</div>');
      });

      return false;

  });



// SmartMenus mobile menu toggle button
$(function() {
  var $mainMenuState = $('#main-menu-state');
  if ($mainMenuState.length) {
    // animate mobile menu
    $mainMenuState.change(function(e) {
      var $menu = $('#main-menu');
      if (this.checked) {
        $menu.hide().slideDown(250, function() { $menu.css('display', ''); });
      } else {
        $menu.show().slideUp(250, function() { $menu.css('display', ''); });
      }
    });
    // hide mobile menu beforeunload
    $(window).bind('beforeunload unload', function() {
      if ($mainMenuState[0].checked) {
        $mainMenuState[0].click();
      }
    });
  }
});
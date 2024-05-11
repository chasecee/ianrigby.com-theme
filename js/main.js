/********** jQuery functions **********
$('#reset').click(function() {
  //Do something
});
click can be replaced with each, after, before, change, data, queue, and so much more
For more useful Functions: https://code.tutsplus.com/tutorials/20-helpful-jquery-methods-you-should-be-using--net-10521
*/

jQuery(function($) {
  function masonry_init() {
    var $grid = $('.grid').masonry({
      itemSelector: '.grid-item',
      // use element for option
      columnWidth: '.grid-sizer',
      percentPosition: true
    });
    $grid.imagesLoaded().progress( function() {
      $grid.masonry('layout');
    });
  }
  masonry_init();
  function scroll_animations() {
    var parent = $('.anim_parent');
    var children = $(parent).children();
    children.addClass('hider');

    $(parent).viewportChecker({
    classToAdd: 'visible',
    offset: 100,
    callbackFunction: function(elem) {
        var elements = elem.find(children),
            i = 0;
        interval = setInterval(function(){
            var time = i/4;
            elements.eq(i++).addClass('visible animated fadeIn')
            .css( '-webkit-animation-delay', time+'s' )
            .css('-moz-animation-delay', time+'s')
            .css('-ms-animation-delay', time+'s')
            .css('-o-animation-delay', time+'s')
            .css('animation-delay', time+'s');

            if(i==elements.length) {
                clearInterval(interval);
            }
        },0);
    }
    });

    $('.anim').viewportChecker({
        classToAdd: 'visible animated fadeIn',
        offset: 00
       });
     $('.animhead').viewportChecker({
         classToAdd: 'visible animated fadeIn',
         offset: 0
        });
    $('.anim_left').viewportChecker({
        classToAdd: 'visible animated fadeInLeft',
        offset: 100
       });
    $('.anim_right').viewportChecker({
        classToAdd: 'visible animated fadeInRight',
        offset: 100
       });
    $('.anim_up').viewportChecker({
        classToAdd: 'visible animated fadeInUp',
        offset: 100
       });
     $('.animbar').viewportChecker({
         classToAdd: 'visible animated getWide',
         offset: 0
        });
    $('.animinup').viewportChecker({
        classToAdd: 'visible animated InUp',
        offset: 0
       });
    }

    scroll_animations();

    var isMobile = window.matchMedia("only screen and (max-width: 767px)");

    if (isMobile.matches) {
            $('.anim_parent').children().addClass("visible");
            $('.anim,.anim_left,.anim_right,.anim_up').addClass("visible");
    }
    else{
        //  scroll_animations();
        }

    function iframeLazy(){
      var iframeLazy = $('.iframeLazy');
      $(iframeLazy).each(function(){

        var $this = $(this);
        var iframeLazySrc = $this.data('src');
        setTimeout(function(){
          $this.attr('src', iframeLazySrc).load(function(){
            console.log('loaded 2s later');
            var player = new Vimeo.Player($this);
            if($this.is('.full-visible')){
              player.play();
              console.log('full visible played');
            } else{
              player.pause();
              console.log('onload paused');
            }
          });
        }, 2000);

      });



      $(iframeLazy).viewportChecker({
        offset: 0,
        repeat: true, // Add the possibility to remove the class if the elements are not visible
        callbackFunction: function(elem, action){
          try {
            var player = new Vimeo.Player(elem);
            if(action == 'add'){
              player.play();
            } else {
              player.pause();
              console.log('paused');
            }
          }
          catch(err) {
            //console.log(err);
            //  var player = "";
          }

          },

      });
    }
    iframeLazy();
        // Select all links with hashes
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
          &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });


      // $(document).on('click', '.lity-class a', lity);
      function archiveItemLoad(){
        var archiveItem = $(".archive_item");

        $(archiveItem).each(function(){
          var $this = $(this);
          var vimeoiframe = $this.find("iframe");
          var archive_video = $this.find(".archive_video");
          var dataSrc = $(vimeoiframe).data('src');
          var dataStart = $(vimeoiframe).data('start');

          $(vimeoiframe).attr('src', dataSrc).load(function(){

                  var player = new Vimeo.Player(vimeoiframe);
                  player.setCurrentTime(dataStart).then(function(seconds) {
                    player.pause();
                  });
                  setTimeout(function(){ player.pause(); $(archive_video).removeClass('iframeloading'); }, 2000);
              });
        });
      }

      function archiveItemMouse(){
      var archiveItem = $(".archive_item");
      $(archiveItem).on({

          mouseenter: function () {
            var vimeoiframe = $(this).find("iframe");
            var player = new Vimeo.Player(vimeoiframe);
            player.play();
          },
          mouseleave: function () {
            var vimeoiframe = $(this).find("iframe");
            var player = new Vimeo.Player(vimeoiframe);
            player.pause();
          }
      });
      }
      function mobileLazy(){
        var mobileLazy = $('.mobileLazy');
        $(mobileLazy).each(function(){

          var $this = $(this);
          var iframeLazySrc = $this.data('src');
          setTimeout(function(){
            $this.attr('src', iframeLazySrc).load(function(){
              console.log('mobileLazy loaded 2s later');
              var player = new Vimeo.Player($this);
              if($this.is('.full-visible')){
                player.play();
                console.log('mobileLazy full visible played');
              } else{
                player.pause();
                console.log('mobileLazy onload paused');
              }
            });
          }, 4000);

        });


      }

      var screenMobile = window.matchMedia("only screen and (max-width: 767px)");

      if (screenMobile.matches) {
        console.log('Mobile');
        mobileLazy();
      }
      else {
        console.log('not Mobile');
        iframeLazy();
        archiveItemLoad();
        archiveItemMouse();
      }

      $(".navbar-toggler").click(function(){
        $(this).toggleClass("menu-open");
        $('.wrapper-navbar').toggleClass("menu-open");
      });

      $('[data-fancybox="gallery"],[data-fancybox="top_images"]').fancybox({
      	loop: true,
        smallBtn: true,
        protect: true,
        btnTpl: {
          smallBtn:
            '<button data-fancybox-close class="fancybox-close-small" title="{{CLOSE}}"><span class="gold heading close-icon">X</span></button>',

          }
      });
		$('[data-fancybox]').fancybox({
iframe: {
    // Iframe tag attributes
    attr: {
      allow: "autoplay; fullscreen"
    }
  },
		});
      $(".fancybox-class a").fancybox({
        ratio: 2.45
      });
});

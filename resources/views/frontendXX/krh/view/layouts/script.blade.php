  <!-- javascript libraries -->
  <script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/vendors.min.js')}}"></script>
  <!-- slider revolution core javaScript files -->
  <script type="text/javascript" src="{{asset('frontend/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
  <!-- slider revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
  <!-- <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.video.min.js')}}"></script> -->

  <!-- Slider's main "init" script -->
  <script>
      var tpj = jQuery;
      var revapi7;
      var $ = jQuery.noConflict();
      tpj(document).ready(function () {
          if (tpj("#demo-corporate-slider").revolution == undefined) {
              revslider_showDoubleJqueryError("#demo-corporate-slider");
          } else {
              revapi7 = tpj("#demo-corporate-slider").show().revolution({
                  sliderType: "standard",
                  /* sets the Slider's default timeline */
                  delay: 9000,
                  /* options are 'auto', 'fullwidth' or 'fullscreen' */
                  sliderLayout: 'fullscreen',
                  /* RESPECT ASPECT RATIO */
                  autoHeight: 'off',
                  /* options that disable autoplay */
                  stopLoop: "off",
                  stopAfterLoops: -1,
                  stopAtSlide: -1,
                  navigation: {
                      keyboardNavigation: 'on',
                      keyboard_direction: 'horizontal',
                      mouseScrollNavigation: 'off',
                      mouseScrollReverse: 'reverse',
                      onHoverStop: 'off',
                      arrows: {
                          enable: true,
                          style: 'hesperiden',
                          rtl: false,
                          hide_onleave: false,
                          hide_onmobile: true,
                          hide_under: 500,
                          hide_over: 9999,
                          hide_delay: 200,
                          hide_delay_mobile: 1200,
                          left: {
                              container: 'slider',
                              h_align: 'left',
                              v_align: 'center',
                              h_offset: 50,
                              v_offset: 0
                          },
                          right: {
                              container: 'slider',
                              h_align: 'right',
                              v_align: 'center',
                              h_offset: 50,
                              v_offset: 0
                          }
                      },
                      bullets: {

                          enable: true,
                          style: 'hermes',
                          tmp: '',
                          direction: 'horizontal',
                          rtl: false,

                          container: 'layergrid',
                          h_align: 'center',
                          v_align: 'bottom',
                          h_offset: 0,
                          v_offset: 30,
                          space: 12,

                          hide_onleave: false,
                          hide_onmobile: true,
                          hide_under: 0,
                          hide_over: 500,
                          hide_delay: true,
                          hide_delay_mobile: 500

                      },
                      touch: {
                          touchenabled: 'on',
                          touchOnDesktop: "on",
                          swipe_threshold: 75,
                          swipe_min_touches: 1,
                          swipe_direction: 'horizontal',
                          drag_block_vertical: true
                      }
                  },
                  responsiveLevels: [1240, 1024, 768, 480],
                  visibilityLevels: [1240, 1024, 768, 480],
                  gridwidth: [1240, 1024, 768, 480],
                  gridheight: [930, 850, 900, 850],
                  /* Lazy Load options are "all", "smart", "single" and "none" */
                  lazyType: "smart",
                  spinner: "spinner0",
                  parallax: {
                      type: "scroll",
                      origo: "slidercenter",
                      speed: 400,
                      levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 5],
                  },
                  shadow: 0,
                  shuffle: "off",
                  fullScreenAutoWidth: "on",
                  fullScreenAlignForce: "on",
                  fullScreenOffsetContainer: "nav",
                  fullScreenOffset: "",
                  hideThumbsOnMobile: "off",
                  hideSliderAtLimit: 0,
                  hideCaptionAtLimit: 0,
                  hideAllCaptionAtLilmit: 0,
                  debugMode: false,
                  fallbacks: {
                      simplifyAll: "off",
                      nextSlideOnWindowFocus: "off",
                      disableFocusListener: false,
                  }
              });
          }
      }); /*ready*/
  </script>
  <script type="text/javascript" src="{{asset('frontend/js/main.js')}}"></script>
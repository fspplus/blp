﻿<script src="/views/sliders/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1920;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            //$Jssor$.$AddEvent(window, "load", ScaleSlider);
            //$Jssor$.$AddEvent(window, "resize", ScaleSlider);
            //$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .jssora061 {display:block;position:absolute;cursor:pointer;}
        .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
        .jssora061:hover {opacity:.8;}
        .jssora061.jssora061dn {opacity:.5;}
        .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
        #jssor_1 img{object-position: center top;}
        .slider-detail h1{
            color: white; 
        }
        @media screen and (min-width: 768px){
            .slider-detail{
                left: 10%; 
                position:absolute;
                top:30%;
                width:100%;
                height:auto;
                color:#ffffff;
                line-height:1.88;
                text-align:left;
                padding:10px 10px 10px 10px;
                box-sizing:border-box;
                background-clip:padding-box;
            }
        }
        @media screen and (max-width: 768px){
            .slider-detail{
                position:absolute;
                top:30%;
                width:100%;
                height:auto;
                color:#ffffff;
                line-height:1.88;
                text-align:center;
                padding:10px 10px 10px 10px;
                box-sizing:border-box;
                background-clip:padding-box;
            }
        }
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1920px;height:900px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <?php if(false){ ?>
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <?php } ?>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1920px;height:900px;overflow:hidden;">
            
            <?php 
            
                $sliders = get_wpsliderblps();
                foreach($sliders as $slider){
            ?>
                <div>
					<?php
                    if(isset($slider['link_article'])&&$slider['link_article']!=''){
                        echo '<a href="'.$slider['link_article'].'"><img data-u="image" src="'.$slider['better_featured_image']['media_details']['sizes']['slider-content']['source_url'].'" /></a>';
                    }else{
                        echo '<img data-u="image" src="'.$slider['better_featured_image']['media_details']['sizes']['slider-content']['source_url'].'" />';
                    }?>
                    <!--<img data-u="image" src="<?php echo $slider['better_featured_image']['media_details']['sizes']['slider-content']['source_url']; ?>" />-->
                    <div class="slider-detail">
                        <h1 class="d-none" style="font-size: 4rem;"><?php echo $slider['title']['rendered']; ?></h1>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
            
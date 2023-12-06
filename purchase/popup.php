<?php
include 'header3.php';
?>
   <head>
      <title>Dynamic Popup</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
      <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
      
      <script>
         $( document ).on( "pagecreate", "#demo-page", function() {
            $( ".nature_view" ).on( "click", function() {
               var target = $( this ),
               img1 = target.find( "h2" ).html(),
               img2 = target.find( "p" ).html(),
               img3 = target.attr( "id" ),
               closebtn = '<a href = "#" data-rel = "back" class = "ui-btn ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>',
            
               header = '<div data-role = "header"> <h2>' + img1 + ' ' + img2 + '</h2></div>',
                  
               img = '<img src = "assets/images/popup.jpg" alt = "' + img1 + '" class = "img_view">',
                  
               popup = '<div data-role = "popup" id = "popup-' + img3 + '" data-short = "' + img3 +'"  data-theme = "none" data-overlay-theme = "a"></div>';
     
               $(header) 
               .appendTo(
                  $(popup) 
                  .appendTo($.mobile.activePage)
                  .popup()
               )
               .toolbar()
               .before(closebtn)
               .after(img);
         
               $( ".img_view", "#popup-" + img3 ).load(function() {
                  $( "#popup-" + img3 ).popup( "open" );
                  clearTimeout( fallback );
               });
         
               var fallback = setTimeout(function() {
                  $( "#popup-" + img3 ).popup( "open" );
               }, 2000);
            });
         
            $( document ).on( "popupbeforeposition", ".ui-popup", function() {
               var image = $( this ).children( "img" ),
               height = image.height(),
               width = image.width();
               $( this ).attr({ "height": height, "width": width });
               var maxHeight = $( window ).height() - 75 + "px";
               $( "img.img_view", this ).css( "max-height", maxHeight );
            });
         
            $( document ).on( "popupafterclose", ".ui-popup", function() {
               $( this ).remove();
            });
         });
      </script>
   </head>

   <body>
      <div data-role = "page" id = "demo-page" data-url = "demo-page">
         <div data-role = "header" data-theme = "b">
            <h2>Header</h2>
         </div>
         
         <div role = "main" class = "ui-content">
            <ul data-role = "listview">
               <li><a href = "#" class = "nature_view">
                  <img src = "assets/images/popup.jpg" alt = "BMW">
                  <h2>Wonderful</h2>
                  <p>Nature</p></a>
               </li>
            </ul>
         </div>
         
         <div data-role = "header" data-theme = "b">
            <h2>Footer</h2>
         </div>
      </div>
   </body>
</html>
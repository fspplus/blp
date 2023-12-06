

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js?rand=<?php echo rand(); ?>"></script>
    <!-- Custom JS-->
    <script src="js/custom.js?rand=<?php echo rand(); ?>"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vfw99mbjhi171dukd7pq7qaq36ecx4xv8929drr3xaf1gr51"></script>
    <script>
        tinymce.init({ 
            selector:'textarea#textarea-input', 
              height: 400,
              theme: 'modern',
              plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
              toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
              image_advtab: true,
              templates: [
                { title: 'Template 1', desc: 'This content will provide the basic template for the input as an inline-text.' ,content: '<p>Just type in your words inside this block right here!</p>' },
                { title: 'template 2', desc: 'This content is the sample of text input with blocks of tables.', content: "<html><head></head><body><p>Just type in your words inside this block right here!</p><table class='acctab' style='border-collapse: collapse; width: 100%;' border='1'><tbody><tr><td style='width: 16.6667%;'>And then</td><td style='width: 16.6667%;'>Just insert</td><td style='width: 16.6667%;'>Your Desired Content</td><td style='width: 16.6667%;'>Right here!</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td></tr><tr><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td></tr><tr><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td></tr><tr><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td><td style='width: 16.6667%;'>Fill</td></tr></tbody></table></body></html>" }
              ],
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
              ]
        });
    </script>

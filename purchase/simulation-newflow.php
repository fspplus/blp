<html>
    <body>
  <?php 
        
header("HTTP/1.0 404 Not Found");
        session_start();
        $urlmeta = "Simulasi Produk";
        include 'header-new.php'; ?>
    <div class="formloader">
        <?php include 'formaplikasi2/form1.php'; ?>
    </div>
  <?php include 'footer.php'; ?>
</body>
    <script>
        $(document).ready(function() {
            $('.formloader a').click(function(e) {
                return false;
                // check if the html5 history api is available in the browser first
                if (window.history && window.history.pushState) {
                  // push the state to the url in the address bar
                  history.pushState({}, e.target.textContent, e.target.href);
                }
            });
        });
    </script>
</html>
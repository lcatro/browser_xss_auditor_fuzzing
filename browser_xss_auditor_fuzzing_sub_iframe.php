
<html>

    <script>
        var check_xss_bypass_state=false;
        
        function report_payload() {
            var parentwin = window.parent;
            var post_result={
                'url':window.location.href,
                'state':check_xss_bypass_state
            };
            
            parentwin.postMessage(post_result,'*');
            clearInterval();
        }
        
        window.setTimeout(report_payload,0);
        
    </script>
    
    <body>
        
        <div id="reflect_xss_in_dom">
            <?php
                if (isset($_GET['reflect_xss_in_dom']))
                    echo $_GET['reflect_xss_in_dom'];
            ?>
        </div>
        <div id="reflect_xss_in_element_attribute">
            <?php
                if (isset($_GET['reflect_xss_in_element_attribute']))
                    echo '<img src="'.$_GET['reflect_xss_in_element_attribute'].'" />';
            ?>
        </div>
        
    </body>

</html>

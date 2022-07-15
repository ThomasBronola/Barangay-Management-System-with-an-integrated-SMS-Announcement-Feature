<?php    
    // CODE HERE FOR SESSION FOOTER            
    if ($_SESSION["user_type"] == "admin" || $_SESSION["user_type"] == "captain" || $_SESSION["user_type"] == "secretary" || $_SESSION["user_type"] == "systemadmin"){
        echo '
        <footer>
            <div class="container">
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-4"><span class="copyright text-dark">Copyright © Avellana 2022</span></div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item"><a class="text-dark" href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a class="text-dark" href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        ';    
    }
    
    else {
        echo '
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><span class="copyright text-dark">Copyright&nbsp;© Avellana 2022</span></div>
                    <div class="col-md-6">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item"><a class="text-dark" href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a class="text-dark" href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>        
        ';
    }      
?>


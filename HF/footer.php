<?php

    $u_id = "Admin1";
    // CODE HERE FOR SESSION FOOTER

    if ($u_id == "Admin"){
        echo '
        <footer>
            <div class="container">
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-4"><span class="copyright">Copyright © Avellana 2022</span></div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#">Terms of Use</a></li>
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
                    <div class="col-md-6"><span class="copyright">Copyright&nbsp;© Avellana 2022</span></div>
                    <div class="col-md-6">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        ';
    }


?>


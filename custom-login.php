<?php
//change logo to: https://securihost.s3.amazonaws.com/images/wordpress-logo.png for SecuriHost
//change logo to: https://tervosystems.s3.amazonaws.com/images/wordpress-logo.png for Tervo Systems


function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
			background-image: url(https://tervosystems.s3.amazonaws.com/images/wordpress-logo.png);	<!-- Change This -->
			
            padding-bottom: 30px;
			background-size: 310px 70px;
			width: 310px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return 'http://tervosystems.com';		// Change This
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Powered by Tervo Systems';		//Change This
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


?>

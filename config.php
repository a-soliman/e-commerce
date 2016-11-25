<<?php 
define ('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/');
define ('CART_COOKIE','SBwi72UCkLwiqzz2');
define ('CART_COOKIE_EXPIRE', time() + (86400 * 30));
define ('TAXRATE', 0.087); //sales tax rate. set to 0 if you aren't charging any tax

define ('CURENCY', 'usd');
define ('CHECKOUTMODE', 'TEST'); // Change "TEST" to "LIVE" when you're ready to go live

if(CHECKOUTMODE == 'TEST') {
	define('STRIPE_PRIVATE','insertYourOwnStripeKey');
	define('STRIPE_PUBLIC','insertYourOwnStripeKey')
}

if(CHECKOUTMODE == 'LIVE') {
	define('STRIPE_PRIVATE','insertYourOwnStripeKey');
	define('STRIPE_PUBLIC','insertYourOwnStripeKey')
}
 ?>
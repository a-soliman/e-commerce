<?php
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/tutorial/');
define('CART_COOKIE','SBwi72UCklwiqzz2');
define('CART_COOKIE_EXPIRE',time() + (86400 *30));
define('TAXRATE',0.087); //Sales tax rate. Set to 0 if you are arn't charging tax.

define('CURRENCY', 'usd');
define('CHECKOUTMODE','TEST'); //Change TEST to LIVE when you are ready to go LIVE

if(CHECKOUTMODE == 'TEST'){
  define('STRIPE_PRIVATE','sk_test_n9PH4EiHTomoRhS5xu08lDCU');
  define('STRIPE_PUBLIC', 'pk_test_jWgX9f7MyxLlP36ZwiPyfPtC');
}

if(CHECKOUTMODE == 'LIVE'){
  define('STRIPE_PRIVATE','insertyourownstripekey');
  define('STRIPE_PUBLIC', 'insertyourownstripekey');
}

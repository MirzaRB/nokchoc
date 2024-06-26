<?php

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/*
Plugin Name: Gravity Forms PayPal Payments Pro Add-On
Plugin URI: https://gravityforms.com
Description: Integrates Gravity Forms with PayPal Payments Pro, enabling end users to purchase goods and services through Gravity Forms.
Version: 2.7
Author: Gravity Forms
Author URI: https://gravityforms.com
License: GPL-2.0+
Text Domain: gravityformspaypalpaymentspro
Domain Path: /languages

------------------------------------------------------------------------

Copyright 2009-2021 Rocketgenius, Inc.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

define( 'GF_PAYPALPAYMENTSPRO_VERSION', '2.7' );

add_action( 'gform_loaded', array( 'GF_PayPalPaymentsPro_Bootstrap', 'load' ), 5 );

class GF_PayPalPaymentsPro_Bootstrap {

	public static function load(){

		if ( ! method_exists( 'GFForms', 'include_payment_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-paypalpaymentspro.php' );

		GFAddOn::register( 'GFPayPalPaymentsPro' );
	}

}

function gf_paypalpaymentspro(){
	return GFPayPalPaymentsPro::get_instance();
}

<?php
add_filter( 'woocommerce_distance_rate_shipping_rule_cost_distance_shipping', function( $rule_cost, $rule, $distance, $package ) {
	$order_total = $package['contents_cost'];
	if ( $distance <= 15 ) {
		$rule_cost = 0;
	}
	if ( $distance > 15 ) {
		$rule_cost = 50;
	}
	if ( $order_total > 1000 && $distance > 15 ) {
		$rule_cost = 0;
	}
	
	if ( $distance > 30 ) {
		$rule_cost = 100;
	}
	if ( $order_total > 2000 && $distance > 30 ) {
		$rule_cost = 0;
	}
	if ( $distance > 50 && $distance <= 100) {
		$rule_cost = 200;
	}
	if ( $order_total > 4000 && $distance > 50 && $distance <= 100) {
		$rule_cost = 0;
	}

  return $rule_cost;
}, 10, 4 );

<?php
/**
 * Plugin Name: Widget seller
 */

//The function below creates the form on the home page
function widget_store_form() {
	$content = '';
	$content .= '<div style="text-align:center; background-color: white; color: black; border-radius:25px; padding:20px;">';
	$content .= '<form method="post" attribute="post" action="http://s904196968.websitehome.co.uk/widgets-ordered">';
	$content .= '<h3>Widget Orderer</h3>';
	$content .= '<hr></hr>';
	$content .= '<p>Please enter the amount of widgets you would like to order:</p>';
	$content .= '<input type="number" name="Widgets" required><br>';
	$content .= '<input type="submit" name="Submitwidgets"><br>';
	$content .= '</form>';
	$content .= '</div>';
	
	return $content;
}
//This code adds the short code allow it to be added to wordpress
add_shortcode('widget_store', 'widget_store_form'); 

//The function below performs the math and creates the form on the ordered page
function widget_order_form() {
	//starts the form
	$content = '';
	$content .= '<div style="text-align:center; background-color: white; color: black; border-radius:25px; padding:20px;">';
	//checks to see if the user filled in the form
	if(isset($_POST["Widgets"])) {
		$widgetamout = $_POST["Widgets"];
		$widgetsleft = $widgetamout;
		//checks how many 5000 packs are required
		if($widgetsleft > 0) {
			$widgets5k = $widgetsleft / 5000;
			$widgets5k = floor($widgets5k);
			$widgetsleft = $widgetsleft - ($widgets5k * 5000);
		} else {
			$widgets5k = 0;
		}
		//checks how many 2000 packs are required
		if($widgetsleft > 0) {
			$widgets2k = $widgetsleft / 2000;
			$widgets2k = floor($widgets2k);
			$widgetsleft = $widgetsleft - ($widgets2k * 2000);
		} else {
			$widgets2k = 0;
		}
		//checks how many 1000 packs are required
		if($widgetsleft > 0) {
			$widgets1k = $widgetsleft / 1000;
			$widgets1k = floor($widgets1k);
			$widgetsleft = $widgetsleft - ($widgets1k * 1000);
		} else {
			$widgets1k = 0;
		}
		//checks how many 500 packs are required
		if($widgetsleft > 0) {
			$widgets5 = $widgetsleft / 500;
			$widgets5 = floor($widgets5);
			$widgetsleft = $widgetsleft - ($widgets5 * 500);
		} else {
			$widgets5 = 0;
		}
		//checks how many 250 packs are required
		if($widgetsleft > 0) {
			$widgets25 = $widgetsleft / 250;
			$widgets25 = floor($widgets25);
			$widgetsleft = $widgetsleft - ($widgets25 * 250);
				if($widgetsleft > 0) {
					$widgets25 = $widgets25 + 1;
				}
		} else {
			$widgets25 = 0;
		}
		//checks if two 250 pack can be upgrade to a 500
		if($widgets25 >= 2) {
			while($widgets25 >= 2) {
				$widgets5 = $widgets5 + ($widgets25 / 2);
				$widgets25 = $widgets25 - 2;
			}
		}
		//handles numbers below 250 and gets a pack of 250
		if($widgetsleft > 0) {
		$extrawidgets = 250 - $widgetsleft;
		} else {
		$extrawidgets = 0;
		}
		//displays the form
		$content .= '<h3>Widget Ordered</h3>';
		$content .= '<hr></hr>';
		$content .= '<p> 5,000 widgets x ' . $widgets5k;
		$content .= '</p>';
		$content .= '<p> 2,000 widgets x ' . $widgets2k;
		$content .= '</p>';
		$content .= '<p> 1,000 widgets x ' . $widgets1k;
		$content .= '</p>';
		$content .= '<p> 500 widgets x ' . $widgets5;
		$content .= '</p>';
		$content .= '<p> 250 widgets x ' . $widgets25;
		$content .= '</p>';
		$content .= 'Extra widgets ordered ' . $extrawidgets;
		$content .= '<p> widgets ordered ' . $widgetamout;
		$content .= '</p>';
		$content .= '<form action="http://s904196968.websitehome.co.uk/">';
		$content .= '<p><input type="submit" value="Reset"/></p>';
		$content .= '</form>';
	} else {
		$content .= '<h3>Please return to the widget order page</h3>';
		$content .= '<hr></hr>';
		$content .= '<form action="http://s904196968.websitehome.co.uk/">';
		$content .= '<p><input type="submit" value="Reset"/></p>';
		$content .= '</form>';
	}
	$content .= '</div>';
	return $content;
}
//This code adds the short code allow it to be added to wordpress
add_shortcode('widget_order', 'widget_order_form'); 
?>
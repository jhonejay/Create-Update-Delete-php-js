<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function __autoload($class_name) {
	$class_name = strtolower($class_name);
  $path = LIB_PATH.DS."{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}

function include_layout_template($template="") {
	include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

function log_action($action, $message="") {
	$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, 0755); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

// ---------------------------------------------------------------------
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="cart.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table border="1" cellpadding="5" cellspacing="0">';
		$output[] = '<tr>';
		$output[] = '<th>Remove</th>';
		$output[] = '<th>Product Name</th>';
		$output[] = '<th>Price</th>';
		$output[] = '<th>Quantity</th>';
		$output[] = '<th>Sub-Total</th>';
		$output[] = '</tr>';
		foreach ($contents as $id=>$qty) {
			//$sql = 'SELECT * FROM tblproduct WHERE id = '.$id;
			//$result = $db->query($sql);
			//$row = $result->fetch();
			$product = Product::find_by_id($id);
			//extract($row);
			$output[] = '<tr>';
			$output[] = '<td align="center"><a href="cart.php?action=delete&id='.$product->id.'" style="color:#000099"><img src="images/delete.png"></a></td>';
			$output[] = '<td>'.$product->pname.'</td>';
			$output[] = '<td align="center">'.$product->sellingprice.'</td>';
			$output[] = '<td align="center"><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td align="center">'.($product->sellingprice * $qty).'</td>';
			$total += $product->sellingprice * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>'.$total.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p align="center">You shopping cart is empty.</p>';
	}
	return join('',$output);
}

?>
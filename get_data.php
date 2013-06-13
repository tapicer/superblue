<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once ('codebird.php');
\Codebird\Codebird::setConsumerKey('Np5h53djFakmjcY1kJY8oA', '1H2H8ErxcILCH6tehbG4xUVzGC2qdEZlG21xTMgU');
$cb = \Codebird\Codebird::getInstance();
$cb->setToken('15245643-3CUKexYi12SJvvcWWGW2BruxDnVLmX91OosGbCrB7', 'larXQZEcgRfQgvfqBvTSWbHzaIpbfqW0c2nRWtqc');
$items = $cb->statuses_userTimeline('count=50&screen_name=dolarblue');
$data = array();
foreach ($items as $item) {
	if (is_object($item)) {
		$timestamp = strtotime($item->created_at);
		if (preg_match('/\$(\d+,\d+)/', $item->text, $matches)) {
			$value = str_replace(',', '.', $matches[1]);
			$day = date('d-m-Y', $timestamp);
			if (!isset($data[$day])) {
				$data[$day] = $value;
			}
			//echo date('d-m-Y', $timestamp) . ' ' . $value . '<br/>';
		}
	}
}
//echo '<pre>';
//var_dump($data);
file_put_contents('data.txt', json_encode($data));

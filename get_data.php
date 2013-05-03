<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$items = json_decode(file_get_contents('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=DolarBlue&count=50'));
$data = array();
foreach ($items as $item) {
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
//echo '<pre>';
//var_dump($data);
file_put_contents('data.txt', json_encode($data));
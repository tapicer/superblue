<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$items = json_decode(shell_exec('curl --get \'https://api.twitter.com/1.1/statuses/user_timeline.json\' --data \'count=50&screen_name=dolarblue\' --header \'Authorization: OAuth oauth_consumer_key="Np5h53djFakmjcY1kJY8oA", oauth_nonce="d452d260938c1ffdcdd799e097f14e5c", oauth_signature="ptEG95m4TztEil7t0n%2Btl%2BdH54I%3D", oauth_signature_method="HMAC-SHA1", oauth_timestamp="1371080636", oauth_token="15245643-3CUKexYi12SJvvcWWGW2BruxDnVLmX91OosGbCrB7", oauth_version="1.0"\''));
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

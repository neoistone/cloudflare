<?php

$authemail = "Your Cloudflare Email";
$authkey   = "Your Cloudflare ApiKey";

$ch = curl_init("https://api.cloudflare.com/client/v4/zones");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'X-Auth-Email: '.$authemail,
	    'X-Auth-Key: '.$authkey,
	    'Content-Type: application/json'
	    ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$r = json_decode($response, true);
$result = $r['result'];

$count = 1;
foreach ($result as $zone)
{
  echo $count.'.&nbsp'.$zone['name'].'&nbsp('.$zone['id'].')<br>';
  $count++;
}
?>

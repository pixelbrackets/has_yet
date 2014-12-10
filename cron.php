<?php

// load codebird
require __DIR__ . '/vendor/autoload.php';

// read configuration file
$configurationJSON = file_get_contents(__DIR__ . '/configuration.json');
if ($configurationJSON == FALSE) {
	echo 'Error: Can not read the configuration file' . PHP_EOL;
}
$configuration = json_decode($configurationJSON, true);

// set access tokens
\Codebird\Codebird::setConsumerKey($configuration['configuration']['apiKey'], $configuration['configuration']['apiSecret']);
$cb = \Codebird\Codebird::getInstance();
$cb->setToken($configuration['configuration']['accessToken'], $configuration['configuration']['accessSecret']);

// select status message
$status = '';
$dateKey = date($configuration['configuration']['dateformat']);
if (!empty($configuration['statuses'][$dateKey])) {
	// special message exists
	$status = $configuration['statuses'][$dateKey];
}
else {
	// fallback
	// pick random default status
	shuffle($configuration['statuses']['default']);
	$status = $configuration['statuses']['default'][0];
}

// upload media files
$media = '';
if (!empty($status[1])) {
	$mediaUpload = $cb->media_upload(array(
		'media' => $status[1]
	));
	$media = $mediaUpload->media_id_string;
}

// send tweet
$params = array(
	'status' => $status[0],
);
if (!empty($media)) {
	$params['media_ids'] = $media;
}
$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
$statusUpdate = $cb->statuses_update($params);

// show API response
if (isset($statusUpdate['id_str'])) {
	echo 'Success: Created tweet https://twitter.com/' . $statusUpdate['user']['screen_name'] . '/status/' . $statusUpdate['id_str'] . PHP_EOL;
}
else {
	echo 'Error: Can not create tweet (' . print_r($statusUpdate['errors'], true) . ')' . PHP_EOL;
}

?>
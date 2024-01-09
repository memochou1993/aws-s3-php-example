<?php

require './vendor/autoload.php';

use Aws\Sdk;

$sharedConfig = [
    'region' => 'ap-northeast-1',
];

$sdk = new Sdk($sharedConfig);

$s3 = $sdk->createS3();

$result = $s3->listBuckets();

foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}

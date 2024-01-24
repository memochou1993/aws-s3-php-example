<?php

require './vendor/autoload.php';

use Aws\Sdk;

$sharedConfig = [
    'region' => 'ap-northeast-1',
];

$sdk = new Sdk($sharedConfig);

$s3 = $sdk->createS3();

$bucketName = 'your-bucket';
$filePath = './example.txt';
$objectName = 'example.txt';

$s3->putObject([
    'Bucket' => $bucketName,
    'Key'    => $objectName,
    'Body'   => fopen($filePath, 'r'),
]);

$result = $s3->listObjects(['Bucket' => $bucketName]);

foreach ($result['Contents'] as $object) {
    echo $object['Key'] . "\n";
}

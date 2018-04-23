<?php

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;



function ListBucket(){
    $s3Client = new S3Client([
        'region' => 'us-east-1',
        'version' => '2006-03-01'
    ]);
    $buckets = $s3Client->listBuckets();
    $bucket_names = array();
    foreach ($buckets['Buckets'] as $bucket){
        array_push($bucket_names, $bucket['Name']);
    }
    return $bucket_names;

}


function RenderS3Template($bucket_names){
    $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
    $twig = new Twig_Environment($loader, array());
    echo $twig->render('s3list.twig', array(
        'buckets' => $bucket_names,
    ));
}


RenderS3Template(ListBucket());


?>
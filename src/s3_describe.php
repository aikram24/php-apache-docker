<?php
    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;
    $bucket = $_GET['bucketname'];

    function GetBucketObjects($bucket){
        $objectsArray = array();
        $s3 = new S3Client([
            'region' => 'us-east-1',
            'version' => '2006-03-01'
        ]);    
        $objects = $s3->getIterator('ListObjects', array('Bucket' => $bucket));
        foreach ($objects as $object) {
            array_push($objectsArray, $object['Key']);
        }
        return $objectsArray;
    }


    function RenderS3Template($objects, $bucket){
        $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
        $twig = new Twig_Environment($loader, array());
        echo $twig->render('s3listbucket.twig', array(
            'objects' => $objects,
            'bucket' => $bucket,
        ));
    }

    RenderS3Template(GetBucketObjects($bucket), $bucket);

?>
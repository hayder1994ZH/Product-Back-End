<?php 
namespace App\Helpers;

class Utilities{

    public static $imageSize = '';
    public static $audioBucket = '/live_audio/';
    public static $imageBucket = '/images/';
    public static $videoBucket = '/live_videos/';
    public static $videoBucketObject = 'live_videos';
    public static $audioBucketObject = 'live_audio';
    public static $imagesBucketObject = 'live_images';

    public function getName(){
        return 'Name';
    }
}
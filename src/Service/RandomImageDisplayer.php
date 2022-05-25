<?php

namespace App\Service;



Class RandomImageDisplayer
{

    public function displayRandomImages()
    {
        $imagesDir = 'assets/images/error_pages/';

        $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $randomImage = $images[array_rand($images)];
        
        return $randomImage;
        
    }

}
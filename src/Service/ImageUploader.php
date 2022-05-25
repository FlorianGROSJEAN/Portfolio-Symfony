<?php

namespace App\Service;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\File\UploadedFile;

Class ImageUploader
{

    public function createFileName (UploadedFile $uploadedFile) :string
    {

        return uniqid() . '.' . $uploadedFile->guessExtension();
    }


    public function ulpoadFile(Form $form, string $fieldName, string $targetDirectory)
    {
        $fileUploaded = $form->get($fieldName)->getData();

        $newFileName = $this->createFileName($fileUploaded);

        $fileUploaded->move($targetDirectory, $newFileName);

        return $newFileName;
    }

    public function uploadImage(Form $form)
    {
        $solo = $form->getData();
        $newFileName = $this->ulpoadFile($form, 'image', $_ENV['IMAGES']);
        $solo->setImage($newFileName);
    }
}
<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Theme;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class AppFixtures extends Fixture
{
    public function __construct(UploaderHelper $uploaderHelper)
    {
        $this->uploaderHelper = $uploaderHelper;
    }

    // // symfony console doctrine:fixtures:load 
    public function load(ObjectManager $manager): void
    {
        $themes = array(
            'Fleuve & Hydrologie',
            'Littoral & Maritime',
            'Forêt',
            'Géologie',
            'Santé',
            'Urbanisation',
            'Agriculture',
            'Energie',
            'Biodiversité',
            'Occupation des sols',
            'Risques'
        );

        foreach($themes as $value){

            $src = __DIR__.'/images/themes/'.$value.'.png';

            $file = new UploadedFile(
                $src,
                $value.'.png',
                filesize($src),
                null,
                true //  Set test mode true !!! " Local files are used in test mode hence the code should not enforce HTTP uploads."
            );

            $theme = new Theme();
            $theme->setTheme($value);
            $theme->setImageFile($file);
            // $imageFilename = $this->fakeUploadImage($value);
    
    
            $manager->persist($theme);
        }

        $manager->flush();
    }

    // private function fakeUploadImage(String $name): string
    // {
    //     $fs = new Filesystem();
    //     $targetPath = sys_get_temp_dir().'/'.$name.'.png';
    //     $fs->copy(__DIR__.'/images/themes/'.$name.'.png', $targetPath, true);
    //     return $this->uploaderHelper
    //         ->uploadArticleImage(new File($targetPath));
    // }
}
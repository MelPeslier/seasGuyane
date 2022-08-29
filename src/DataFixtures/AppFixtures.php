<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Date;
use Faker\Generator;
use App\Entity\Capteur;
use App\Entity\Echelle;
use App\Entity\Vehicule;
use App\Entity\Resolution;
use App\Entity\Thematique;
use App\Entity\Fournisseur;
use App\Entity\VehiculeSpe;
use App\Entity\TypeDeProduit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
     private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    // // symfony console doctrine:fixtures:load --purge-with-truncate --purge-exclusions=user
    public function load(ObjectManager $manager): void
    {
    //     // date
    //     for ($i=0; $i < 10000; $i++) {
    //         $date = new Date();
    //         $date->setDate($this->faker->unique()->date());
    //         $manager->persist($date);
    //     }
    //     // echelle
    //     for ($i=0; $i < 20; $i++) { 
    //         $echelle = new Echelle();
    //         $echelle->setEchelle($this->faker->unique()->numerify('echelle-##'));
    //         $manager->persist($echelle);
    //     }
    //     // capteur
    //     $capteurArray = array('Optique', 'Infrarouge', 'Radar', 'LIDAR');
    //     foreach ($capteurArray as $value) {
    //         $capteur = new Capteur();
    //         $capteur->setCapteur($value);
    //         $manager->persist($capteur);
    //     }

    //     // // véhicule
    //     // $vehiculeArray = array('Satellite', 'Avion', 'Drone', 'Ballon');
    //     // foreach ($capteurArray as $value) {
    //     //     $vehicule = new Vehicule();
    //     //     $vehicule->setVehicule($value);
    //     //     $manager->persist($vehicule);
            
    //     //     // vehicule_spe
    //     //     if (str_contains($value, 'Satellite')) {
    //     //         $vehicule_speArray = array('SPOT 6/7', 'Pléiades', 'Pléiades Néo');
    //     //         foreach ($vehicule_speArray as $value) {
    //     //             $vehicule_spe = new VehiculeSpe();
    //     //             $vehicule_spe->setVehiculeSpe($value);
    //     //             $vehicule_spe->setVehicule($vehicule);
    //     //             $manager->persist($vehicule_spe);
    //     //         }
    //     //     }
    //     // }

    //     // résolution
    //     for ($i=1; $i < 100; $i++) { 
    //         $resolution = new Resolution();
    //         $resolution->setResolution($i);
    //         $manager->persist($resolution);
    //     }

    //     // fournisseur
    //     for ($i=0; $i < 100; $i++) { 
    //         $fournisseur = new Fournisseur();
    //         $fournisseur->setFournisseur($this->faker->unique()->word());
    //         $manager->persist($fournisseur);
    //     }

    //     // // type_de_produit
    //     // $type_de_produitArray = array('Produit fini', 'Produit à Valeur ajoutée', 'Carte', 'Jeu de données');
    //     // foreach ($type_de_produitArray as $value) {
    //     //     $type_de_produit = new TypeDeProduit();
    //     //     $type_de_produit->setTypeDeProduit($value);
    //     //     $manager->persist($type_de_produit);
    //     // }

    //     // // thematique
    //     // $thematiqueArray = array('Fleuve & Hydrologie', 'Littoral & Maritime', 'Forêt', 'Géologie', 
    //     //     'Santé', 'Urbanisation', 'Agriculture', 'Énergie', 'Biodiversité', 'Occupation des sols', 'Risques');
    //     // foreach ($thematiqueArray as $value) {
    //     //     $thematique = new Thematique();
    //     //     $thematique->setThematique($value);
    //     //     $manager->persist($thematique);
    //     // }        

    //     $manager->flush();
    }
}

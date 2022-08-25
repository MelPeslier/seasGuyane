<?php

namespace App\Form;

use App\Entity\Date;
use App\Entity\Capteur;
use App\Entity\Echelle;
use App\Entity\Vehicule;
use App\Entity\DonneeSeas;
use App\Entity\Resolution;
use App\Entity\Fournisseur;
use App\Entity\TypeDeProduit;
use App\Repository\DateRepository;
use App\Repository\CapteurRepository;
use App\Repository\EchelleRepository;
use App\Repository\VehiculeRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\FournisseurRepository;
use App\Repository\ResolutionRepository;
use App\Repository\TypeDeProduitRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonneeSeasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('donnee_seas')
            ->add('description')
            ->add('date', EntityType::class, [
                'class' => Date::class,
                'choice_label' => 'date',
                'query_builder' => function(DateRepository $dateRepo) {
                    return $dateRepo->createQueryBuilder('c')->orderBy('c.date', 'ASC');
                }
            ])
            ->add('fournisseur', EntityType::class, [
                'class' => Fournisseur::class,
                'choice_label' => 'fournisseur',
                'query_builder' => function(FournisseurRepository $fournisseurRepo) {
                    return $fournisseurRepo->createQueryBuilder('c')->orderBy('c.fournisseur', 'ASC');
                }
            ])
            ->add('capteur', EntityType::class, [
                'class' => Capteur::class,
                'choice_label' => 'capteur',
                'query_builder' => function(CapteurRepository $capteurRepo) {
                    return $capteurRepo->createQueryBuilder('c')->orderBy('c.capteur', 'ASC');
                }
            ])
            ->add('echelle', EntityType::class, [
                'class' => Echelle::class,
                'choice_label' => 'echelle',
                'query_builder' => function(EchelleRepository $echelleRepo) {
                    return $echelleRepo->createQueryBuilder('c')->orderBy('c.echelle', 'ASC');
                }
            ])
            ->add('vehicule', EntityType::class, [
                'class' => Vehicule::class,
                'choice_label' => 'vehicule',
                'query_builder' => function(VehiculeRepository $vehiculeRepo) {
                    return $vehiculeRepo->createQueryBuilder('c')->orderBy('c.vehicule', 'ASC');
                }
            ])
            ->add('resolution', EntityType::class, [
                'class' => Resolution::class,
                'choice_label' => 'resolution',
                'query_builder' => function(ResolutionRepository $resolutionRepo) {
                    return $resolutionRepo->createQueryBuilder('c')->orderBy('c.resolution', 'ASC');
                }
            ])
            ->add('type_de_produit', EntityType::class, [
                'class' => TypeDeProduit::class,
                'choice_label' => 'type_de_produit',
                'query_builder' => function(TypeDeProduitRepository $type_de_produitRepo) {
                    return $type_de_produitRepo->createQueryBuilder('c')->orderBy('c.type_de_produit', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DonneeSeas::class,
        ]);
    }
}

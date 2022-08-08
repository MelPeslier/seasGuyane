<?php

namespace App\Form;

use App\Entity\Cour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'minlenght' => '3',
                    'maxlenght' => '90'
                ],
                'label' => 'Titre'
            ])
            ->add('imageFondFile', VichImageType::class, [
                'label' => 'Image de la rubrique (PNG ou JPG)',
                'download_uri' => false,
                'allow_delete' => true
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'maxlenght' => '5000',
                    'rows' => '10'
                ],
                'label' => 'Ajouter une description complète'
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Ajouter un schéma',
                'download_uri' => false,
                'allow_delete' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cour::class,
        ]);
    }
}

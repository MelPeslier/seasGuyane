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
                    'class' => 'form-control',
                    'minlenght' => '3',
                    'maxlenght' => '90',
                    'placeholder' => 'Titre'
                ],
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form_label'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 3, 'max' => 90])
                ]
            ])
            ->add('imageFondFile', VichImageType::class, [
                'label' => 'Image du fond de rubrique',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('description_breve', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '300',
                    'rows' => '3',
                    'placeholder' => 'ajouter une description brève'
                ],
                'label' => 'Ajout de la description brève',
                'label_attr' => [
                    'class' => 'form_desc'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 30, 'max' => 300])
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '5000',
                    'rows' => '10',
                    'placeholder' => 'ajouter une description complète'
                ],
                'label' => 'Ajout de la description',
                'label_attr' => [
                    'class' => 'form_desc'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 30, 'max' => 5000])
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'ajouter un schéma',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'aajouter un schéma'
                ]
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

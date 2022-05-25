<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('url', UrlType::class, [
                'label' => 'Url',
                'required' => false,
                'constraints' => [
                    new Url(),
                ]
            ])
            ->add('github', UrlType::class, [
                'label' => 'Url Github',
                'required' => false,
                'constraints' => [
                    new Url(),
                ]
            ])
            ->add('summary', TextType::class, [
                'label' => 'Summary',
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('categories', null, [
                'label' => 'categories',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}

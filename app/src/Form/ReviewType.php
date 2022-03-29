<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Entity\Review\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Construction\Project;
use App\Entity\Client\Client;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project', EntityType::class, [
                    'class' => Project::class,
                    'multiple' => false,
                    'choice_value' => 'id',
                    'required' => true
                ]
            )
            ->add('client', EntityType::class, [
                    'class' => Client::class,
                    'multiple' => false,
                    'choice_value' => 'id',
                    'required' => true
                ]
            )
            ->add('reviewItems', CollectionType::class, [
                'entry_type' => ReviewItemType::class,
                'allow_add' => true,
                'delete_empty' => false,
                'allow_delete' => false,
                'by_reference' => false,
                'prototype' => 'reviewItems',
                'constraints' => [
                    new Assert\Count([
                        'min' => 1,
                        'minMessage' => 'Must have at least one value',
                        // also has max and maxMessage just like the Length constraint
                    ]),
                ],
            ])
            ->add('save', SubmitType::class)
        ;

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Review::class,
            'csrf_protection' => false,
        ));
    }
}
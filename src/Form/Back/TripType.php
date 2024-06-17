<?php

namespace App\Form\Back;

use App\Entity\Country;
use App\Entity\Tag;
use App\Entity\Trip;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('img', UrlType::class, [
                'label' => "Url de l'image",
            ])
            ->add('name', TextType::class, [
                'label' => "Nom du voyage",
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description",
            ])
            ->add('destination', TextType::class, [
                'label' => "Destination finale",
            ])
            ->add('price', MoneyType::class, [
                'label' => "Prix",
            ])
            ->add('nextDeparture', DateType::class, [
                'label' => "Prochain départ",
                'widget' => 'single_text',
            ])
            ->add('tags', EntityType::class, [
                'label' => "Tags",
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
            ])
            ->add('countries', EntityType::class, [
                'label' => "Pays traversés",
                'class' => Country::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}

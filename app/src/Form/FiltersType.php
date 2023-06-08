<?php

namespace App\Form;

use App\Enum\AssociationsEnum;
use App\Enum\BowTypesEnum;
use App\Enum\ClassesEnum;
use App\Enum\DivisionsEnum;
use App\Enum\RoundsEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextareaType::class, [
                'label' => 'Szukaj',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Nazwa wydarzenia',
                ],
            ])
            ->add('associations', EnumType::class, [
                'class' => AssociationsEnum::class,
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'choice_label' => function (?AssociationsEnum $enum) {
                    return $enum->value;
                }
            ])
            ->add('bowTypes', EnumType::class, [
                'class' => BowTypesEnum::class,
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'choice_label' => function (?BowTypesEnum $enum) {
                    return $enum->value;
                }
            ])
            ->add('classes', EnumType::class, [
                'class' => ClassesEnum::class,
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'choice_label' => function (?ClassesEnum $enum) {
                    return $enum->value;
                }
            ])
            ->add('divisions', EnumType::class, [
                'class' => DivisionsEnum::class,
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'choice_label' => function (?DivisionsEnum $enum) {
                    return $enum->value;
                }
            ])
            ->add('rounds', EnumType::class, [
                'class' => RoundsEnum::class,
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'choice_label' => function (?RoundsEnum $enum) {
                    return $enum->value;
                }
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

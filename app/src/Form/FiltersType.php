<?php

namespace App\Form;

use App\Entity\Association;
use App\Enum\AssociationsEnum;
use App\Enum\BowTypesEnum;
use App\Enum\ClassesEnum;
use App\Enum\DivisionsEnum;
use App\Enum\RoundsEnum;
use App\Repository\AssociationRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltersType extends AbstractType
{
    private AssociationRepository $associationRepository;

    public function __construct(AssociationRepository $associationRepository)
    {
        $this->associationRepository = $associationRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $associations = $this->associationRepository->findAll();

        $associationsChoices = [];

        foreach ($associations as $association) {
            $associationsChoices[$association->getName()] = $association->getId();
        }

        $builder
            ->add('search', TextareaType::class, [
                'label' => 'Szukaj',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Nazwa wydarzenia',
                ],
            ])
            ->add('associations', ChoiceType::class, [
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'choices' => $associationsChoices,
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

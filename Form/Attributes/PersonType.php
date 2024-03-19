<?php

namespace CustomBundle\Form\Attributes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $builder
            ->add('pdga_number', NumberType::class, [
                'required' => false,
                'label' => 'PDGA Number'
            ])
            ->add('pdga_certified', ChoiceType::class, [
                'choices' => ['No' => 'No', 'Yes' => 'Yes'],
                'required' => false,
                'label' => 'PDGA Certified'
            ])
            ->add('tshirt_size', ChoiceType::class, [
                'required' => false,
                'choices' => array_combine($sizes, $sizes),
                'label' => 'T-Shirt size'
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'person_attributes_form';
    }
}

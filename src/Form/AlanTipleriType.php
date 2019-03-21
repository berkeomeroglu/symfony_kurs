<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-21
 * Time: 09:35
 */

namespace App\Form;


use App\Entity\Gorev;
use App\Entity\Urun;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlanTipleriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('basic_input', TextType::class, [
            'mapped' => false
        ])
            ->add('textarea_input', TextareaType::class, [
                'mapped' => false
            ])
            ->add('input_type', IntegerType::class, [
                'mapped' => false
            ])
            ->add('urunler', EntityType::class, [
                'class' => Urun::class,
                'mapped' => false
            ])
            ->add('country', CountryType::class, [
                'mapped' => false
            ])
            ->add('birthday', BirthdayType::class, [
                'mapped' => false
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gorev::class
        ]);
    }
}
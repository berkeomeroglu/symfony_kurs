<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-21
 * Time: 09:14
 */

namespace App\Form;


use App\Entity\Gorev;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GorevType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('gorev', TextType::class)
            ->add('bitisZamani', DateType::class)
            ->add('kullaniciSozlesmesi', CheckboxType::class, [
                'mapped' => false,
            ])
            ->add('save', SubmitType::class, [
               'label' => 'Gorevi Kaydet'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Gorev::class,
        ]);
    }
}
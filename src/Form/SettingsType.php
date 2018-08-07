<?php

namespace App\Form;

use App\Entity\Settings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', TextType::class, [
                'required' => false
            ])
            ->add('name', TextType::class, [
                'required' => false,
                'label' =>'Public Name'
            ])
            ->add('email', EmailType::class, [
                'required' => false
            ])
            ->add('password', PasswordType::class, [
                'required' => false
            ])
            ->add('timezone', TextType::class, [
                'required' => false
            ])
            ->add('language', TextType::class, [
                'required' => false
            ])
            ->add('accessKeyID', TextType::class, [
                'required' => false,
                'label' => 'Access Key ID'
            ])
            ->add('secretAccessKey', PasswordType::class, [
                'required' => false,
                'label' => 'Secret Access Key'
            ])
            ->add('sesRegion', ChoiceType::class, [
                'required' => false,
                'label' => 'SES Region',
                'choices' => [
                    'test' => 123
                ]
            ])
            ->add('sendingRate', IntegerType::class, [
                'required' => false,
                'label' => 'Sending Rate'
            ])
            ->add('systemApiKey', TextType::class, [
                'required' => false,
                'label' => 'System API Key'
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Settings::class,
        ));
    }
}
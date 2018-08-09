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
                'label' => 'Public Name'
            ])
            ->add('email', EmailType::class, [
                'required' => false
            ])
            ->add('password', PasswordType::class, [
                'required' => false
            ])
            ->add('timezone', ChoiceType::class, [
                'required' => false,
                'choices' => array_flip(timezone_identifiers_list())
            ])
            ->add('language', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'English' => 'en_US'
                ]
            ])
            ->add('accessKeyID', TextType::class, [
                'required' => false,
                'label' => 'Access Key ID'
            ])
            ->add('sesRegion', ChoiceType::class, [
                'required' => false,
                'label' => 'SES Region',
                'choices' => $options['data']['Regions']

            ])
            ->add('apiCredentialsProfile', TextType::class, [
                'required' => false,
                'label' => 'API Credentials Profile'
            ])
            ->add('apiCredentialsPath', TextType::class, [
                'required' => false,
                'label' => 'API Credentials File Path'
            ])
            ->add('sendingRate', IntegerType::class, [
                'required' => false,
                'label' => 'Sending Rate'
            ])
            ->add('systemApiKey', TextType::class, [
                'required' => false,
                'label' => 'System API Key'
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Settings::class,
        ));
    }
}
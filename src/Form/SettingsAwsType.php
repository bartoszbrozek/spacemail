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


class SettingsAwsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('accessKeyID', TextType::class, [
                'required' => false,
                'label' => 'Access Key ID'
            ])
            ->add('sesRegion', ChoiceType::class, [
                'required' => false,
                'label' => 'SES Region',
                'choices' => $options['data']->getRegions()
            ])
            ->add('apiCredentialsProfile', TextType::class, [
                'required' => false,
                'label' => 'API Credentials Profile'
            ])
            ->add('apiCredentialsPath', TextType::class, [
                'required' => false,
                'label' => 'API Credentials File Path'
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
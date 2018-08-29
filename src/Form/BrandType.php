<?php

namespace App\Form;

use App\Entity\Brand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class BrandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Name'
            ])
            ->add('fromName', TextType::class, [
                'required' => true,
                'label' => 'From Name'
            ])
            ->add('fromEmail', EmailType::class, [
                'required' => true,
                'label' => 'From Email'
            ])
            ->add('replyToEmail', EmailType::class, [
                'required' => true,
                'label' => 'Reply To Email'
            ])
            ->add('allowedAttachmentsFileTypes', TextType::class, [
                'required' => true,
                'label' => 'Allowed Attachments File Types'
            ])
            ->add('logo', TextType::class, [
                'required' => false,
                'label' => 'Logo'
            ])
            ->add('urlQueryString', TextType::class, [
                'required' => true,
                'label' => 'URL Query String'
            ])
            ->add('campaignSentNotifications', CheckboxType::class, [
                'required' => false,
                'label' => 'Campaign Sent Notifications'
            ])
            ->add('monthlyLimit', IntegerType::class, [
                'required' => true,
                'label' => 'Monthly Limit'
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Brand::class,
        ]);
    }
}
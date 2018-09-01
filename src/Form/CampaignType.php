<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Campaign;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CampaignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Name'
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
                'choice_label' => 'Brand'
            ])
            ->add('subject', TextType::class, [
                'required' => true,
                'label' => 'Subject'
            ])
            ->add('fromName', TextType::class, [
                'required' => true,
                'label' => 'From Name'
            ])
            ->add('fromEmail', ChoiceType::class, [
                'required' => true,
                'label' => 'From Email',
                'choices' => $options['data']->getEmailIdentities()
            ])
            ->add('replyToEmail', EmailType::class, [
                'required' => true,
                'label' => 'Reply to Email'
            ])
            ->add('queryString', TextType::class, [
                'required' => false,
                'label' => 'Query String'
            ])
            ->add('htmlCode', TextareaType::class, [
                'required' => true,
                'label' => 'HTML Code'
            ])
            ->add('trackOpens', CheckboxType::class, [
                'required' => false,
                'label' => 'Track Opens'
            ])
            ->add('trackClicks', CheckboxType::class, [
                'required' => false,
                'label' => 'Track Clicks'
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
            'data_class' => Campaign::class,
        ]);
    }
}
<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\SettingsType;
use App\Service\AWS\EC2\Region;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SettingsController extends Controller
{
    public function index(Request $request, Region $region)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null) {
            $settings = new Settings();
        }

        $form = $this->createForm(SettingsType::class, $settings, [
            'data_class' => null,
            'data' => [
                'Regions' => $region->getAll()
            ]
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settings);
            $em->flush();
        }

        return $this->render('settings/index.html.twig', [
            'form' => $form->createView(),
            'settings' => $settings
        ]);
    }
}

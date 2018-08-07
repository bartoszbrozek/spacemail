<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\SettingsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null) {
            $settings = new Settings();
        }

        $form = $this->createForm(SettingsType::class, $settings);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settings);
            $em->flush();
        }

        return $this->render('settings/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

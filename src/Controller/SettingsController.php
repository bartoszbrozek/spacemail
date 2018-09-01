<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\EmailIdentityType;
use App\Form\SettingsAwsType;
use App\Form\SettingsBasicType;
use App\Form\SettingsEmailType;
use App\Service\AWS\EC2\Region;
use App\Service\AWS\SES\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Exception;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null) {
            $settings = new Settings();
        }

        $form = $this->createForm(SettingsBasicType::class, $settings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settings);
            $em->flush();

            $this->addFlash('success', 'Settings has been saved');
        }

        return $this->render('settings/index.html.twig', [
            'form' => $form->createView(),
            'settings' => $settings
        ]);
    }

    public function aws(Request $request, Region $region)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null) {
            $settings = new Settings();
        }

        $settings->setRegions($region->getAll());

        $form = $this->createForm(SettingsAwsType::class, $settings, [
            'data' => $settings
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settings);
            $em->flush();

            $this->addFlash('success', 'Settings has been saved');
        }

        if ($settings->getApiCredentialsPath() !== null) {
            if (!is_readable($settings->getApiCredentialsPath())) {
                $this->addFlash('error', 'File ' . $settings->getApiCredentialsPath() . ' does not exists or is not readable');
            }
        }

        return $this->render('settings/aws.html.twig', [
            'form' => $form->createView(),
            'settings' => $settings
        ]);
    }

    public function email(Request $request)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null) {
            $settings = new Settings();
        }

        $form = $this->createForm(SettingsEmailType::class, $settings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settings);
            $em->flush();

            $this->addFlash('success', 'Settings has been saved');
        }

        return $this->render('settings/email.html.twig', [
            'form' => $form->createView(),
            'settings' => $settings
        ]);
    }

    public function emailIdentities(Request $request, Mail $mail)
    {
        $identities = $mail->listIdentities();

        $form = $this->createForm(EmailIdentityType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $request->get('email_identity');

            try {
                if (!isset($formData['emailIdentity'])) {
                    throw new Exception('Invalid Form Data');
                }

                $emailIdentity = $formData['emailIdentity'];

                $mail->addIdentity($emailIdentity);

                $this->addFlash('success', 'Email Identity has been added');

            } catch (Exception $ex) {
                $this->addFlash('error', 'Something went wrong: ' . $ex->getMessage());
            }
        }

        return $this->render('settings/emailIdentities.html.twig', [
            'identities' => $identities,
            'form' => $form->createView()
        ]);
    }
}

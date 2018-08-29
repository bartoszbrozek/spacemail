<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Service\AWS\SES\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CampaignsController extends Controller
{
    public function index(Request $request)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null || $settings->getApiCredentialsPath() === null || !is_readable($settings->getApiCredentialsPath())) {
            $this->addFlash('error', 'Please configure SpaceMail first');

            return $this->redirect('settings-aws');
        }

        //$msg = $sesmail->sendEmail('bartekbrozek1@gmail.com', 'bartekbrozek1@gmail.com', 'TestMail', 'test msg 1');

        return $this->render('campaigns/index.html.twig', [
            'msg' => 'test'
        ]);
    }
}

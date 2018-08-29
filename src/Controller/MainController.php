<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Service\AWS\SES\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function index(Mail $sesmail)
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);

        if ($settings === null || $settings->getSystemApiKey() === null) {
            $this->addFlash('error', 'Please configure SpaceMail first');
            return $this->redirect('settings-aws');
        }

        $msg = $sesmail->sendEmail('bartekbrozek1@gmail.com', 'bartekbrozek1@gmail.com', 'TestMail', 'test msg 1');

        return $this->render('index/index.html.twig', [
            'msg' => $msg
        ]);
    }
}

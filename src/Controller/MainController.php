<?php

namespace App\Controller;

use App\Service\AWS\SESMail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function index(SESMail $sesmail)
    {
        $msg = $sesmail->sendEmail('bartekbrozek1@gmail.com', 'bartekbrozek1@gmail.com', 'TestMail', 'test msg 1');

        return $this->render('index/index.html.twig', [
            'msg' => $msg
        ]);
    }
}

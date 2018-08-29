<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\SettingsAwsType;
use App\Form\SettingsBasicType;
use App\Form\SettingsEmailType;
use App\Service\AWS\EC2\Region;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        return $this->render('statistics/index.html.twig', []);
    }
}

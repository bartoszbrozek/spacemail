<?php

namespace App\Controller;

use App\Entity\Campaign;
use App\Entity\CampaignStatus;
use App\Form\CampaignType;
use App\Repository\CampaignRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CampaignsController extends Controller
{
    public function index(Request $request)
    {
        $campaigns = $this->getDoctrine()->getRepository(Campaign::class)->findAll();

        if (empty($campaigns)) {
            $this->addFlash('notice', 'Please Add a New Campaign');
        }

        return $this->render('campaigns/index.html.twig', [
            'campaigns' => $campaigns
        ]);
    }

    public function add(Request $request)
    {
        $campaign = new Campaign();

        $form = $this->createForm(CampaignType::class, $campaign);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $campaignStatus = $this->getDoctrine()->getRepository(CampaignStatus::class)->findOneByName('draft');
            $campaign->setStatus($campaignStatus);

            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();

            $this->addFlash('success', 'Campaign has been created');

            return $this->redirectToRoute('campaigns');
        }

        return $this->render('campaigns/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function edit(Request $request, Campaign $campaign)
    {
        $form = $this->createForm(CampaignType::class, $campaign);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();

            $this->addFlash('success', 'Campaign has been saved');

            return $this->redirectToRoute('campaigns');
        }

        return $this->render('campaigns/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function remove(Campaign $campaign)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($campaign);
        $em->flush();

        $this->addFlash('success', 'Campaign has been removed');

        return $this->redirectToRoute('campaigns');
    }
}

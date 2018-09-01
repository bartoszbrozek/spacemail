<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Service\AWS\SES\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BrandsController extends Controller
{
    public function index(Request $request)
    {
        $brands = $this->getDoctrine()->getRepository(Brand::class)->findAll();

        if (empty($brands)) {
            $this->addFlash('notice', 'Please Add a New Brand');
        }

        return $this->render('brands/index.html.twig', [
            'brands' => $brands
        ]);
    }

    public function add(Request $request, Mail $mail)
    {
        $brand = new Brand();

        $identities = $mail->listIdentities();
        $brand->setEmailIdentities($identities);

        $form = $this->createForm(BrandType::class, $brand, [
            'data' => $brand
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brand);
            $em->flush();

            $this->addFlash('success', 'Brand has been created');

            return $this->redirectToRoute('brands');
        }

        return $this->render('brands/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function edit(Request $request, Brand $brand, Mail $mail)
    {
        $identities = $mail->listIdentities();
        $brand->setEmailIdentities($identities);

        $form = $this->createForm(BrandType::class, $brand, [
            'data' => $brand
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brand);
            $em->flush();

            $this->addFlash('success', 'Brand has been saved');

            return $this->redirectToRoute('brands');
        }

        return $this->render('brands/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function remove(Brand $brand)
    {
        $em = $this->getDoctrine()->getManager();

        $campaigns = $brand->getCampaign()->toArray();
        foreach ($campaigns as $campaign) {
            $brand->removeCampaign($campaign);
        }

        $em->remove($brand);
        $em->flush();

        $this->addFlash('success', 'Brand has been removed');

        return $this->redirectToRoute('brands');
    }
}

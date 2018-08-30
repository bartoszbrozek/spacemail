<?php

namespace App\Controller;

use App\Entity\Template;
use App\Form\TemplateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $templates = $this->getDoctrine()->getRepository(Template::class)->findAll();

        if (empty($templates)) {
            $this->addFlash('notice', 'Please Add a New Template');
        }

        return $this->render('templates/index.html.twig', [
            'templates' => $templates
        ]);
    }

    public function add(Request $request)
    {
        $template = new Template();

        $form = $this->createForm(TemplateType::class, $template);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($template);
            $em->flush();

            $this->addFlash('success', 'Template has been created');

            return $this->redirectToRoute('templates');
        }

        return $this->render('templates/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function edit(Request $request, Template $template)
    {
        $form = $this->createForm(TemplateType::class, $template);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($template);
            $em->flush();

            $this->addFlash('success', 'Template has been saved');

            return $this->redirectToRoute('templates');
        }

        return $this->render('templates/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function remove(Template $template)
    {
            $em = $this->getDoctrine()->getManager();
            $em->remove($template);
            $em->flush();

            $this->addFlash('success', 'Template has been removed');

            return $this->redirectToRoute('templates');
    }
}

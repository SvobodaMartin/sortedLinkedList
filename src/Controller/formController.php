<?php

namespace App\Controller;

use App\Entity\Node;
use App\Form\NodeManipulationType;
use App\services\LinkedListService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class formController extends AbstractController
{
    /**
     * @Route("/", name="form")
     */
    public function showForm(Environment $twig, Request $request, EntityManagerInterface $entityManager): Response
    {
        $node = new Node();

        $form = $this->createForm(NodeManipulationType::class, $node);

        $form->handleRequest($request);

        $linkedListService = new LinkedListService();

        if ($form->isSubmitted() && $form->isValid()) {
            $nodesData = [
                $form->get('node1')->getData(),
                $form->get('node2')->getData(),
                $form->get('node3')->getData(),
                $form->get('node4')->getData(),
                $form->get('node5')->getData(),
                $form->get('node6')->getData()
            ];
            foreach ($nodesData as $data) {
                $node = new Node();
                $node->setData($data);
                $linkedListService->addNode($node);
            }
        }

        //TODO persist data to database

        try {
            return new Response($twig->render('form.html.twig', [
                'form' => $form->createView(),
                'linkedList' => $linkedListService->showList()
            ]));
        } catch (\Error $e) {
            return new Response($e->getMessage());
        }
    }
}
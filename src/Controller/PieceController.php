<?php

namespace App\Controller;

use App\Entity\Piece;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PieceController extends AbstractController
{
    /**
     * @Route("/pieces", name="pieces_show")
     */
    public function index(): Response
    {

        $em = $this->getDoctrine()->getManager();

        $pieces = $em->getRepository(Piece::class)->findAll();

        return $this->render('piece/index.html.twig', [
            'controller_name' => 'PieceController',
            'pieces' => $pieces,
        ]);
    }

    /**
     * @Route("/piece/show/{id}", name="piece")
     */
    public function show(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();

        $id = $request->get('id');

        $piece = $em->getRepository(Piece::class)->find(['id' => $id]);

        return $this->render('piece/show.html.twig', [
            'piece' => $piece,
        ]);


    }
}

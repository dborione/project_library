<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/livres", name="livres")
     */
    public function livres(BookRepository $bookRepository): Response
    {
        return $this->render('book/livres.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }
}

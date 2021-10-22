<?php

namespace App\Controller;

use SessionIdInterface;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ReservationService;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ReservationController extends AbstractController
{
    /**
     * @Route("/reservations", name="reservations_index")
     */
    public function index(SessionInterface $session, BookRepository $bookRepository) 
    {
        $reservations= $session->get('reservations, []');
        $reservationsWithData = [];
        foreach($reservations as $id => $quantity) {
            $reservationsWithData[] = [
                'book'=> $bookRepository->find($id),
                'quantity'=> $quantity
            ];
        }
        return $this->render('book/livres.html.twig', [
            'items' => $reservationsWithData
        ]);
    }

    /**
     * @Route("/reservations/add/{id}", name="reservations_add")
     */
    public function add($id, ReservationService $reservationService) 
    {
        $reservationService->add($id); 
        return $this->redirectToRoute("livres");
    }
}
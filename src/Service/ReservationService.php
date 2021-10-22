<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ReservationService {

    protected $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function add(int $id) {
        $reservations = $this->session->get('reservations', []);
        $reservations[$id] = 1;
        $this->session->set('reservations', $reservations);

    }

    public function remove(int $id) {}

}
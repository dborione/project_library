<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    public function index() : Response
{
        return $this->render('default/home.html.twig', ['title' => 'Bienvenue à la Bibliothèque',]);
    }

    public function connexion () : Response 
{   
    return $this->render('default/connexion.html.twig', ['title' => 'Connexion',]);
    }

    public function inscription () : Response 
{   
    return $this->render('default/inscription.html.twig', ['title' => 'Inscription',]);
    }
}


<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KamerController extends AbstractController
{
    /**
     * @Route("/kamer", name="kamer")
     */
    public function index()
    {
        return $this->render('kamer/index.html.twig', [
            'controller_name' => 'KamerController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InlogController extends AbstractController
{
    /**
     * @Route("/inlog", name="inlog")
     */
    public function index()
    {
        return $this->render('inlog/index.html.twig', [
            'controller_name' => 'InlogController',
        ]);
    }
}

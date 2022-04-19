<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueiladminController extends AbstractController
{
    /**
     * @Route("/accueiladmin", name="accueiladmin")
     */
    public function index(): Response
    {
        return $this->render('accueiladmin/index.html.twig', [
            'controller_name' => 'AccueiladminController',
        ]);
    }
}

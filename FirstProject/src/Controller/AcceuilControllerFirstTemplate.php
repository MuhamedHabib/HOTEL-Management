<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilControllerFirstTemplate extends AbstractController
{
    /**
     * @Route("/acceuilFirstTemplate", name="acceuilFirstTemplate")
     */
    public function index(): Response
    {
        return $this->render('acceuilFirstTemplate/index.html.twig', [
            'controller_name' => 'AcceuilControllerFirstTemplate',
        ]);
    }























}

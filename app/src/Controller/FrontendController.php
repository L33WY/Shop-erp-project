<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    #[Route('/', name: 'front.index')]
    public function index(): Response
    {
        return $this->render('page/home/index.html.twig');
    }
}

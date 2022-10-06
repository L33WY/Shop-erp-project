<?php declare(strict_types=1);

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountHomeController extends AbstractController
{
    #[Route('/', name: 'account.index')]
    public function index(): Response
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('page/account/home/index.html.twig');
    }
}

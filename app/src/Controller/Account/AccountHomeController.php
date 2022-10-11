<?php declare(strict_types=1);

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountHomeController extends AbstractController
{
    #[Route('/', name: 'account.index')]
    public function index(Request $request): Response
    {

        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('page/account/home/index.html.twig', [
            'user' => ($this->getUser())->eraseCredentials(),
            'routeName' => $request->get('_route')
        ]);
    }
}

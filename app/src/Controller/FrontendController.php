<?php declare(strict_types=1);

namespace App\Controller;

use App\Core\Context\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, Context $context): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $context->setUser(($this->getUser())->eraseCredentials());


        return $this->render('page/home/index.html.twig', [
            'context' => $context,
            'routeName' => $request->attributes->get('_route')
        ]);
    }
}

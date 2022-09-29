<?php declare(strict_types=1);

namespace App\Controller;

use App\Core\Context\Context;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class FrontendController extends AbstractController
{
    #[Route('/', name: 'front.index')]
    public function index(Request $request, UserInterface $user, Context $context): Response
    {
        /** @var User $user */
        $user->setPassword('');
        $context->setUser($user);

        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('page/home/index.html.twig', [
            'context' => $context
        ]);
    }
}

<?php

namespace App\Controller\Web;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\QueryException;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends AbstractController
{

    private $em;
    private $ur;
    private $serializer;

    public function __construct(EntityManagerInterface $em, UsersRepository $ur)
    {
        $this->em = $em;
        $this->ur = $ur;
        $this->serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));
    }

    /**
     * @Route("/authentication", name="web.authentication.index", methods={"GET"})
     */
    public function index(): Response
    {
        /* $users = new Users;
        $users->setUsername('khalil');
        $users->setEmail('klilmecha@gmail.com');
        $users->setPassword('123456'); */

        /* try {
            $this->em->persist($users);
            $this->em->flush();
        } catch (QueryException $qe) {
            return new JsonResponse($this->serializer->serialize($qe,'json'), JsonResponse::HTTP_METHOD_NOT_ALLOWED, ['Content-Type'=>'application/json'], true);
        } */

        //$users = $this->ur->findAll();


        //return new JsonResponse($this->serializer->serialize($users, 'json'), Response::HTTP_OK, ['Content-Type'=>'application/json'], true);
        

        return $this->render('web/authentication/index.html.twig');
    }

    /**
     * @Route("/authentication/signup", name="web.authentication.signup", methods={"GET"})
     */
    public function signUp(Request $request): Response
    {
        return new Response(json_encode($request->query->all()), Response::HTTP_OK);
    }

    /**
     * @Route("/authentication/signin", name="web.authentication.signin", methods={"GET"})
     */
    public function signIn(Request $request): Response
    {
        return new Response(json_encode($request->query->all()), Response::HTTP_OK);
    }
}

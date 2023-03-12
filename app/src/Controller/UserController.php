<?php

namespace App\Controller;

use App\Entity\User;
use App\Provider\UserProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    #[Route('/api/user', name: 'api_user_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): JsonResponse
    {
        $data = json_decode(
            $request->getContent(),
            true
        );

        $login = $data['login'] ?? null;
        $password = $data['password'] ?? null;

        if (!$login) {
            exit('missing login');
        }

        if (!$password) {
            exit('missing password');
        }

        $user = new User();
        $user->setUsername($login);
        $user->setPassword($userPasswordHasher->hashPassword($user, $password));
        $user->setRoles(['ROLE_USER']);

        $entityManager->persist($user);

        try {
            $entityManager->flush();
        } catch (\Exception $exception) {
            return $this->json(0);
        }

        return $this->json(1);
    }

    #[Route('/api/user', name: 'api_user_update', methods: ['PUT'])]
    public function update(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): JsonResponse
    {
        $data = json_decode(
            $request->getContent(),
            true
        );

        $login = $data['login'] ?? null;
        $password = $data['password'] ?? null;

        if (!$login) {
            exit('missing login');
        }

        if (!$password) {
            exit('missing password');
        }

        $user = $entityManager->getRepository(User::class)->findOneBy(['username' => $login]);

        if (!$user) {
            return $this->json(0);
        }

        /* @var User $user */
        $user->setUsername($login);
        $user->setPassword($userPasswordHasher->hashPassword($user, $password));
        $user->setRoles(['ROLE_USER']);

        $entityManager->persist($user);

        try {
            $entityManager->flush();
        } catch (\Exception $exception) {
            return $this->json(0);
        }

        return $this->json(1);
    }

    #[Route('/api/user/{id}', name: 'api_user_get_by_id', methods: ['GET'])]
    public function getById(Request $request, int $id, UserProvider $userProvider): Response
    {
        return new Response($this->serializer->serialize($userProvider->provide($id), 'json', ['groups' => ['public']]), 200, ['Content-Type' => 'application/json']);
    }
}

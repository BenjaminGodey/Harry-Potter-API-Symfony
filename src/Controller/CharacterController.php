<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * Get list and datas about characters.
     *
     */

    #[Route('/api/characters', name: 'app_character', methods: ['GET'])]
    public function getCharacterList(CharacterRepository $characterRepository, SerializerInterface $serializer): JsonResponse
    {
        $characterList = $characterRepository->findAll();
        $jsonCharacterList = $serializer->serialize($characterList, 'json');
        return new JsonResponse($jsonCharacterList, Response::HTTP_OK, [], true);
    }
}

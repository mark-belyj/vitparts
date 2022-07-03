<?php

namespace App\Controller\Api;

use App\Entity\Code;
use App\Service\Serializer\CodeSerializer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class DetailController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    #[Route('/', name: 'api_get_detail')]
    public function getDetail(CodeSerializer $codeSerializer): JsonResponse
    {
        $details = $this->em->getRepository(Code::class)->findBy(['active' => true]);
        $normalizeDetails = $codeSerializer->normalizeArray($details);
        return new JsonResponse($normalizeDetails, 200);
    }
}

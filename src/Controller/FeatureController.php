<?php

namespace App\Controller;

use App\Entity\Feature;
use App\Form\FeatureType;
use App\Repository\FeatureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FeatureController extends AbstractController
{
    #[Route('/feature', name: 'app_feature')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/FeatureController.php',
        ]);
    }

    #[Route('/read', name: ('app_read'))]
    public function featureList(FeatureRepository $featureRepository)
    {
        $feature = $featureRepository->findAll();
        return $this->render('page/home.html.twig', ['features' => $feature]);
    }

    #[Route('/addFeature', name: 'app_add')]
    public function addFeature(EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $feature = new Feature();

        $featureForm = $this->createForm(FeatureType::class, $feature);

        $featureForm->handleRequest($request);

        if ($featureForm->isSubmitted() && $featureForm->isValid()) {

            $entityManagerInterface->persist($feature);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("app_read");
        }

        return $this->render('admin/addFeature.html.twig', ['featureForm' => $featureForm->createView()]);

    }
}

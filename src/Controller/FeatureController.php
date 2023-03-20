<?php

namespace App\Controller;

use App\Entity\Feature;
use App\Entity\Methode;
use App\Form\FeatureType;
use App\Repository\FeatureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FeatureController extends AbstractController
{

    #[Route('/search', name:('app_search'))]
    public function searchFeature(FeatureRepository $featureRepository, Request $request){
        $term = $request->query->get('term');
        $features = $featureRepository->searchByTerm($term);

        return $this->render('search.html.twig', ['features' => $features]);
    }
    #[Route('/feature', name: ('app_read'))]
    public function featureList(FeatureRepository $featureRepository)
    {
        $feature = $featureRepository->findAll();
        return $this->render('page/home.html.twig', ['features' => $feature]);
    }

    #[Route('/add', name: 'app_add')]
    public function addFeature(EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $feature = new Feature();
        $feature->addMethode(new Methode());
        $feature->addMethode(new Methode());
        $feature->addMethode(new Methode());

        $featureForm = $this->createForm(FeatureType::class, $feature);
        $featureForm->handleRequest($request);

        if ($featureForm->isSubmitted() && $featureForm->isValid()) {

            $entityManagerInterface->persist($feature);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("app_read");
        }

        return $this->render('form/featureForm.html.twig', ['featureForm' => $featureForm->createView()]);

    }
}

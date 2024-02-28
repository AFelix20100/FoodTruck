<?php

namespace App\Controller;

use App\Entity\FoodTruck;
use App\Form\FoodTruckType;
use App\Repository\FoodTruckRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/foodtruck')]
class FoodTruckController extends AbstractController
{
    #[Route('/', name: 'app_food_truck_index', methods: ['GET'])]
    public function index(FoodTruckRepository $foodTruckRepository): Response
    {
        return $this->render('food_truck/index.html.twig', [
            'food_trucks' => $foodTruckRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_food_truck_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $foodTruck = new FoodTruck();
        $form = $this->createForm(FoodTruckType::class, $foodTruck);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($foodTruck);
            $entityManager->flush();

            return $this->redirectToRoute('app_food_truck_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('food_truck/new.html.twig', [
            'food_truck' => $foodTruck,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_food_truck_show', methods: ['GET'])]
    public function show(FoodTruck $foodTruck): Response
    {
        return $this->render('food_truck/show.html.twig', [
            'food_truck' => $foodTruck,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_food_truck_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FoodTruck $foodTruck, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FoodTruckType::class, $foodTruck);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_food_truck_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('food_truck/edit.html.twig', [
            'food_truck' => $foodTruck,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_food_truck_delete', methods: ['POST'])]
    public function delete(Request $request, FoodTruck $foodTruck, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$foodTruck->getId(), $request->request->get('_token'))) {
            $entityManager->remove($foodTruck);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_food_truck_index', [], Response::HTTP_SEE_OTHER);
    }
}

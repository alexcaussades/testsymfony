<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function Aliments(AlimentRepository $alimentRepository)
    {
        $aliments = $alimentRepository->findAll();
        return $this->render('aliment/index.html.twig', [
            'aliments' => $aliments,
        ]);
    }

    /**
     * @Route("/aliments/{calorie}", name="alimentsParCalorie")
     */
    public function AlimentsParCalorie(AlimentRepository $alimentRepository, $calorie)
    {
        $aliments = $alimentRepository->getAlimentParCalories($calorie);
        return $this->render('aliment/index.html.twig', [
            'aliments' => $aliments,
        ]);
    }
}

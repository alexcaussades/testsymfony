<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Form\AlmientType;
use App\Repository\AlimentRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $alimentRepository)
    {
        $aliments = $alimentRepository->findAll();
        return $this->render('admin_aliment/index.html.twig', [
            "aliments" => $aliments,
        ]);
    }

    /**
     * @Route("/admin/aliment/creation", name="admin_aliment_creat")
     * @Route("/admin/aliment/{id}", name="admin_aliment_mod", methods="GET|POST")
     */
    public function modification(Aliment $aliment = null, Request $request, EntityManagerInterface $objectManager)
    {
        if (!$aliment){
            $aliment = new Aliment();
        }

        $form = $this->createForm(AlmientType::class, $aliment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $objectManager->persist($aliment);
            $objectManager->flush();
            $this->addFlash("success", "La modifivation et faite");
            return $this->redirectToRoute("admin_aliment");
        }

        return $this->render('admin_aliment/modification.html.twig', [
            "aliments" => $aliment,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/aliment/{id}", name="admin_aliment_supp", methods="delect")
     */
    public function suprime(Aliment $aliment = null, Request $request, EntityManagerInterface $objectManager)
    {
        if($this->isCsrfTokenValid("SUP". $aliment->getId(), $request->get('_token')))
        {
            $objectManager->remove($aliment);
            $objectManager->flush();
            $this->addFlash("success", "La suppression et faite");
            return $this->redirectToRoute("admin_aliment");
        }
       
        
    }
}

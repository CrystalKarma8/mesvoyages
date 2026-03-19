<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of AccueilController
 *
 * @author user
 */
class AccueilController extends AbstractController {
    //put your code here
    #[Route('/', name: 'accueil')]
    public function index(VisiteRepository $visiteRepository): Response {
        
        // On récupère les 2 derniers voyages triés par date décroissante
        $derniersVoyages = $visiteRepository->findBy([], ['datecreation' => 'DESC'], 2);

        return $this->render("pages/accueil.html.twig", [
            'voyages' => $derniersVoyages
        ]);
    }
}

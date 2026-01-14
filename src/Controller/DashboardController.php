<?php

namespace App\Controller;

use App\Repository\AdherentRepository;
use App\Repository\AuteurRepository;
use App\Repository\CategorieRepository;
use App\Repository\EmpruntRepository;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dashboard', name: 'app_dashboard')]
class DashboardController extends AbstractController
{
    #[Route('', name: '_index')]
    public function index(
        LivreRepository $livreRepository,
        AdherentRepository $adherentRepository,
        AuteurRepository $auteurRepository,
        CategorieRepository $categorieRepository,
        EmpruntRepository $empruntRepository
    ): Response {
        // Check if user is authenticated
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        // Get statistics
        $totalLivres = $livreRepository->count([]);
        $totalAdherents = $adherentRepository->count([]);
        $totalAuteurs = $auteurRepository->count([]);
        $totalCategories = $categorieRepository->count([]);
        $totalEmprunts = $empruntRepository->count([]);
        
        // Get available books count
        $availableLivres = $livreRepository->count(['disponible' => true]);
        
        // Get recent books (last 5)
        $recentLivres = $livreRepository->findBy([], ['id' => 'DESC'], 5);
        
        // Get recent emprunts (last 5)
        $recentEmprunts = $empruntRepository->findBy([], ['id' => 'DESC'], 5);

        return $this->render('dashboard/index.html.twig', [
            'totalLivres' => $totalLivres,
            'totalAdherents' => $totalAdherents,
            'totalAuteurs' => $totalAuteurs,
            'totalCategories' => $totalCategories,
            'totalEmprunts' => $totalEmprunts,
            'availableLivres' => $availableLivres,
            'recentLivres' => $recentLivres,
            'recentEmprunts' => $recentEmprunts,
        ]);
    }
}

<?php

namespace App\Controller;
use App\Entity\Hackathon;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

class HomeController extends AbstractController
{
    #[Route('', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {    
        return $this->render('home.html.twig');
    }

    #[Route('/hackathons', name: 'app_hackathons')]
    public function showHackathons(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Hackathon::class);
        $lesHackathonsTrie = $repository->findBy([],['date_debut' => 'ASC']);
        $lesHackathons = $repository->findAll();
    
        return $this->render('hackathon/index.html.twig', [
            'lesHackathons' => $lesHackathons,
            'lesHackathonsAfficher' => $lesHackathons,
            'lesHackathonsTrie' => $lesHackathonsTrie
        ]);
    }
    
    #[Route('/hackathons/{id}', name: 'app_unHackathon')]
    public function showOneSerie(EntityManagerInterface $em, int $id): Response
    {
        $repository = $em->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
    
        return $this->render('hackathon/details.html.twig', [
            'leHackathon' => $leHackathon,
        ]);
    }
}

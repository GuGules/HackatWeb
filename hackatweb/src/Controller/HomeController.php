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
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Hackathon::class);
        $lesHackathonsTrie = $repository->findBy([],['date_debut' => 'ASC']);
        $lesHackathons = $repository->findAll();
    
        return $this->render('home/index.html.twig', [
            'lesHackathons' => $lesHackathons,
            'lesHackathonsAfficher' => $lesHackathons,
            'lesHackathonsTrie' => $lesHackathonsTrie
        ]);
    }
    
    #[Route('/home/{id}', name: 'app_unHackathon')]
    public function showOneSerie(EntityManagerInterface $em, int $id): Response
    {
        $repository = $em->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
    
        return $this->render('home/details.html.twig', [
            'leHackathon' => $leHackathon,
        ]);
    }
}

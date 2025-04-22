<?php

namespace App\Controller;
use App\Entity\Hackathon;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\SearchFormType;
use App\Entity\Inscription;
use App\Entity\Participants;
use App\Repository\HackathonRepository;
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
    public function showHackathons(Request $request,EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Hackathon::class);
        $form = $this->createForm(SearchFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchCriteria = $form->get('searchCriteria')->getData();
            $lesHackathons = $repository->findByVille($searchCriteria);
        }
        else {

        $lesHackathonsTrie = $repository->findBy(['date_debut' => 'ASC']);
        $lesHackathons = $repository->findAll();

        }
    
        return $this->render('hackathon/index.html.twig', [
            'lesHackathonsAfficher' => $lesHackathons,
            'form' => $form
        ]);
    }


    
    #[Route('/hackathons/showFavoris', name: 'app_shFav')]
    public function showSub(EntityManagerInterface $em, Request $request):Response
    {

        $repository = $em->getRepository(Hackathon::class);

        $form = $this->createForm(SearchFormType::class);
        $form->handleRequest($request);

        $participant = $this->getUser();
        dump($participant);

    
        if ($form->isSubmitted() && $form->isValid()) {
            $searchCriteria = $form->get('searchCriteria')->getData();
            $lesHackathons = $repository->findByVille($searchCriteria);
        } else {
            $lesHackathons = $participant->getFavoris();
        }
    
        return $this->render('hackathon/index.html.twig', [
            'lesHackathonsAfficher' => $lesHackathons,
            'form' => $form
        ]);



        return $this->redirectToRoute('app_unHackathon',['id'=> $id]);
    }

    #[Route('/hackathons/inscriptions/', name: 'app_myRegHackathon')]
    public function myInscriptions(EntityManagerInterface $em):Response
    {
        $participant = $this->getUser();
        $inscriptions = $participant->getInscriptions();
        
        
        return $this->render('hackathon/listeInscriptions.html.twig',['inscriptions'=>$inscriptions]);
    }
    
    #[Route('/hackathons/{id}', name: 'app_unHackathon')]
    public function afficheDetailsHackathon(EntityManagerInterface $em, int $id): Response
    {
        $repository = $em->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);

        if ($this->getUser()!=null){
            return $this->render('hackathon/details.html.twig', [
                'leHackathon' => $leHackathon,
                'isFav' => $this->getUser()->getFavoris()->contains($leHackathon)
            ]);
        } else {
            return $this->render('hackathon/details.html.twig', [
                'leHackathon' => $leHackathon,
                'isFav' => false
            ]);
        }
    
        
    }

    #[Route('/hackathons/{id}/inscription/', name: 'app_regHackathon')]
    public function inscription(EntityManagerInterface $em, int $id):Response
    {
        $participant = $this->getUser();
        $leHackathon = $em->getRepository(Hackathon::class)->find($id);
        $inscription = new Inscription();
        $inscription->setHackathon($leHackathon);
        $inscription->setParticipant($participant);
        $inscription->setDateSaisie(new \DateTime());
        $leHackathon->addInscription($inscription);
        $em->persist($inscription);
        $em->flush();
        $this->addFlash('success', 'Félicitations ! Vous êtes inscrit au hackathon !');
        return $this->redirectToRoute('app_unHackathon',['id'=> $id]);
    }

    #[Route('/hackathons/addFav/{id}', name: 'app_addFav')]
    public function addFav(EntityManagerInterface $em, int $id):Response
    {
        $participant = $this->getUser();
        $leHackathon = $em->getRepository(Hackathon::class)->find($id);
        if ($participant->getFavoris()->contains($leHackathon)){
            $this->addFlash('fail', 'Hackathon déjà dans les favoris');
        } else {
            $participant->addFavori($leHackathon);
            $em->flush();
            $this->addFlash('success', 'Hackathon ajouté aux favoris');
        }
        return $this->redirectToRoute('app_unHackathon',['id'=> $id]);
    }

    #[Route('/hackathons/rmFav/{id}', name: 'app_rmFav')]
    public function rmFav(EntityManagerInterface $em, int $id):Response
    {
        $participant = $this->getUser();
        $leHackathon = $em->getRepository(Hackathon::class)->find($id);
        if ($participant->getFavoris()->contains($leHackathon)){
            $participant->removeFavori($leHackathon);
            $this->addFlash('success', 'Le hackathon a été supprimé des favoris');
            $em->flush();
        } 
        return $this->redirectToRoute('app_unHackathon',['id'=> $id]);
    }









}

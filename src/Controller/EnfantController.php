<?php

namespace App\Controller;

use App\Entity\Enfant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EnfantController extends AbstractController
{

    private $tokenstorage;
    private $entityManager;
   

    public function __invoke(Enfant $data,TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
      

        //recuperation du user connecté
       $userconnecte = $this->tokenStorage->getToken()->getUser();
      
       $use = $data->setUser($userconnecte);
      // dd($use);
       return $data;

    }


}
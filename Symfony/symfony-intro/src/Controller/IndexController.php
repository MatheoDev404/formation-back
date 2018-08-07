<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/hello")
     */
    public function Hello()
    {
        // Le chemin du template qui fait l'affichage
        // à partir de la racine du repertoire template
        return $this->render('index/hello.html.twig');
    }

    /**
     * @Route("/bonjour/{qui}")
     */
    public function bonjour($qui)
    {
        return $this->render('index/bonjour.html.twig', [
            'qui' => $qui,
        ]);
    }

    /**
     * @Route("/salut/{nom}",defaults={"nom":"toi"})
     */
    public function salut($nom)
    {
        return $this->render('index/salut.html.twig', [
            'nom' => $nom,
        ]);
    }

    /**
     * @Route("/coucou/{prenom}-{nom}",defaults={"nom":""})
     */
    public function coucou($prenom,$nom)
    {
        $nomComplet = rtrim($prenom . ' ' . $nom);
        return $this->render('index/coucou.html.twig', [
            'nom' => $nomComplet,
        ]);
    }

    /**
     * L'id doit forcement être un chiffre.1010101010
     *
     * @Route("/modifier-categorie/{id}", requirements={"id"="\d+"})
     */
    public function modifierCategorie($id)
    {
        return $this->render('index/modifier_categorie.html.twig', [
            'id' =>$id,
        ]);
    }
}

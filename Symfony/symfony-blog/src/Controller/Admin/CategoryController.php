<?php
namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\Controller\Admin
 * @Route("/categorie")
 */
class CategoryController extends Controller

{
    /**
     * @Route("/")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Category::class);
        // $categories = $repository->findAll();

        // toutes les categorie spar ordre croissant
        $categories = $repository->findBy([], ['id' => 'asc']);
        // Lister les catégories (id et nom) dans un tableau HTML
        return $this->render(
            'admin/category/index.html.twig',
            [
                'categories' => $categories,
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * {id} est optionnel grâce a defaults et doit etre un nombre (requirements)
     * @Route("/edition/{id}", defaults={"id": null}, requirements={"id"="\d+"})
     */

    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if (is_null($id)){ // creation
            $category = new Category();
        } else { // modification
            $category = $em->find(Category::class, $id);

            // 404 si l'id reçue dans l'url n'existe pas
            if(is_null($category)){
                throw new NotFoundHttpException();
            }
        }

        // création d'un formulaire lié à la Category $category
        $form = $this->createForm(CategoryType::class, $category);

        // le formulaire analyse la requête HTTP
        $form->handleRequest($request);

        // si le formualire à été soumis
        if($form->isSubmitted()){
            //les attributs de l'objet Category ont été settés
            // à partir des champs de formulaire
            // dump($category);

            // Valide la saisie du formulaire à partir des annotations assert dans l'entité Category
            if ($form->isValid()) {

                $em->persist($category);
                $em->flush();

                // message de confirmation
                $this->addFlash(
                    'success',
                    'La catégorie est enregistrée du cul'
                );
                // redirection vers la page de Liste
                return $this->redirectToRoute('app_admin_category_index');
            }else{
                $this->addFlash(
                    'error',
                    'Erreur du cul.'
                );
            }
        }

        return $this->render(
            'admin/category/edit.html.twig',
            [
                // passage du formulaire au template
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/suppression/{id}")
     */
    public function delete(Category $category)
    {
        if($category->getArticles()->isEmpty()){
            $em = $this->getDoctrine()->getManager();
            // préparation de la suppression en bdd
            $em->remove($category);
            // suppression effectué
            $em->flush();

            $this->addFlash(
                'success',
                'La catégorie du cul est bien supprimée.'
            );
        }else {
            $this->addFlash(
                'error',
                'Vous ne pouvez pas supprimer cette catégorie car elle contient des articles'
            );
        }


        return $this->redirectToRoute('app_admin_category_index');
    }
}


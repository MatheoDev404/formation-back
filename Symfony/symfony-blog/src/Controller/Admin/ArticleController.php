<?php
namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Controller\Admin
 * @Route("/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        /*
         * Faire sla page qui liste les articles dans un tableau html
         * avec le nom de la categorie et le nom de l'auteur
         * et la date au format français.
         */
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Article::class);
        $articles = $repository->findAll();

        // dump($articles);

        return $this->render(
            'admin/article/index.html.twig',
            [
                'articles' => $articles,
            ]
        );
    }

    /**
     * @Route("/edition/{id}", defaults={"id": null}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, $id)
    {
        /*
         *  Faire le rendu du formulaire et son traitement
         *  mettre un lien dans la page de liste
         *
         *  Validation : tous les champs obligatoires
         *  En création :
         *      - setter l'auteur avec l'utilisateur connecté ($this->getUser() depuis le contrôleur)
         *      - mettre la date de publication à maintenant
         *  Adapter la Route et le contenue de la methode pour faire
         *  fonctionner la page en modification et ajouter
         *  le boutton modifier dans la page liste
         *
         *  Enregistrer l'article en bdd si le formualire est correctement rempli
         *  puis rediriger avec un message de confirmation
         */

        $em = $this->getDoctrine()->getManager();
        $originalImage = null;

        if (is_null($id)){ // creation de l'article si il n'y a pas d'id en GET
            $article = new Article($this->getUser());

        }else { // modification
            $article = $em->find(Article::class, $id);

            if(!is_null($article->getImage())){
                // le nom du fichier venant de la bdd
                $originalImage = $article->getImage() ;

                // on sette l'image avec un objet File pour le traitement par le formulaire
                $article->setImage(
                  new  File($this->getParameter('upload_dir') . $originalImage)
                );
            }

            if (is_null($article)) {
                throw new NotFoundHttpException();
            }
        }

        // création d'un formulaire lié à la Article $article
        $form = $this->createForm(ArticleType::class, $article);

        // le formulaire analyse la requête HTTP
        $form->handleRequest($request);

        if($form->isSubmitted()){
            //les attributs de l'objet Article ont été settés
            // à partir des champs de formulaire
            // dump($article);

            // Valide la saisie du formulaire à partir des annotations assert dans l'entité Article
            if ($form->isValid()) {
                /**
                 * @var UploadedFile|null
                 */
                $image = $article->getImage() ;

                // si il y a une image uploadée
                if(!is_null($image)){
                    dump($image);
                    $filename = uniqid() . '.' . $image->guessExtension();
                    $image->move(
                        // repertoire de destination
                        // cf config/services.yaml
                        $this->getParameter('upload_dir'),
                        // nom du fichier
                        $filename
                    );

                    // On sette l'attribut image de l'article avec le nom
                    // de l'image pour l'enregistrement en bdd
                    $article->setImage($filename);

                    // En modification , on supprime l'ancienne image du repertoire public/images
                    if (!is_null($originalImage)){
                        unlink($this->getParameter('upload_dir') . $originalImage);
                    }
                }else{
                    // sans nouvel upload, on garde l'ancienne image
                    $article->setImage($originalImage);
                }

                $em->persist($article);
                $em->flush();

                // message de confirmation
                $this->addFlash(
                    'success',
                    'L\'article est enregistrée'
                );
                // redirection vers la page de Liste
                return $this->redirectToRoute('app_admin_article_index');
            }else{
                $this->addFlash(
                    'error',
                    'Erreur'
                );
            }
        }

        return $this->render(
            'admin/article/edit.html.twig',
            [
                'form' => $form->createView(),
                'original_image' => $originalImage,
            ]
        );
    }

    /**
     * @Route("/suppression/{id}")
     */
    public function delete(Article $article)
    {
        $em = $this->getDoctrine()->getManager();
        // préparation de la suppression en bdd
        $em->remove($article);
        // suppression effectué
        $em->flush();

        $this->addFlash(
            'success',
            'L\'article du cul est bien supprimée.'
        );

        return $this->redirectToRoute('app_admin_article_index');
    }
}

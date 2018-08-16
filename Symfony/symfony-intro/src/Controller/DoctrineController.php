<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Publication;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/doctrine")
 */
class DoctrineController extends Controller
{
    /**
     * @Route("/user/{id}")
     */
    public function index($id)
    {
        // gestionnaire d'entité de Doctrine
        $em = $this->getDoctrine()->getManager();

        /**
         * User::class == 'App\Entity\User'
         * Retourne un objet User dont les attributs sont settés à partir de la bdd,
         * User avec l'id 1
         */
        $user = $em->find(User::class, $id);

        // s'il n'y a pas de user en bdd avec l'id passée à la méthoede find() elle retourne null
        if(is_null($user)){
            // 404
            throw new NotFoundHttpException();
        }

        return $this->render('doctrine/index.html.twig',
        [
            'user' => $user
        ]);
    }

    /**
     * @Route("/create-user")
     */
    public function createUser(Request $request)
    {
   
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            dump($data);

            // on instancie un nouvel objet User
            $user = new User();
            // et on sette ses attributs avec les données
            // venant du formulaire
            $user
                ->setLastname($data['lastname'])
                ->setFirstname($data['firstname'])
                ->setEmail($data['email'])
                // le setter de birthdate attend un objet Datetime
                ->setBirthdate(new \DateTime($data['birthdate']))
            ;

            $em = $this->getDoctrine()->getManager();

            // dit qu'il faudra enregistrer le User en bdd
            // au prochain appel à la méthode flush()
            $em->persist($user);
            // enregistrement effectif
            $em->flush();
        }

        return $this->render('doctrine/create_user.html.twig');
    }

    /**
     * @Route("/list-user")
     */
    public function listUser()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class);
        $users = $repository->findAll();

        dump($users);

        return $this->render(
          'doctrine/list_user.html.twig',
          [
              'users' => $users,
          ]
        );
    }

    /**
     * @Route("/search-email/{email}")
     */
    public function searchEmail($email)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class);

        $user = $repository->findOneBy([
            'email' => $email,
        ]);

       return $this->render(
           "doctrine/index.html.twig",
           [
               'user' => $user,
           ]
       );
    }

    /**
     * @Route("/search-lastname/{lastname}")
     */
    public function searchLastname($lastname)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class);

        // return un tableau d'objet User
        // filtré sur le lastname
        // si il n'y a pas de resultat, return un tableau vide
        $users = $repository->findBy([
            'lastname' => $lastname,
            // si on voulias chercher sur plusieurs critère
            //'firstname' => $firstname,
        ]);

        return $this->render(
            "doctrine/list_user.html.twig",
            [
                'users' => $users,
            ]
        );
    }


    /**
     * // le paramètre dans l'url s'appelle id comme la clef priamire de la table user
     * // en typant User, le parametre passé à la méthode, on réccupère dans $author un objet User qui a cet id
     *
     * @Route("/publication/author/{id}")
     */
    public function publicationsByAuthor(User $author)
    {
        dump($author);


        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Publication::class);

        $publications = $repository->findBy([
            'author' => $author,
        ]);

        dump($publications);

        return $this->render(
            'doctrine/publication.html.twig',
            [
                'publications' => $publications,
            ]
        );
    }

    /**
    * @Route("/author/{id}]/publications")
    */
    public function userPublications(User $user)
    {

        /*
         * En appelenat le gettre de l'attribut publications
         * d'un objet User, Doctrine va automatiquement
         * faire une requête en bdd pour y mettre les publications
         * liées à cet user grâce à l'annotation @ORM/OneToManysur l'attribut
         */
        return $this->render(
            'doctrine/user_publications.html.twig',
            [
                'user' => $user,
            ]
        );
    }

    /**
     * @param Request $request
     * @Route("/create-user-with-publication")
     */
    public function createUserWithPublication(Request $request)
    {

        if ($request->isMethod('POST')) {

            $data = $request->request->all();

            $user = new User();

            $user
                ->setLastname($data['lastname'])
                ->setFirstname($data['firstname'])
                ->setEmail($data['email'])
                ->setBirthdate(new \DateTime($data['birthdate']))
            ;

            $publication = new Publication();

            $publication
                ->setTitle($data['title'])
                ->setContent($data['content'])
                ->setAuthor($user)
            ;


            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->persist($publication);
            $em->flush();
        }

        return $this->render('doctrine/create_user_with_publication.html.twig');
    }

    /**
     * @param Request $request
     * @Route("/create-user-with-publication-2")
     */
    public function createUserWithPublication2(Request $request)
    {

        if ($request->isMethod('POST')) {

            $data = $request->request->all();

            $user = new User();

            $user
                ->setLastname($data['lastname'])
                ->setFirstname($data['firstname'])
                ->setEmail($data['email'])
                ->setBirthdate(new \DateTime($data['birthdate']))
            ;

            $publication = new Publication();

            $publication
                ->setTitle($data['title'])
                ->setContent($data['content'])
                // ->setAuthor($user)
            ;

            $user->addPublication($publication);

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            // $em->persist($publication);

            /*
             * Grâce à cascade={"persist"} ajouté dans l'annotation
             * OneToMany sur l'attribut $publicationde User
             * plus besoins d'appeler persist() sur la publication
             * pour qu'elle soit enregistrée en bdd
             */
            $em->flush();
        }

        return $this->render('doctrine/create_user_with_publication.html.twig');
    }


    /**
     * @Route("/users/group/{id}", requirements={"id"="\d+"})
     */
    public function usersByGroup(Group $group)
    {

        return $this->render('doctrine/user_by_group.html.twig',
            [
                'group' => $group,
            ]);
    }

    /**
     * @Route("/add-user-to-group/{id}")
     */
    public function addUserToGroup(Request $request, Group $group)
    {
        // Entity manager : permet de manipuler les entité doctrine et leurs relation à la bdd
        $em = $this->getDoctrine()->getManager();
        // renvois UserRepository
        $repository = $em->getRepository(User::class);
        // ronvoie tous les users de la bdd sous la forme d'un tableau d'objets Users
        $users = $repository->findAll();

        if ($request->isMethod('POST')){
            // $_POST['user']
            $userId = $request->request->get('user');
            // l'objet User qui a l'id que l'ont a reçu en post
            $user = $repository->find($userId);
            // ajout du User à la collection d'objet User du Group
            $group->getUsers()->add($user);
            //Enregistrement du group en bdd
            // qui va enregistrer l'id du group et celui du User dans la table
            // de relation user_group
            $em->persist($group);
            $em->flush();
        }


        return $this->render(
            'doctrine/add_user_to_group.html.twig',
            [
                'group' => $group,
                'users' => $users,
            ]
        );
    }
}

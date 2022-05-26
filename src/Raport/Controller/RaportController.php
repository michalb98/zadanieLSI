<?php
namespace App\Raport\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Raport\Entity\Raport;
use Doctrine\ORM\EntityManagerInterface;
use App\Raport\Entity\User;
use App\Raport\Entity\Place;

class RaportController extends AbstractController {

    /**
     * @Route("/", name="raport")
     */

    public function index(EntityManagerInterface $entityManager){
        // $post = new Post();
        // $post->setContent('Test4');
        // $entityManager->persist($post);
        // $entityManager->flush();

        $place = new Place();
        $place->setName("Lokal 1");
        $entityManager->persist($place);
        $entityManager->flush();

        // $postRepository = $entityManager->getRepository(Post::class);
        // $raports = $postRepository->findAll();

        // $user = new User();
        // $html = '';
        // foreach($raports as $raport){
        //     $user->setRaport($raport);
        //     $html .= count($raport->getPostLike()). ' - ' . $raport->getContent() . '<br>';
        // }
        

        return new Response("test");
    }
}
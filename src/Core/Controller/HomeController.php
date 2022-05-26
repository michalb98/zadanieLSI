<?php
namespace App\Core\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Raport\Entity\User;
use App\Raport\Entity\Place;
use App\Raport\Entity\Raport;
use DateTime;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */

    public function index(EntityManagerInterface $entityManager, Request $request){
        $html = '';
        if($request->isMethod('POST')){
            $od = $request->get('od');
            $do = $request->get('do');
            $lokal = $request->get('place');

            $sql = "SELECT raport.name, userraport.userraport, place.name, raport.created  FROM raport 
                LEFT JOIN userraport 
                ON userraport.id = raport.userraport 
                LEFT JOIN place ON place.id = raport.place
                WHERE (raport.created > '".$od."' AND raport.created < '".$do."') AND place.name Like '".$lokal ."'";
            $raports =  $entityManager->getConnection()->executeQuery($sql)->fetchAllNumeric();
            foreach($raports as $raport){
                $html .= "<tr>";
                $date = explode(" ", $raport[3]);
                $html .= "<td>".$raport[0]."</td> <td>".$date[0]."</td><td>".$date[1]."</td> <td>".$raport[1]."</td> <td>".$raport[2]."</td>";
                $html .= "</tr>";
            }
            return $this->render('Home/home.twig', ['html' => $html]);
        }

        $sql = 'SELECT raport."name", userraport.userraport, place."name", raport.created  FROM raport 
                LEFT JOIN userraport 
                ON userraport.id = raport.userraport 
                LEFT JOIN place ON place.id = raport.place';
        $raports =  $entityManager->getConnection()->executeQuery($sql)->fetchAllNumeric();

        foreach($raports as $raport){
            $html .= "<tr>";
            $date = explode(" ", $raport[3]);
            $html .= "<td>".$raport[0]."</td> <td>".$date[0]."</td><td>".$date[1]."</td> <td>".$raport[1]."</td> <td>".$raport[2]."</td>";
            $html .= "</tr>";
        }
        return $this->render('Home/home.twig', ['html' => $html]);
    }
}
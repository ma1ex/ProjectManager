<?php

/**
 * Project: pm.local;
 * File: HomeController.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 16.12.2019, 14:16
 * Comment:
 */


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//

class HomeController extends AbstractController {

    /**
     * @param Request $request
     * @return Response
     * @Route ("/", name="home")
     */
    public function index(): Response {
        return $this->render('app/home.html.twig');
    }
}
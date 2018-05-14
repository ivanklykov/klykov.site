<?php
// src/Controller/AboutCotroller.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController 
{
    /** 
     * @Route("/about", name="about")
     */

    public function index(LoggerInterface $logger, \Twig_Environment $twig)
    {
        var_dump($twig);
        $number = $this->getRandomNumber();
        $logger->info('Hi');
        return 
            $this->render("about/index.html.twig", array(
                "number" => $number,

            ));
        
    }

    public function getRandomNumber()
    {
        return mt_rand(0, 100);
    }
}
<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestRequestController extends AbstractController
{

    #[Route("/ip", name: "ipPage")]

    public function ipPage(Request $request)
    {
        $ip = $request->getClientIp();

        return $this->render("mixedProject/ip.html.twig", [
            "ip" => $ip
        ]);
    }
}

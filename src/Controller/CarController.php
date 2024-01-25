<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route("/carController", name: "carPage")]
    public function carPage(SessionInterface $session): Response
    {
        $sessionNumber = 19;
        $sessionObject = new Car(1, "Aston");
        $serializedObject = serialize($sessionObject);

        $session->set("number", $sessionNumber);
        $session->set("object", $serializedObject);

        return $this->redirectToRoute("sessionPage");
    }


    #[Route("/readSession", name: "sessionPage")]
    public function readSession(SessionInterface $session): Response
    {
        $number = $session->get("number", 0);
        $unserializableObject = unserialize($session->get("object", ""));

        return $this->render('mixedProject/car.html.twig', [
            "title" => "Car",
            "number" => $number,
            "object" => $unserializableObject
        ]);
    }
}


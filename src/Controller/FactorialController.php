<?php


namespace App\Controller;

use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactorialController extends AbstractController
{

    #[Route("/factorial/{number}", name: "factorialPage")]
    public function factorialPage(string $number = null): Response
    {
        try {
            $number = $this->validateNumber($number);
            $result = $this->calculateFactorial($number);

            return $this->render('mixedProject/factorial.html.twig', [
                'number' => $number,
                'result' => $result,
                'title' => 'Factorial'
            ]);
        } catch (InvalidArgumentException $e) {
            return $this->render('mixedProject/factorial.html.twig', [
                "errorBool" => true,
                'error' => $e->getMessage(),
                'title' => 'Factorial'
            ]);
        }
    }

    private function validateNumber(string $number): int
    {
        if (!is_numeric($number)) {
            throw new InvalidArgumentException('Error: Please, input a valid number');
        }

        $number = (int) $number;

        if ($number < 0) {
            throw new InvalidArgumentException('Error: Your number can not be negative');
        }

        return $number;
    }

    private function calculateFactorial(int $number)
    {
        $result = 1;

        for ($i = $number; $i > 0; $i--) {
            $result *= $i;
        }
        return $result;
    }
}

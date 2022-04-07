<?php

namespace App\Controller;

use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{

    /**
     * @Route("/count-employees")
     */
    public function countEmployees(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Employee::class);

        $employees = $repository->findAllWithQB();

        return new Response(sprintf('%s employés existants', count($employees)));
    }

    /**
     * @Route("/find-user")
     */
    public function findUser(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Employee::class);

        $employee = $repository->findOneByUsernameWithDQL('jdoe');

        if (!$employee) {
            return new Response('Je n\'ai retrouvé personne...');
        }

        return new Response(sprintf('J\'a retrouvé %s %s', $employee->getFirstName(), $employee->getLastName()));
    }
}
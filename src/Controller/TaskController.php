<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/create-project")
     */
    public function createProject(): Response
    {
        $project = new Project();
        $project->setTitle('Titre du projet');
        $project->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua');

        $entityManger  = $this->getDoctrine()->getManager();
        $entityManger->persist($project);
        $entityManger->flush();

        return new Response(sprintf('Projet %s créé', $project->getTitle()));
    }

    // Question #2

    /**
     * @Route("/create-task")
     */
    public function createTask(): Response
    {
        $task = new Task();
        $task->setTitle('Titre de la tâche');
        $task->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua');

        $project = new Project();
        $project->setTitle('Titre du projet #2');
        $project->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua');

        $task->setProject($project);

        $entityManger  = $this->getDoctrine()->getManager();
        $entityManger->persist($task);
        $entityManger->flush();

        return new Response(sprintf('Tâche %s créée', $task->getTitle()));
    }
    /**
     * @Route("/count-tasks")
     */
    public function countTasks(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Task::class);

        $tasks = $repository->findAll();

        return new Response(sprintf('%s tâches existantes', count($tasks)));
    }
    /**
     * @Route("/find-task/{id}")
     */
    public function findTask(Task $task): Response
    {
        return new Response(sprintf('Titre de la tâche : %s', $task->getTitle()));
    }
     /**
     * @Route("/assign-task/{task_id}/{employee_id}")
     *
     * @Entity("task", expr="repository.find(task_id)")
     * @Entity("employee", expr="repository.find(employee_id)")
     *
     * @param Task $task
     * @param Employee $employee
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function assignTaskToEmployee(Task $task, Employee $employee, EntityManagerInterface $entityManager)
    {
        $task->setAssignedTo($employee);

        $entityManager->flush();

        return new Response(sprintf('La tâche : %s a été assignée à %s', $task->getTitle(), $employee->getUsername()));
    }
}
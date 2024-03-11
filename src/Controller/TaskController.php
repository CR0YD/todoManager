<?php
namespace App\Controller;

use App\Entity\Task;
use App\Factory\TaskFactory;
use App\Repository\TaskRepository;
use App\Serializer\TaskSerializer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/task')]
class TaskController extends AbstractController
{
    public function __construct(
        private readonly TaskFactory $taskFactory,
        private readonly ValidatorInterface $validator,
        private readonly TaskSerializer $serializer,
        private readonly TaskRepository $taskRepository
    ) {
    }

    #[Route('/create', methods: 'POST')]
    public function create(Request $request): Response
    {


        return new Response('', Response::HTTP_NO_CONTENT);
    }

    #[Route('/read', methods: 'GET')]
    public function read(): JsonResponse
    {
        $tasks = [];

        foreach ($this->taskRepository->findAll() as $task) {
            $tasks[] = $this->serializer->serialize($task);
        }

        return $this->json($tasks);
    }

    #[Route('/update/{id}', methods: 'GET')]
    public function update(EntityManagerInterface $entityManager, int $id): Response
    {
        $task = $entityManager->getRepository(Task::class)->find($id);

        if(!$task){
            return $this->redirect('/task/read');
        }

        $task->setTitle("Another Different Title");
        $entityManager->flush();
        return $this->redirect('/task/read');
    }

    #[Route('/delete', methods: 'POST')]
    public function delete()
    {

    }
}
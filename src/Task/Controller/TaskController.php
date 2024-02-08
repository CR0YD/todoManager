<?php
namespace App\Task\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task/create', methods: 'POST')]
    public function create()
    {

    }

    #[Route('/task/read', methods: 'GET')]
    public function read()
    {

    }

    #[Route('/task/update', methods: 'POST')]
    public function update()
    {

    }

    #[Route('/task/delete', methods: 'POST')]
    public function delete()
    {

    }
}
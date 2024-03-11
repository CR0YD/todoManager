<?php

namespace App\Factory;

use App\Entity\Task;

class TaskFactory
{

    function create(int $id, string $title, string $description, string $status): Task
    {
        $task = new Task();

        $task->setId($id);
        $task->setTitle($title);
        $task->setDescription($description);
        $task->setStatus($status);

        return $task;
    }

}
<?php

namespace App\Serializer;

use App\Entity\Task;

class TaskSerializer
{

    function serialize(Task $task): iterable
    {
        $serialized = [];

        $serialized['id'] = $task->getId();

        $serialized['title'] = $task->getTitle();

        $serialized['description'] = $task->getDescription();

        $serialized['status'] = $task->getStatus();

        return $serialized;
    }

}
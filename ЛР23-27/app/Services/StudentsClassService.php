<?php

namespace App\Services;

use App\Repositories\StudentsClassRepository;
use Ramsey\Collection\Collection;

class StudentsClassService extends CoreService
{
    /**
     * @param StudentsClassRepository $repository
     */
    public function __construct(StudentsClassRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getStudentsClasses(): Collection
    {
        return $this->repository->getStudentsClasses();
    }
}

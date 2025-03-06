<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\StudentsClassDTO;
use App\Http\Requests\StudentsClassRequest;
use App\Models\StudentsClass;
use App\Services\StudentsClassService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentsClassController
{
    use AuthorizesRequests;

    public function __construct(
        protected StudentsClassService $service,
    )
    {}

    public function index(): View
    {
        $studentsClasses = $this->service->paginate(4);

        return view('students-class', ['studentsClasses' => $studentsClasses]);
    }

    public function create(): View
    {
        return view('create-students-class');
    }

    public function store(StudentsClassRequest $request): RedirectResponse
    {
        $this->service->create(StudentsClassDTO($request->validated()));

        return to_route('studentsClass');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\Student\StudentListResource;
use App\Http\Resources\Student\SubmitStudentResource;
use App\Services\Student\StudentService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function __construct(
        StudentService $studentService,
    ) {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return Inertia::render(
            'admin/student/index',
            [
                // $role = auth()->user()->roles()->first()->name,

                "title" => 'Class | Students',
                "additional" => [
                    // 'role' => $role,
                ]
            ]
        );
    }

    public function getData(Request $request)
    {
        try {
            $data = $this->studentService->getData($request);

            $result = new StudentListResource($data);
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }

    public function createData(CreateStudentRequest $request)
    {
        try {
            $data = $this->studentService->createData($request);

            $result = new SubmitStudentResource($data, 'Success Create Student');
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }

    public function updateData($id, UpdateStudentRequest $request)
    {
        try {
            $data = $this->studentService->updateData($id, $request);

            $result = new SubmitStudentResource($data, 'Success Update Student');
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->studentService->deleteData($id);

            $result = new SubmitStudentResource($data, 'Success Delete Student');
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }
}

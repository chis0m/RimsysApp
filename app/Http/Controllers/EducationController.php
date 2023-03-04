<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Education;
use App\Repository\Educations;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index(): Response|JsonResponse
    {
        $educations = Educations::index();
        return $this->success(message: Lang::get('general.fetch'), data: $educations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function store(Request $request): Response|JsonResponse
    {
        $this->validateEducation();
        $reference = $request['reference'] ?? generateReference();
        $content = $request->only(['school', 'course', 'start_year', 'end_year']);
        $education = Education::updateOrCreate(['reference' => $reference], $content);
        Educations::clearCache();
        return $this->success(message: Lang::get('general.store'), data: new EducationResource($education));
    }

    private function validateEducation()
    {
        $this->option('reference', 'nullable|string');
        $this->option('school', 'required|string');
        $this->option('course', 'required|string');
        $this->option('start_year', 'required|date|date_format:Y-m-d');
        $this->option('end_year', 'required|date|after:start_year');
        $this->verify();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response|JsonResponse
     */
    public function destroy(int $id): Response|JsonResponse
    {
        $education = Education::findOrFail($id);
        $education->delete();
        Educations::clearCache();
        return $this->success(message: Lang::get('general.delete'), data: new EducationResource($education));
    }
}

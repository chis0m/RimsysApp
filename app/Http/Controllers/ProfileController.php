<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use App\Repository\Educations;
use App\Repository\Interests;
use App\Repository\Skills;
use App\Repository\Summaries;
use App\Repository\WorkExperiences;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index(): Response|JsonResponse
    {
        //Getting all resource from cache and cast each
        $summary = json_decode(Summaries::index()->toJson(), true);
        $experiences = json_decode(WorkExperiences::index()->toJson(), true);
        $education = json_decode(Educations::index()->toJson(), true);
        $skills = json_decode(Skills::index()->toJson(), true);
        $interests = json_decode(Interests::index()->toJson(), true);
        $profiles = compact(['summary', 'experiences', 'education', 'skills', 'interests']);
        return $this->success(message: Lang::get('general.fetch'), data: $profiles);
    }
}

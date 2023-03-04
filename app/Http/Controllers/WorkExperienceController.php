<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkExperienceResource;
use App\Models\Achievement;
use App\Models\WorkExperience;
use App\Repository\WorkExperiences;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index(): Response|JsonResponse
    {
        $experiences = WorkExperiences::index();
        return $this->success(message: Lang::get('general.fetch'), data: $experiences);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function store(Request $request): Response|JsonResponse
    {
        $this->validateExperience();
        $reference = $request['reference'] ?? generateReference();
        $content = $request->only(
            [
                'company',
                'title',
                'position',
                'stack',
                'start_year',
                'end_year',
                'till_present',
                'image_url'
            ]
        );
        $content['image_url'] = ($content['image_url']) ?: '/placeholder.png';
        $experience = WorkExperience::updateOrCreate(['reference' => $reference], $content);
        $achievements = collect($request['achievements']);
        if ($achievements->isNotEmpty()) {
            $achievements->each(function ($achievement) use ($experience) {
                $ref = $achievement['reference'] ?? generateReference();
                $arr = Arr::collapse([$achievement,['work_experience_id' => $experience->id]]);
                Achievement::updateOrCreate(['reference' => $ref], $arr);
            });
        }

        WorkExperiences::clearCache();
        return $this->success(message: Lang::get('general.store'), data: new WorkExperienceResource($experience));
    }

    private function validateExperience()
    {
        $this->option('reference', 'nullable|string');
        $this->option('company', 'required|string');
        $this->option('title', 'required|string');
        $this->option('position', 'required|string');
        $this->option('stack', 'nullable|string');
        $this->option('start_year', 'required|date|date_format:Y-m-d');
        $this->option('end_year', 'required|date|after:start_year');
        $this->option('till_present', 'required|boolean');
        $this->option('image_url', 'nullable|string');
        $this->option('achievements', 'nullable|array');
        $this->option('achievements.*.reference', 'nullable|string');
        $this->option('achievements.*.title', 'required_unless:achievements,null|string');
        $this->option('achievements.*.work_experience_id', 'nullable|integer');
        $this->option('achievements.*.description', 'required_unless:achievements,null|string');
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
        $workExperience = WorkExperience::findOrFail($id);
        $workExperience->achievements()->delete();
        $workExperience->delete();
        WorkExperiences::clearCache();
        return $this->success(message: Lang::get('general.delete'), data: new WorkExperienceResource($workExperience));
    }
}

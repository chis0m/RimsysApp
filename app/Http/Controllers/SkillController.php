<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\Repository\Skills;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index(): Response|JsonResponse
    {
        $skills = Skills::index();
        return $this->success(message: Lang::get('general.fetch'), data: $skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function store(Request $request): Response|JsonResponse
    {
        $this->validateSkill();
        $reference = $request['reference'] ?? generateReference();
        $content = $request->only(['category', 'name', 'level']);
        $skill = Skill::updateOrCreate(['reference' => $reference], $content);
        Skills::clearCache();
        return $this->success(message: Lang::get('general.store'), data: new SkillResource($skill));
    }

    private function validateSkill()
    {
        $this->option('reference', 'nullable|string');
        $this->option('category', 'required|string');
        $this->option('name', 'required|string');
        $this->option('level', 'required|integer');
        $this->option('description', 'nullable|string');
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
        $skill = Skill::findOrFail($id);
        $skill->delete();
        Skills::clearCache();
        return $this->success(message: Lang::get('general.delete'), data: new SkillResource($skill));
    }
}

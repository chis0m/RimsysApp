<?php

namespace App\Http\Controllers;

use App\Http\Resources\InterestResource;
use App\Models\Interest;
use App\Repository\Interests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index(): Response|JsonResponse
    {
        $interest = Interests::index();
        return $this->success(message: Lang::get('general.fetch'), data: $interest);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function store(Request $request): Response|JsonResponse
    {
        $this->validateInterest();
        $reference = $request['reference'] ?? generateReference();
        $content = $request->only(['name', 'description']);
        $interest = Interest::updateOrCreate(['reference' => $reference], $content);
        Interests::clearCache();
        return $this->success(message: Lang::get('general.store'), data: new InterestResource($interest));
    }

    private function validateInterest()
    {
        $this->option('reference', 'nullable|string');
        $this->option('name', 'required|string');
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
        $interest = Interest::findOrFail($id);
        $interest->delete();
        Interests::clearCache();
        return $this->success(message: Lang::get('general.delete'), data: new InterestResource($interest));
    }
}

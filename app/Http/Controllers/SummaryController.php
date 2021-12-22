<?php

namespace App\Http\Controllers;

use App\Http\Resources\SummaryResource;
use App\Models\Summary;
use App\Repository\Summaries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index(): Response|JsonResponse
    {
        $summaries = Summaries::index();
        return $this->success(message: Lang::get('general.fetch'), data: $summaries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function store(Request $request): Response|JsonResponse
    {
        $this->validateSummary();
        $reference = $request['reference'] ?? generateReference();
        $content = $request->only(['body']);
        $summary = Summary::updateOrCreate(['reference' => $reference], $content);
        Summaries::clearCache();
        return $this->success(message: Lang::get('general.store'), data: new SummaryResource($summary));
    }

    private function validateSummary()
    {
        $this->option('reference', 'nullable|string');
        $this->option('body', 'required|string');
        $this->verify();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Summary $summary
     * @return Response|JsonResponse
     */
    public function destroy(Summary $summary): Response|JsonResponse
    {
        $summary->delete();
        Summaries::clearCache();
        return $this->success(message: Lang::get('general.delete'), data: new SummaryResource($summary));
    }
}

<?php

namespace Laravel\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\LensActionRequest;
use Laravel\Nova\Http\Requests\LensRequest;

class LensActionController extends Controller
{
    /**
     * List the actions for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(LensRequest $request)
    {
        return response()->json([
            'actions' => $request->lens()->availableActionsOnIndex($request),
            'pivotActions' => [
                'name' => $request->pivotName(),
                'actions' => $request->lens()->availablePivotActions($request),
            ],
        ]);
    }

    /**
     * Perform an action on the specified resources.
     *
     * @param  \Laravel\Nova\Http\Requests\LensActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LensActionRequest $request)
    {
        $request->validateFields();

        return $request->action()->handleRequest($request);
    }
}

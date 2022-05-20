<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

abstract class InertiaController extends Controller
{
    /**
     * @return Authenticatable|null
     */
    public function user(): Authenticatable|null
    {
        return auth()->user();
    }

    /**
     * @param $component
     * @param  JsonResource|array|null  $resource
     * @param  array  $additional
     * @param  array  $customUI
     * @return InertiaResponse|array
     */
    public function render(
        $component,
        JsonResource|array|null $resource = null,
        array $additional = [],
        array $customUI = []
    ): InertiaResponse|array {
        $request = request();

        if ($resource instanceof JsonResource) {
            $resource = $resource->resolve($request);
        }

        if (!empty($resource)) {
            if (!array_key_exists('data', $resource)) {
                $resource = ['data' => $resource];
            }
            if ($additional) {
                $resource = array_merge($resource, $additional);
            }
        }

        $response = collect([])->when(
            !empty($resource),
            fn(Collection $collection) => $collection
                ->merge($resource)
        )->put('ui', array_merge($this->inertiaUI($request), $customUI));

        if ($response->isNotEmpty()) {
            $response = $response->sortByDesc(function ($item) {
                return is_array($item);
            })->toArray();
        }

        if ($this->exceptsJson($request)) {
            return $response;
        }

        return Inertia::render($component, $response);
    }

    protected function exceptsJson(Request $request): bool
    {
        return $request->boolean('ajax') || $request->expectsJson();
    }

    protected function inertiaUI(Request $request): array
    {
        return [];
    }

    protected function redirect(string $route, array $params = []): RedirectResponse
    {
        if (request()?->boolean('close')) {
            return redirect()->back();
        }

        return redirect()->route($route, $params);
    }
}

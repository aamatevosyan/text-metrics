<?php

namespace Domain\Supervisor\Http\Controllers;

use App\Http\Controllers\InertiaController;
use App\Http\Resources\CourseWork\CourseWorkCollectionResource;
use App\Http\Resources\CourseWork\CourseWorkResource;
use App\Models\CourseWork;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Inertia\Response as InertiaResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CourseWorkController extends InertiaController
{
    /**
     * Display a listing of the resource.
     *
     * @return array|InertiaResponse
     */
    public function index(): array|InertiaResponse
    {
        /** @var Supervisor $supervisor */
        $supervisor = $this->user();

        return $this->render('CourseWork/Index', CourseWorkCollectionResource::from(
            $supervisor->courseWorks()
                ->orderBy('id')
                ->paginate(CourseWork::getItemsPerPage())
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseWork  $courseWork
     * @return \Illuminate\Http\Response
     */
    public function show(CourseWork $courseWork)
    {
        return $this->render('CourseWork/Show', new CourseWorkResource($courseWork));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseWork  $courseWork
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseWork $courseWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseWork  $courseWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseWork $courseWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseWork  $courseWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseWork $courseWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseWork  $courseWork
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function preview(CourseWork $courseWork, Media $media)
    {
        if ($media->disk === 'local') {
            return response()->download($media->getPath(), $media->file_name);
        }

        $url = $media->getTemporaryUrl(now()->addMinutes(30));

        return redirect($url);
    }
}

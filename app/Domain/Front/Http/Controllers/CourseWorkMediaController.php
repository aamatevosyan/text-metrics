<?php

namespace Domain\Front\Http\Controllers;

use App\Http\Controllers\InertiaController;
use App\Http\Resources\CourseWork\CourseWorkCollectionResource;
use App\Http\Resources\CourseWork\CourseWorkResource;
use App\Models\CourseWork;
use App\Models\Student;
use Domain\Front\Http\Requests\CourseWorkMediaStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Response as InertiaResponse;

class CourseWorkMediaController extends InertiaController
{
    /**
     * Display a listing of the resource.
     *
     * @return array|InertiaResponse
     */
    public function index(): array|InertiaResponse
    {
        /** @var Student $student */
        $student = $this->user();

        return $this->render('CourseWork/Index', CourseWorkCollectionResource::from(
            $student->courseWorks()
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
    public function store(CourseWork $courseWork, CourseWorkMediaStoreRequest $request)
    {
        $hash = hash_file('sha256', $request->file('uploaded_file')?->getRealPath());

        if ($courseWork->media()->whereJsonContains('custom_properties->hash', $hash)->first()) {
            throw ValidationException::withMessages([
                'uploaded_file' => 'The document has already been uploaded.',
            ]);
        }

        $courseWork
            ->addMediaFromRequest('uploaded_file')
            ->withCustomProperties(compact('hash')) //middle method
            ->preservingOriginal() //middle method
            ->toMediaCollection('documents'); //finishing method
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
}

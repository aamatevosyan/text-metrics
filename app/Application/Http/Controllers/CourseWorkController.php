<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseWork\CourseWorkCollectionResource;
use App\Http\Resources\CourseWork\CourseWorkDocumentResource;
use App\Models\CourseWork;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Response as InertiaResponse;

class CourseWorkController extends InertiaController
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
        return $this->render('CourseWork/Show', new CourseWorkDocumentResource($courseWork));
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

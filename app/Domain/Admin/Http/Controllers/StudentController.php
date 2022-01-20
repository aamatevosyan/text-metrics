<?php

namespace Domain\Admin\Http\Controllers;


use App\Http\Controllers\InertiaController;
use App\Models\Student;
use Domain\Admin\Http\Resources\Student\StudentCollectionResource;
use Illuminate\Http\{RedirectResponse, Request};
use Inertia\Response as InertiaResponse;

class StudentController extends InertiaController
{
  /**
   * Display a listing of the resource.
   *
   * @param  Request  $request
   * @return array|InertiaResponse
   */
  public function index(Request $request): array|InertiaResponse
  {
    return $this->render(
      'Student/Index',
      new StudentCollectionResource(
        Student::query()
          ->paginate(Student::getItemsPerPage())
          ->withQueryString()
      )
    );
  }

  /**
   * @return InertiaResponse
   */
  public function create(): InertiaResponse
  {
    return $this->render('Student/Create');
  }

  /**
   * @param  StudentStoreRequest  $request
   * @return RedirectResponse
   */
  public function store(StudentStoreRequest $request): RedirectResponse
  {
    $validated = $request->validated();
    $student = Student::create($validated);

    return $this->redirect('admin.students.edit', ['student' => $student->id]);
  }

  /**
   * @param  Request  $request
   * @param  Student  $student
   * @return InertiaResponse
   */
  public function show(Request $request, Student $student): InertiaResponse
  {
    return $this->render('Student/View', new StudentResource($student));
  }

  /**
   * @param  Request  $request
   * @param  Student  $student
   * @return InertiaResponse
   */
  public function edit(Request $request, Student $student): InertiaResponse
  {
    return $this->render('Student/Edit', new StudentResource($student));
  }

  /**
   * @param  StudentUpdateRequest  $request
   * @param  Student  $student
   * @return RedirectResponse
   */
  public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
  {
    $validated = $request->validated();
    $student->update($validated);

    return $this->redirect('admin.students.edit', ['student' => $student->id]);
  }

  /**
   * @param  Student  $student
   * @return RedirectResponse
   */
  public function destroy(Student $student): RedirectResponse
  {
    $student->delete();

    return redirect()->back();
  }

  /**
   * @param $request
   * @return array
   */
  protected function inertiaUI($request): array
  {
    return [
//      'student_events' => StudentEvent::get(['id', 'name'])->map(function ($item) {
//        $item->name = ucfirst($item->name);
//        return $item;
//      }),
//      'types' => Student::getTypes(),
//      'affiliates' => Affiliate::all()->map(fn(Affiliate $affiliate) => [
//        'id' => $affiliate->id,
//        'name' => $affiliate->full_name,
//      ])->toArray()
    ];
  }
}

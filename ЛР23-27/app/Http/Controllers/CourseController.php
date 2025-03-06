<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CourseDTO;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use App\Services\UserCourseService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
 use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelWriter;

class CourseController extends Controller
{
    use AuthorizesRequests;
    /**
     * @param CourseService $service
     * @param UserCourseService $userCourseService
     */
	public function __construct(
		protected CourseService $service,
		protected UserCourseService $userCourseService,
	)
    {}

	/**
	 * @return View
	 * @throws AuthorizationException
	 */
	public function index(Request $request): View
	{
		$this->authorize('viewAny', Course::class);

        $title = $request->input('title');
        $courses = Course::query()->when($title, fn (Builder $query) => $query->whereLike('title', "%$title%"))->paginate(4);
//		$courses = $this->service->paginate(4);

		return view('courses', ['courses' => $courses]);
	}

	/**
	 * @return View
	 * @throws AuthorizationException
	 */
	public function create(): View
	{
		$this->authorize('create', Course::class);

		return view('create-course');
	}

	/**
	 * @param string $slug
	 *
	 * @return View
	 * @throws AuthorizationException
	 */
	public function show(string $slug): View
	{
		$course = $this->service->findBySlug($slug);

		$progress = $this->userCourseService->getProgress($course->id, auth()->user()->id);

		$this->authorize('view', $course);

		return view('show-courses', ['course' => $course, 'progress' => $progress]);
	}

	/**
	 * @param CourseRequest $request
	 *
	 * @return RedirectResponse
	 * @throws AuthorizationException
	 */
	public function store(CourseRequest $request): RedirectResponse
	{
		$this->authorize('create', Course::class);

        $this->service->create(CourseDTO::appRequest($request));

		return to_route('courses');
	}

	/**
	 * @param string $id
	 *
	 * @return RedirectResponse
	 * @throws AuthorizationException
	 */
	public function destroy(string $id): RedirectResponse
	{
        $model = $this->service->findById($id);

        $this->authorize('delete', $model);

        $this->service->destroyById($id);

		return to_route('courses');
	}

	/**
	 * @param string $slug
	 *
	 * @return View
	 * @throws AuthorizationException
	 */
	public function edit(string $slug): View
	{
		$course = $this->service->findBySlug($slug);

		$this->authorize('update', $course);

		return view('edit-course', ['course' => $course]);
	}

	/**
	 * @param CourseRequest $request
	 * @param string $slug
	 *
	 * @return RedirectResponse
	 * @throws AuthorizationException
	 */
	public function update(CourseRequest $request, string $slug): RedirectResponse
	{
		$course = $this->service->findBySlug($slug);

		$this->authorize('delete', $course);

		$this->service->update($course, CourseDTO::appRequest($request));

		return to_route('courses');
	}

	/**
	 * @param string $slug
	 *
	 * @return View
	 */
	public function showUsers(string $slug): View
	{
		$course = $this->service->findBySlug($slug);

		$users = $course->users;

		$numberCourseExams = $this->service->countCourseExams($slug);

		$numberPassedCourseExamsByUsers = $this->service->countPassedCourseExamsByUsers($slug);

		$averageMark = $this->service->calculateAverageMark($slug);

		$percentPassedCourseExams = $this->service->calculatePercentPassedCourseExams($numberCourseExams, $numberPassedCourseExamsByUsers);

		return view('showUsers-course', [
            'numberPassedCourseExamsByUsers' => $numberPassedCourseExamsByUsers,
            'numberCourseExams' => $numberCourseExams,
            'percentPassedCourseExams' => $percentPassedCourseExams,
            'users' => $users,
            'averageMark' => $averageMark,
        ]);
	}

    public function excel(Request $request)
    {
        Auth::user()->notify(VerifyEmail::class);
        $title = $request->input('title');
        $courses = Course::query()
            ->when($title, fn (Builder $query) => $query->whereLike('title', "%$title%"))
            ->get();

        $writer = SimpleExcelWriter::streamDownload('excel.xlsx')
            ->addHeader(['title', 'description', 'slug']);

        $courses->each(fn ($course) => $writer->addRow([
            'title' => $course->title,
            'description' => $course->description,
            'slug' => $course->slug
        ]));

        $writer->toBrowser();
    }
}

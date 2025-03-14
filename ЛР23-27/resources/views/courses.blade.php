@extends('layouts.app')

@section('main')
    <div class="container d-flex flex-column" style="height: 100%; width: 60%; background-color: transparent;">
        @include('layouts.navigation')

        <div class="content flex-grow-1">
            <div class="card-header rounded-top-4" style="background-color: transparent; border: none;">

            </div>
            <div class="card-body" style="margin: 0 auto; background-color: transparent;">
                <h2 class="mb-3">Курсы</h2>
                @can('create', \App\Models\Course::class)
                    <div class="mb-3">
                        <x-add-button-invert route="{{ route('courses.create') }}"/>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('courses') }}" method="GET">
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Поиск по названию">
                        <button type="submit" class="btn btn-elprimary shadow-sm px-4 py-2 rounded-3">
                            Поиск
                        </button>
                    </div>
                    <div class="mb-3">
                        <a type="button" class="btn btn-elprimary shadow-sm px-4 py-2 rounded-3" href="{{ route('courses.excel', ['title' => request()->input('title')]) }}">
                            Excel
                        </a>
                    </div>
                @endcan
                <div class="d-flex flex-column justify-content-center align-items-center">
                    @foreach($courses->take(3) as $course)
                        @can('view', $course)
                            <div class="mb-4" style="width: 100%; background-color: transparent;">
                                @include('components.course-card', [
                                    'title' => $course->title,
                                    'description' => $course->description,
                                    'course' => $course,
                                    'deleteForm' => route('courses.destroy', $course->id),
                                ])
                            </div>
                        @endcan
                    @endforeach
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center"
             style="position: fixed; bottom: 20px; width: 80%; background-color: transparent;">
            {{ $courses->links() }}
        </div>
    </div>
@endsection

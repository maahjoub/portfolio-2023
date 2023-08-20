<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@isset($success)
    <div class="alert alert-success text-white">
        {{ $success }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-content-around m-2">
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add New Skills
                            </button>
                        </div>
                        Skills
                    </div>
                    <table class="table table-bordered mt-2">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Image</th>
                            <th scope="col">Short Description</th>
                            <th scope="col">Project Skills</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $key=>$project)
                        <tr class="text-center">
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->progress . '%' }}</td>
                            <td class=" m-auto"><img class="w-16 rounded " src="{{ asset('image/projects/'. $project->img) }}"/></td>
                            <td class=" m-auto">{{ $project->short_desc }}</td>
                            <td class=" m-auto">
                            @foreach($project->skills as $key=>$skill)
                                    <span class="skills bg-gray-700 shadow-md shadow-gray-500/20 p-2">{{$skill->skill_name  }}</span>
                            @endforeach
                            </td>
                            <td class="d-flex justify-center">
                                <button  class="btn btn-outline-primary mr-1" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$project->id}}">
                                    Edit Skill
                                </button>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @include('projects.edit')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            @include('projects.create')

        </div>
    </div>
</x-app-layout>

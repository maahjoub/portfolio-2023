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
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($skills as $key=>$skill)
                        <tr class="text-center">
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->progress . '%' }}</td>
                            <td class=" m-auto"><img class="w-16 rounded " src="{{ asset('image/skills/'. $skill->img) }}"/></td>
                            <td class="d-flex justify-center">
                                <button type="button" class="btn btn-outline-primary mr-1" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit">
                                    Edit
                                </button>
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            @include('skills.create')
            @include('skills.edit')
        </div>
    </div>
</x-app-layout>

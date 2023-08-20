<!-- Modal -->
<div class="modal fade" id="staticBackdropEdit{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ isset($project) ? route('projects.update', $project->id) : '' }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $project->id }}" name="id">
            <div class="modal-body m-auto">
                <div class="form-group w-75 m-auto">
                    <input type="text" name="name" placeholder="Type project Name" value="{{ isset($project) ? $project->name : ''}}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="progress" placeholder="Type project progress" value="{{  isset($project) ? $project->progress : ''}}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <textarea name="short_desc" placeholder="Type project short description" value="{{  isset($project) ? $project->description : ''}}" class="form-control">
                        {{ isset($project) ? $project->description : ''}}
                    </textarea>
                </div>

                <div class="form-group w-75 mt-2 m-auto">

                    <select class="form-control" name="skill[]" multiple>
                        <option disabled selected>Select Skill</option>
                        @foreach($skills as $skill)
                            <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <textarea name="description" placeholder="Type project description" value="{{  isset($project) ? $project->description : ''}}" class="form-control">
                        {{ isset($project) ? $project->description : ''}}
                    </textarea>
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="github" placeholder="Type Skills progress" value="{{  isset($project) ? $project->github_url : ''}}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="project_url" placeholder="Type Skills progress" value="{{  isset($project) ? $project->project_url : ''}}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 mb-2 m-auto">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-primary">store</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

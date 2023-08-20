<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body m-auto">
                <div class="form-group w-75 m-auto">
                    <input type="text" name="name" placeholder="Type project Name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="progress" placeholder="Type project progress" value="{{ old('progress') }}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="github" placeholder="Type project Github Url" value="{{ old('github') }}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="project_url" placeholder="Type project Project Url" value="{{ old('project_url') }}" class="form-control">
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
                    <textarea class="form-control" name="short_desc"  placeholder="Type short Description about This Project"></textarea>
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <textarea class="form-control" name="description" placeholder="Type Description about This Project"></textarea>
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

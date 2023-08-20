<!-- Modal -->
<div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ isset($skill) ? route('skills.update', $skill->id) : '' }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="modal-body m-auto">
                <div class="form-group w-75 m-auto">
                    <input type="text" name="name" placeholder="Type Skills Name" value="{{ isset($skill) ? $skill->name : ''}}" class="form-control">
                </div>
                <div class="form-group w-75 mt-2 m-auto">
                    <input type="text" name="progress" placeholder="Type Skills progress" value="{{  isset($skill) ? $skill->progress : ''}}" class="form-control">
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

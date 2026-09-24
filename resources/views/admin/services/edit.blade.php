@include('admin.include.header')

<div class="page-content">

    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Edit Service</h4>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($service->banner_image)
                <div class="mt-2">
                    <img src="{{ asset('uploads/service-images/' . $service->banner_image) }}" alt="Blog Image" width="120" height="80" style="object-fit: cover; border-radius: 5px;">
                </div>
            @endif
        </div>
        
         <div class="mb-3">
            <label>Icon</label>
            <input type="file" name="icon" class="form-control">

            @if($service->icon)
                <img src="{{ asset('uploads/service-icons/'.$service->icon) }}" width="80" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="short_description" class="form-control" value="{{ old('short_description', $service->short_description) }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
           <textarea name="description" id="contentEditor" rows="25" class="form-control">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" id="blogStatus" class="form-control" required>
                <option value="1" {{ $service->status == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $service->status == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
{{-- CKEditor 5 --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let editorInstance;

    ClassicEditor
        .create(document.querySelector('#contentEditor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => console.error(error));

    // Sync CKEditor data before form submit
    document.querySelector('#blogForm').addEventListener('submit', function(e){
        const contentTextarea = document.querySelector('#contentEditor');
        contentTextarea.value = editorInstance.getData(); // set textarea value from editor
    });
});
</script>

@include('admin.include.footer')
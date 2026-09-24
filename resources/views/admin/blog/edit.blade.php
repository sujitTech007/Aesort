@include('admin.include.header')

<div class="page-content">

    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Edit Blog</h4>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($blog->image)
                <div class="mt-2">
                    <img src="{{ asset('uploads/blog-images/' . $blog->image) }}" alt="Blog Image" width="120" height="80" style="object-fit: cover; border-radius: 5px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $blog->description) }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
           <textarea name="content" id="contentEditor" rows="25" class="form-control">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" id="blogStatus" class="form-control" required>
                <option value="1" {{ $blog->status == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $blog->status == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
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

@include('admin.include.header')

<div class="page-content">

    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Create Service</h4>
        </div>
    </div>

    <form id="blogForm" method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="serviceBannerImage">Banner image</label>
            <input type="file" id="serviceBannerImage" name="banner_image" class="form-control" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml,image/" required>
            <div id="serviceBannerFilename" class="form-text">No image selected.</div>
            <div id="serviceBannerPreview" class="mt-2"></div>
        </div>
        
        <div class="mb-3">
            <label for="serviceIcon">Service icon</label>
            <input type="file" id="serviceIcon" name="icon" class="form-control" accept="image/jpeg,image/png,image/gif,image/svg+xml,image/webp,image/" required>
            <div id="serviceIconFilename" class="form-text">No icon selected.</div>
            <div id="serviceIconPreview" class="mt-2"></div>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label>Short Description</label>
            <input type="text" name="short_description" class="form-control" value="{{ old('short_description') }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" id="contentEditor" rows="25" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

{{-- CKEditor 5 --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let editorInstance;

    const bindImagePreview = (inputId, previewId, filenameId, maxWidth, maxHeight) => {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const filename = document.getElementById(filenameId);

        input.addEventListener('change', function() {
            const file = this.files && this.files[0];
            if (!file) return;

            filename.textContent = file.name;
            const imageUrl = URL.createObjectURL(file);
            preview.replaceChildren();
            const image = document.createElement('img');
            image.src = imageUrl;
            image.alt = 'Selected image preview: ' + file.name;
            image.style.cssText = `max-width: ${maxWidth}px; max-height: ${maxHeight}px; object-fit: contain; border-radius: 5px;`;
            image.addEventListener('load', () => URL.revokeObjectURL(imageUrl), { once: true });
            preview.appendChild(image);
        });
    };

    bindImagePreview('serviceBannerImage', 'serviceBannerPreview', 'serviceBannerFilename', 240, 160);
    bindImagePreview('serviceIcon', 'serviceIconPreview', 'serviceIconFilename', 80, 80);

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
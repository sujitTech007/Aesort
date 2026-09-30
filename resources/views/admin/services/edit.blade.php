@include('admin.include.header')

<div class="page-content">

    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Edit Service</h4>
        </div>
    </div>

    <form id="editServiceForm" method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="serviceBannerImage">Banner image</label>
            <input type="file" id="serviceBannerImage" name="banner_image" class="form-control" accept="image/jpeg,image/png,image/webp,image/gif,image,svg+xml">
            <div id="serviceBannerFilename" class="form-text">Select an image to replace the current banner.</div>
            <div id="serviceBannerPreview" class="mt-2">
            @if($service->banner_image)
                <img src="{{ asset('uploads/service-images/' . $service->banner_image) }}" alt="Current service banner" style="max-width: 240px; max-height: 160px; object-fit: contain; border-radius: 5px;">
            @endif
            </div>
        </div>
        
         <div class="mb-3">
            <label for="serviceIcon">Service icon</label>
            <input type="file" id="serviceIcon" name="icon" class="form-control" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml">
            <div id="serviceIconFilename" class="form-text">Select an icon to replace the current icon.</div>
            <div id="serviceIconPreview" class="mt-2">

            @if($service->icon)
                <img src="{{ asset('uploads/service-icons/'.$service->icon) }}" alt="Current service icon" style="max-width: 80px; max-height: 80px; object-fit: contain;">
            @endif
            </div>
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
    const bindImagePreview = (inputId, previewId, filenameId) => {
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
            image.style.cssText = 'max-width: 240px; max-height: 160px; object-fit: contain; border-radius: 5px;';
            image.addEventListener('load', () => URL.revokeObjectURL(imageUrl), { once: true });
            preview.appendChild(image);
        });
    };

    bindImagePreview('serviceBannerImage', 'serviceBannerPreview', 'serviceBannerFilename');
    bindImagePreview('serviceIcon', 'serviceIconPreview', 'serviceIconFilename');

    ClassicEditor
        .create(document.querySelector('#contentEditor'))
        .then(editor => {
            document.getElementById('editServiceForm').addEventListener('submit', function() {
                document.querySelector('#contentEditor').value = editor.getData();
            });
        })
        .catch(error => console.error(error));
});
</script>

@include('admin.include.footer')
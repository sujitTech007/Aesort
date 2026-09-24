@include('admin.include.header')

<div class="page-content">

    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">View Blog</h4>
        </div>
    </div>

    <form>
        @csrf
       

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" readonly>
            @if($blog->image)
                <div class="mt-2">
                    <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="Blog Image" width="120" height="80" style="object-fit: cover; border-radius: 5px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}"  readonly>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $blog->description) }}" readonly>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" class="form-control" value="{{ old('content', $blog->content) }}" readonly>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" id="blogStatus" class="form-control" readonly disabled>
                <option value="active" {{ $blog->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $blog->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>

@include('admin.include.footer')

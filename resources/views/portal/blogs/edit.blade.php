@extends('portal.layouts.app')
@section('title') Edit Blog @endsection
@section('content')        
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Blogs</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item">Blogs</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="card">
                <div class="card-body">
                    <form id="editForm" class="form"  data-route="{{ route('portal.blog.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                      

                        <!-- Blog Title -->
                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label required">Title</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="title" value="{{ old('title', $blog->title) }}" placeholder="Blog Title" required>
                            </div>
                        </div>

                        <!-- URL Slug -->
                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label">URL Slug</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="slug" value="{{ old('slug', $blog->slug) }}" placeholder="Leave blank to auto-generate from the title">
                                <small class="form-text text-muted">Used in the article's web address, e.g. /blog-single/your-slug-here. Changing this changes the live article URL.</small>
                            </div>
                        </div>

                        <!-- Blog Category -->
                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label required">Category</label>
                            <div class="col-sm-11">
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label required">Content</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" id="summernote" name="content" placeholder="Enter Blog Content" required>{{ old('content', $blog->content) }}</textarea>
                            </div>
                        </div>

                        <!-- Blog Banner -->
                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label">Banner</label>
                            <div class="col-sm-11">
                                <input type="file" class="form-control" name="banner">
                                @if($blog->banner)
                                    <img src="{{ asset($blog->banner) }}" alt="Current Banner" style="width: 200px; margin-top: 10px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Update</button>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bar Container -->
    <div id="progress-container" style="display: none;">
        <div class="progress">
            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300, // set the height of the editor
        });
    });
</script>
@endsection

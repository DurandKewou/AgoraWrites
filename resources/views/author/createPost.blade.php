@extends('layouts/author')
@section('space-work')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Write Your Post</h4>
                    </div>
                    <form action="{{route('author.SavePost')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="category_id">
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{ucfirst($categorie->name)}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="content"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview" style="border: 1px dashed #ccc; padding: 10px; text-align: center;">
                                        <label for="image-upload" id="image-label" style="cursor:pointer;">Choose File</label>
                                        <input type="file" name="image" id="image-upload" accept="image/*" style="display: none;" />
                                        <br>
                                        <img id="preview-img" src="" alt="Prévisualisation" style="margin-top:10px; max-width: 100%; height: auto; display: none;" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control inputtags" name="tags">
                                    <small class="form-text text-muted">Séparez les tags par une virgule (ex: "SEO, Marketing, Rédaction").</small>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="status">
                                    <option value="published">Publish</option>
                                    <option value="draft">Draft</option>
                                    <option value="pending">Pending</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Create Post</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
                </div>
            </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewImg = document.getElementById('preview-img');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewImg.src = '';
                previewImg.style.display = 'none';
            }
        });
    </script>

@endsection
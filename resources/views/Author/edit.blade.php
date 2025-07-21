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
                                <h4>Modifier l'article({{$post->title}})</h4>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                            </div>
                            <form action="{{ route('author.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="category_id">
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}" {{ old('category_id', $post->category_id) == $categorie->id ? 'selected' : '' }}>
                                                        {{ ucfirst($categorie->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="content">{{ old('content', $post->content) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview" 
                                                style="border: 1px dashed #ccc; padding: 10px; text-align: center; height: 250px; position: relative;">
                                                
                                                <label for="image-upload" id="image-label" style=" position:absolute; top:10px; left:10px; padding:3px 8px; border-radius:4px;">Choose File
                                                </label>

                                                <input type="file" name="image" id="image-upload" class="form-control-file" style="opacity: 0; position: absolute; top: 0; left: 0; height: 100%; width: 100%; cursor: pointer;" onchange="previewImage(event)">

                                                <img id="preview-img" src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" alt="Image Preview" style="display: {{ $post->image ? 'block' : 'none' }}; max-height: 100%; width: 100%; object-fit: cover; margin-top: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="tags[]" class="form-control" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">Maintenez Ctrl Windows ou Cmd Mac pour sélectionner plusieurs tags.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="status">
                                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Brouillon</option>
                                            <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Publié</option>
                                            <option value="dending" {{ $post->status == 'dending' ? 'selected' : '' }}>En attente</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-success">Mettre à jour</button>
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
    function previewImage(event) {
        const preview = document.getElementById('preview-img');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
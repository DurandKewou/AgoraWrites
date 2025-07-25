@extends('layouts/admin')

@section('styles')
<style>
  #outer{
    width: auto;
    text-align: center;
  }
  .inner{
    display: inline-block;
  }
</style>
@endsection

@section('space-work')

  <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article">
                                    <div class="article-header">
                                        <div class="article-image" style="height:250px; background-size:cover; background-position:center; background-image: url('{{ asset('storage/' . $post->image) }}');"></div>
                                        <div class="article-title">
                                            <h2><a href="{{ route('post.access', $post->id) }}">{{ $post->title }}</a></h2>
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <p>{!! Str::limit(strip_tags($post->content), 150) !!}</p>
                                        <div class="article-cta">
                                            <a href="{{ route('post.access', $post->id) }}" class="btn btn-primary">Lire la suite</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-warning">
                                <p>Aucun article trouvé.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
  </div>

@endsection

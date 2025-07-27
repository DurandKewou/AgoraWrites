@extends('layouts/dashboard')

@section('space-work')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3"> 
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" style="height:250px; background-size:cover; background-position:center; background-image: url('{{ asset('storage/' . $post->image) }}');"></div>
                            
                                    <!-- Titre -->
                                    <div class="article-title">
                                        <h2><a href="{{ route('post.access', $post->id) }}">{{ $post->title }}</a></h2>
                                    </div>
                                </div>

                                <div class="article-details">
                                    @php
                                        $user = auth()->user();
                                        $isLiked = $post->isLikedByUser($user->id);
                                    @endphp

                                    <div class="d-flex justify-content-start align-items-center px-2 py-1" style="gap: 15px;">
                                        <!-- Like -->
                                        <form action="{{ route('post.like', $post->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $isLiked ? 'btn-danger text-white' : 'btn-light text-danger' }}" title="J'aime">
                                                <i class="fas fa-heart"></i> {{ $post->likes->count() }}
                                            </button>
                                        </form>

                                        <!-- Dislike -->
                                        <form action="{{ route('post.dislike', $post->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-light text-secondary" title="Je n'aime pas">
                                                <i class="fas fa-thumbs-down"></i>
                                            </button>
                                        </form>

                                        <!-- Commentaire -->
                                        <a href="{{ route('post.access', $post->id) }}#commentaires" class="btn btn-sm btn-light text-primary" title="Commenter">
                                            <i class="fas fa-comment-dots"></i>
                                        </a>

                                        <!-- Nombre de vues -->
                                        <span class="text-muted">
                                            <i class="fas fa-eye"></i> {{ $post->views }}
                                        </span>
                                    </div>

                                    <p>{!! Str::limit(strip_tags($post->content), 150) !!}</p>
                                    <div class="article-cta">
                                        <a href="{{ route('post.access', $post->id) }}" class="btn btn-primary">Lire la suite</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@endsection

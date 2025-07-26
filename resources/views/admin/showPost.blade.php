@extends('layouts.admin')

@section('space-work')
    <div class="container">
        <section class="section">
            <div class="container mt-5">
                <h4>Détails de l'article</h4>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-2 col-xl-10 offset-xl-2">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2 class="text-center">{{ $post->title }}</h2>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">
                                    <small class="text-muted">
                                        @if($post->created_at->isToday())
                                            {{ $post->created_at->setTimezone('Africa/Lagos')->format('H:i') }} min
                                        @else
                                            @php
                                                $daysAgo = floor($post->created_at->diffInHours(now()) / 24);
                                            @endphp
                                            Publié il y a {{ $daysAgo }} jour{{ $daysAgo > 1 ? 's' : '' }}
                                        @endif
                                    </small>
                                    par <strong>{{ $post->user->name ?? 'Auteur inconnu' }}</strong> |
                                    Catégorie : <span class="badge badge-primary">{{ $post->category->name ?? 'Aucune' }}</span>
                                </p>
                                <div class="post-content">
                                    {!! $post->content !!} 
                                </div>
                                <div class="mb-3">
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">#{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                <div class="text-end mb-3">
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <i class="fas fa-comments"></i> Commentaires
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="text-center mt-3">
                                        <a href="{{ route('admin.index') }}" class="btn btn-primary">← Retour à la liste des articles</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- Modal for comments -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Commentaires sur : {{ $post->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <!-- 🗨 Liste des commentaires -->
                    @if($post->comments->isEmpty())
                        <p>Aucun commentaire pour cet article.</p>
                    @else
                        <ul class="list-group mb-3">
                            @foreach($post->comments->take(2) as $comment)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $comment->user->name ?? 'Anonyme' }} :</strong>
                                            <p class="mb-1">{{ $comment->content }}</p>
                                            <small class="text-muted">
                                                @if($comment->created_at->isToday())
                                                    {{ $comment->created_at->setTimezone('Africa/Lagos')->format('H:i') }} min
                                                @else
                                                    @php
                                                        $daysAgo = floor($comment->created_at->diffInHours(now()) / 24);
                                                    @endphp
                                                    Publié il y a {{ $daysAgo }} jour{{ $daysAgo > 1 ? 's' : '' }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-thumbs-up"></i></button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-thumbs-down"></i></button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            <!-- 🔽 Commentaires cachés -->
                            <div id="more-comments" style="display: none;">
                                @foreach($post->comments->slice(2) as $comment)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>{{ $comment->user->name ?? 'Anonyme' }} :</strong>
                                                <p class="mb-1">{{ $comment->content }}</p>
                                                <small class="text-muted">Publié le {{ $comment->created_at->format('d M Y') }}</small>
                                            </div>
                                            <div class="text-end">
                                                <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-thumbs-up"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-thumbs-down"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                        </ul>

                        @if($post->comments->count() > 3)
                            <div class="text-center mb-3">
                                <button class="btn btn-link" id="toggle-comments">
                                    <i class="fas fa-chevron-down"></i> Voir plus
                                </button>
                            </div>
                        @endif
                    @endif

                    <!-- 📝 Formulaire de commentaire -->
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="content">Votre commentaire</label>
                            <input name="content" id="content" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
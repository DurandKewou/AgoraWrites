@extends('layouts/welcome')

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
                                    Publié le {{ $post->created_at->format('d M Y') }} 
                                    par <strong>{{ $post->user->name ?? 'Auteur inconnu' }}</strong> |
                                    Catégorie : <span class="badge badge-primary">{{ $post->category->name ?? 'Aucune' }}</span>
                                </p>
                                <div class="mb-3">
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">#{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                <div class="post-content">
                                    {!! $post->content !!} 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Commentaires</h3>
                                        @if($post->comments->isEmpty())
                                            <p>Aucun commentaire pour cet article.</p>
                                        @else
                                            <ul class="list-group">
                                                @foreach($post->comments as $comment)
                                                    <li class="list-group-item">
                                                        <strong>{{ $comment->user->name ?? 'Anonyme' }} :</strong>
                                                        <p>{{ $comment->content }}</p>
                                                        <small class="text-muted">Publié le {{ $comment->created_at->format('d M Y') }}</small>
                                                    </li>  
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Laisser un commentaire</h3>
                                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="content">Votre commentaire</label>
                                                <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Envoyer</button> 
                                        </form>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">← Retour à la liste des articles</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
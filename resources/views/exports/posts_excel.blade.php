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
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="m-5">
                <div class="card m-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4> Statistique</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Titre du Post</th>
                                    <th>Auteur</th>
                                    <th>Nombre de vues</th>
                                    <th>Likes</th>
                                    <th>Commentaires</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name ?? 'N/A' }}</td>
                                        <td>{{ $post->views_count ?? 0 }}</td>
                                        <td>{{ $post->likes_count ?? 0 }}</td>
                                        <td>{{ $post->comments_count ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>   
            <div class="m-5">
                <div class="card m-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Statistiques des revenus</h4>
                    <div class="card-header-action d-flex gap-2">
                    <!-- Boutons Export -->
                    <a href="{{ route('export', ['format' => 'excel']) }}" class="btn btn-success">Exporter Excel</a>
                    <a href="{{ route('export', ['format' => 'pdf']) }}" class="btn btn-danger">Exporter PDF</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <!-- Formulaire de filtre -->
                        <form method="GET" action="{{ route('statistics') }}" class="mb-4">
                        <label for="authorFilter">Filtrer par auteur :</label>
                        <select name="author_id" id="authorFilter" class="form-control mb-2">
                            <option value="">Tous les auteurs</option>
                            @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="dateFrom">Date de début :</label>
                        <input type="date" name="date_from" id="dateFrom" class="form-control mb-2" value="{{ request('date_from') }}">
                        <label for="dateTo">Date de fin :</label>
                        <input type="date" name="date_to" id="dateTo" class="form-control mb-2" value="{{ request('date_to') }}">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                        </form>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="revenueChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                </div>
                </div>
        </div> 
    </section>
  </div>

                    
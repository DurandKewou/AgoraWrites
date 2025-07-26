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
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Statistiques des revenus</h4>
                    <div class="card-header-action d-flex gap-2">
                      <!-- Boutons Export -->
                      <a href="{{ route('admin.excel', ['format' => 'excel']) }}" class="btn btn-success">Exporter Excel</a>
                      <a href="{{ route('admin.excel', ['format' => 'pdf']) }}" class="btn btn-danger">Exporter PDF</a>
                    </div>
                  </div>

                  <div class="card-body">

                    <form method="GET" action="{{ route('admin.statistics') }}" class="mb-4">
                      <div class="form-group d-flex align-items-center gap-2">
                        <label for="author">Filtrer par auteur :</label>
                        <select name="author" id="author" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Tous les auteurs --</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ $authorId == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                    </form>

                    <canvas id="viewsChart" width="800" height="400"></canvas>
                  </div>
                </div>
            </div>
          </div>
          <div class="m-5">
            <div class="card m-5">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4> Statistique</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                      <thead style="background-color: #343a40; color: white;">
                          <tr>
                              <th>#</th>
                              <th>Titre du Post</th>
                              <th>Auteur</th>
                              <th>Vues</th>
                              <th>Likes</th>
                              <th>Commentaires</th>
                              <th>Publie le</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if (count($posts) > 0)
                          @foreach ($posts as $post)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>
                                      <a href="{{ route('post.access', $post->id) }}" target="_blank">
                                          {{ Str::limit($post->title, 50) }}
                                      </a>
                                  </td>
                                  <td>{{ $post->user->name ?? 'Auteur inconnu' }}</td>
                                  <td><i class="fas fa-eye"></i> {{ $post->views }}</td>
                                  <td><i class="fas fa-heart text-danger"></i> {{ $post->likes_count }}</td>
                                  <td><i class="fas fa-comments text-primary"></i> {{ $post->comments_count }}</td>
                                  <td>{{ $post->created_at->format('d/m/Y') }}</td>
                              </tr>
                          @endforeach
                            
                        @else
                          <tr>
                              <td colspan="7" class="text-center text-muted">Aucun post trouvé.</td>
                          </tr>
                            
                        @endif
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('viewsChart')?.getContext('2d');
if (ctx) {
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Nombre de vues',
                data: @json($views),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Vues'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Post'
                    }
                }
            }
        }
    });
}
</script>

@endsection
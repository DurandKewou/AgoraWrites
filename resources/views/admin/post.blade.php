@extends('layouts/admin')
@section('space-work')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card mb-0">
              <div class="card-body">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">All <span class="badge badge-white">10</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Draft <span class="badge badge-primary">2</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pending <span class="badge badge-primary">3</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Posts</h4>
              </div>
              <div class="card-body">
                <div class="float-left">
                  <select class="form-control selectric">
                    <option>Action For Selected</option>
                    <option>Move to Draft</option>
                    <option>Move to Pending</option>
                    <option>Delete Permanently</option>
                  </select>
                </div>
                <div class="float-right">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th class="pt-2">
                        <div class="custom-checkbox custom-checkbox-table custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                            class="custom-control-input" id="checkbox-all">
                          <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                        </div>
                      </th>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Created At</th>
                      <th>Views</th>
                      <th>Status</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <tr>
                       @if (count($posts) > 0)
                          @foreach ($posts as $post)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->user->name }}</td>
                              <div class="table-links">
                                <a href="#">View</a>
                                <div class="bullet"></div>
                                <a href="#">Edit</a>
                                <div class="bullet"></div>
                                <a href="#" class="text-danger">Trash</a>
                              </div>
                            </td>
                            <td>
                              <a href="#">{{ $post->title }}</a>
                            </td>
                            <td>{{ $post->category->name ?? 'Non définie' }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->views }}</td>
                            <td>
                              @if($post->status === 'published')
                                  <div class="badge badge-success"> <i class="fas fa-check-circle me-1"></i> {{ $post->status }}</div>
                              @else
                                  <div class="badge badge-warning"><i class="fas fa-clock me-1"></i> {{ $post->status }}</div>
                              @endif
                          </td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                              <form action="{{ route('admin.delete', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                            </div>
                          </td>
                          </tr>
                            
                          @endforeach
                      @else
                          <tr>
                            <div class="alert alert-warning">
                                <p>Post not Found!</p>
                            </div>
                          </tr>
                          
                      @endif
                    </tr>
                  </table>
                </div>
                <div class="float-right">
                  <nav>
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
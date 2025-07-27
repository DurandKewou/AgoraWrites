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
        <div class="row">
          <div class="">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Task Details</h4>
                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"></i> Add</button>
              </div>
              <div class="card-body">
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
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Permission</th>
                      <th>Status</th>
                    </tr>
                    <tr>
                      @if (count($users) > 0)
                          @foreach ($users as $user)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->surname }}</td>
                                  <td>{{ $user->email }}</td>
                                  {{-- Affichage des rôles --}}
                                  <td>
                                      @if($user->roles->isNotEmpty())
                                          {{ $user->getRoleNames()->join(', ') }}
                                      @else
                                          <span class="text-muted">Aucun rôle</span>
                                      @endif
                                  </td>

                                  {{-- Affichage des permissions --}}
                                  <td>
                                      @if($user->permissions->isNotEmpty())
                                          {{ $user->getPermissionNames()->join(', ') }}
                                      @else
                                          <span class="text-muted">Aucune permission</span>
                                      @endif
                                  </td>

                                  <td id="outer" class="d-flex justify-content-center align-items-center">

                                    <a href="{{ route('admin.profileUser', $user->id) }}" class="inner m-2 btn btn-sm btn-success">View</a>
                                    <button type="submit" class="inner m-2 btn btn-sm btn-warning" data-toggle="modal" data-target="#changeRoleModal">
                                      <i class="fas fa-edit"></i></button>
                                    <form method="post" action="{{ route('admin.deleteUser', $user->id) }}" class="inner">

                                      @method('DELETE')
                                      @csrf
                                      <input type="hidden" name="todo_id" value="{{ $user->id }}">
                                      <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                  </td>
                                  
                              </tr>
                            </tr>
                          @endforeach
                      @else
                          <tr>
                              <div class="alert alert-warning">
                                <p>User not Found!</p>
                              </div>
                          </tr>
                      @endif
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <!-- Modal pour modifier le rôle -->
  <div class="modal fade" id="changeRoleModal" tabindex="1" role="dialog" aria-labelledby="changeRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="changeRoleModalLabel">Modifier le rôle de {{ $user->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="role">Rôle</label>
              <select class="form-control" name="role" required>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Author" {{ $user->role == 'Author' ? 'selected' : '' }}>Auteur</option>
                <option value="Lecteur" {{ $user->role == 'Lecteur' ? 'selected' : '' }}>Lecteur</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
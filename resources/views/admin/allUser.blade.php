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

                                    <a href=""  class="inner m-2 btn btn-sm btn-success" >View</a>
                                    <a class="inner m-2 btn btn-sm btn-info" href="">Edit</a>
                                    <form method="post" action="" class="inner">

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
                              <td colspan="6">User not Found!</td>
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

    <!-- Modal with form -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Add  new User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('userRegister')}}" method="post"  class="needs-validation" novalidate="">
                  @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">First Name</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="surname">Last Name</label>
                      <input id="surname" type="text" class="form-control" name="surname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <input id="password" type="hidden" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" value="00000000">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <input id="password_confirmation" type="hidden" class="form-control" name="password_confirmation" value="00000000">
                    </div>
                    <div class="form-group col-6">
                      <label for="role" class="d-block">Role</label>
                      <select class="form-control" name="role" id="role" required>
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{ucfirst($role->name)}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
        </div>
      </div>
    </div>
  </div

@endsection
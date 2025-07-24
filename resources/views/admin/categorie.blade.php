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
          <div class="m-5">
            <div class="card m-5">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Categorie Details</h4>
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
                      <th>Description</th>
                      <th>Status</th>
                    </tr>
                    <tr>
                      @if (count($categories) > 0)
                          @foreach ($categories as $categorie)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $categorie->name }}</td>
                                  <td>{{ $categorie->description }}</td>

                                  <td id="outer" class="d-flex justify-content-center align-items-center">

                                    <a href=""  class="inner m-2 btn btn-sm btn-success" >View</a>
                                    <a class="inner m-2 btn btn-sm btn-info" href="">Edit</a>
                                    <form method="post" action="" class="inner">

                                      @method('DELETE')
                                      @csrf
                                      <input type="hidden" name="todo_id" value="{{ $categorie->id }}">
                                      <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                  </td>
                                  
                              </tr>
                            </tr>
                          @endforeach
                      @else
                          <tr>
                            <div class="alert alert-warning">
                                <p>Categorie not Found!</p>
                              </div>
                              <td colspan="6"></td>
                          </tr>
                          
                      @endif

                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
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
          <h5 class="modal-title" id="formModal">Add  new categorie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.createCategorie')}}"  method="POST">
            @csrf
            <div class="form-group">
              <label>Title</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" id="title" placeholder="Title" name="name">
              </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
              <label>Description</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Description"  name="description">
              </div>
            </div>
            <button type="submit"  class="btn btn-success mt-15 waves-effect" >Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
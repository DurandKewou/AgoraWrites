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
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                            id="checkbox-2">
                          <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle" width="35"
                            data-toggle="title" title="">
                          <span class="d-inline-block ml-1">Cara Stevens</span>
                        </a>
                      </td>
                      <td>Post Title 1
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Science</a>
                      </td>
                      <td>10-02-2019</td>
                      <td>3,587</td>
                      <td>
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                            id="checkbox-3">
                          <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35"
                            data-toggle="title" title="">
                          <span class="d-inline-block ml-1">Sarah Smith</span>
                        </a>
                      </td>
                      <td>Post Title 2
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Software Developer</a>
                      </td>
                      <td>10-05-2018</td>
                      <td>4,785</td>
                      <td>
                        <div class="badge badge-primary">Published</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                            id="checkbox-4">
                          <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle" width="35"
                            data-toggle="title" title="">
                          <span class="d-inline-block ml-1">Rizal Fakhri</span>
                        </a>
                      </td>
                      <td>Post Title 3
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Web Developer</a>
                      </td>
                      <td>25-06-2018</td>
                      <td>1,458</td>
                      <td>
                        <div class="badge badge-primary">Published</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                            id="checkbox-5">
                          <label for="checkbox-5" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle" width="35"
                            data-toggle="title" title="">
                          <span class="d-inline-block ml-1">Hasan Basri</span>
                        </a>
                      </td>
                      <td>Post Title 4
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Social Service</a>
                      </td>
                      <td>11-02-2017</td>
                      <td>5,250</td>
                      <td>
                        <div class="badge badge-danger">Draft</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                            id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle" width="35"
                            data-toggle="title" title="">
                          <span class="d-inline-block ml-1">Hasan Basri</span>
                        </a>
                      </td>
                      <td>Post Title 5
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Politics</a>
                      </td>
                      <td>25-05-2018</td>
                      <td>952</td>
                      <td>
                        <div class="badge badge-warning">Pending</div>
                      </td>
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
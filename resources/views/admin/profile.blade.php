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
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
              <div class="card-body">
                <div class="author-box-center">
                  <img alt="image" src="{{asset(('assets/img/users/user-1.png'))}}" class="rounded-circle author-box-picture">
                  <div class="clearfix"></div>
                  <div class="author-box-name">
                    <a href="#">{{ Auth::user()->name }}</a>
                  </div>
                  <div class="author-box-job">Web Developer</div>
                </div>
                <div class="text-center">
                  <div class="author-box-description">
                    <p>
                      {!!AUth::user()->role ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'!!}
                    </p>
                  </div>
                  <div class="mb-2 mt-3">
                    <div class="text-small font-weight-bold">Follow {{ Auth::user()->name }} On</div>
                  </div>
                  <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-github">
                    <i class="fab fa-github"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <div class="w-100 d-sm-none"></div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Personal Details</h4>
              </div>
              <div class="card-body">
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      Birthday
                    </span>
                    <span class="float-right text-muted">
                      {{ Auth::user()->birthdate ?? '30-05-1998' }} <!-- Assuming birthdate is stored in the user model -->
                      <!-- If not, you can replace it with a default value -->
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Phone
                    </span>
                    <span class="float-right text-muted">
                      {{ Auth::user()->phone ?? '(0237) 693456789' }} <!-- Assuming phone is stored in the user model -->
                      <!-- If not, you can replace it with a default value -->
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Mail
                    </span>
                    <span class="float-right text-muted">
                      {{ Auth::user()->email }}
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Facebook
                    </span>
                    <span class="float-right text-muted">
                      <a href="#">John Deo</a>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Twitter
                    </span>
                    <span class="float-right text-muted">
                      <a href="#">@johndeo</a>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Skills</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title">Java</div>
                    </div>
                    <div class="media-progressbar p-t-10">
                      <div class="progress" data-height="6">
                        <div class="progress-bar bg-primary" data-width="70%"></div>
                      </div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title">Web Design</div>
                    </div>
                    <div class="media-progressbar p-t-10">
                      <div class="progress" data-height="6">
                        <div class="progress-bar bg-warning" data-width="80%"></div>
                      </div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title">Photoshop</div>
                    </div>
                    <div class="media-progressbar p-t-10">
                      <div class="progress" data-height="6">
                        <div class="progress-bar bg-green" data-width="48%"></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
              <div class="padding-20">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                      aria-selected="true">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                      aria-selected="false">Setting</a>
                  </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
                      <div class="col-md-3 col-6 b-r">
                        <strong>Full Name</strong>
                        <br>
                        <p class="text-muted">{{ Auth::user()->name }}</p>
                      </div>
                      <div class="col-md-3 col-6 b-r">
                        <strong>Mobile</strong>
                        <br>
                        <p class="text-muted">
                          {{ Auth::user()->phone ?? '(237) 6 9647 7890' }} <!-- Assuming phone is stored in the user model -->
                          <!-- If not, you can replace it with a default value --></p>
                      </div>
                      <div class="col-md-3 col-6 b-r">
                        <strong>Email</strong>
                        <br>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Location</strong>
                        <br>
                        <p class="text-muted">
                             {{ Auth::user()->city ?? 'Adresse non définie' }}
                              {{ Auth::user()->country }}
                              {{ Auth::user()->postal_code  }}
                              {{ Auth::user()->address  }}
                          
                        </p>
                      </div>
                    </div>
                    <p class="m-t-30">Completed my graduation in Arts from the well known and
                      renowned institution
                      of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
                      affiliated
                      to M.S. University. I ranker in University exams from the same
                      university
                      from 1996-01.</p>
                    <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                      Gujarat
                      from 2003-2015 </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                      industry. Lorem
                      Ipsum has been the industry's standard dummy text ever since the 1500s,
                      when
                      an unknown printer took a galley of type and scrambled it to make a
                      type
                      specimen book. It has survived not only five centuries, but also the
                      leap
                      into electronic typesetting, remaining essentially unchanged.</p>
                    <div class="section-title">Education</div>
                    <ul>
                      <li>B.A.,Gujarat University, Ahmedabad,India.</li>
                      <li>M.A.,Gujarat University, Ahmedabad, India.</li>
                      <li>P.H.D., Shaurashtra University, Rajkot</li>
                    </ul>
                    <div class="section-title">Experience</div>
                    <ul>
                      <li>One year experience as Jr. Professor from April-2009 to march-2010
                        at B.
                        J. Arts College, Ahmedabad.</li>
                      <li>Three year experience as Jr. Professor at V.S. Arts &amp; Commerse
                        Collage
                        from April - 2008 to April - 2011.</li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                      </li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                      </li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                      </li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    <form action="{{ route('admin.updateProfile') }}" method="post" class="needs-validation">
                      @csrf
                      @method('PUT')

                      <div class="card-header">
                        <h4>Edit Profile</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" name="surname" class="form-control" value="{{ Auth::user()->surname }}">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-md-12">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Ex: +237612345678"
                                  value="{{ old('phone', Auth::user()->phone) }}">
                            <div class="invalid-feedback">
                                Please fill in the phone number
                            </div>
                        </div>

                        </div>

                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Birthdate</label>
                            <input type="date" name="birthdate" class="form-control" value="{{ Auth::user()->birthdate }}" placeholder="Birthdate">
                            <div class="invalid-feedback">
                              Please fill in the Birthdate
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}" placeholder="City">
                            <div class="invalid-feedback">
                              Please fill in the City
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Country</label>
                            <input type="text" name="country"  class="form-control" value="{{ Auth::user()->country}}"placeholder="Country">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" value="{{ Auth::user()->postal_code }}" placeholder="Postal Code">
                            <div class="invalid-feedback">
                              Please fill in the Postal Code
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" placeholder="Address">
                            <div class="invalid-feedback">
                              Please fill in the Address
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio(Role)</label>
                            <textarea
                              class="form-control summernote-simple" name="role">{{ old('role', Auth::user()->role) }}</textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
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
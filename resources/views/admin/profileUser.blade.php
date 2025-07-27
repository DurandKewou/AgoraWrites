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
                    <img alt="image" src="{{ asset('assets/img/users/user-1.png') }}" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <div class="author-box-name">
                    <a href="#">{{ $user->name }}</a>
                    </div>
                    <div class="author-box-job">{{ $user->roles->first()->name ?? 'No Role' }}</div>
                </div>
                <div class="text-center">
                    <div class="author-box-description">
                    <p>{!! $user->role ?? 'Pas de bio.' !!}</p>
                    </div>
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h4>Personal Details</h4></div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                        <span class="float-left">Birthday</span>
                        <span class="float-right text-muted">{{ $user->birthdate ?? '-' }}</span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">Phone</span>
                        <span class="float-right text-muted">{{ $user->phone ?? '-' }}</span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">Email</span>
                        <span class="float-right text-muted">{{ $user->email }}</span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">City</span>
                        <span class="float-right text-muted">{{ $user->city ?? '-' }}</span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">Country</span>
                        <span class="float-right text-muted">{{ $user->country ?? '-' }}</span>
                        </p>
                    </div>
                </div>
            </div>
            </div>

            <!-- Right side: user details -->
            <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                <div class="card-header"><h4>Détails de l'utilisateur</h4></div>
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Prénom</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Nom</label>
                        <input type="text" class="form-control" value="{{ $user->surname }}" disabled>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Téléphone</label>
                        <input type="text" class="form-control" value="{{ $user->phone }}" disabled>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Date de naissance</label>
                        <input type="date" class="form-control" value="{{ $user->birthdate }}" disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Code postal</label>
                        <input type="text" class="form-control" value="{{ $user->postal_code }}" disabled>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Ville</label>
                        <input type="text" class="form-control" value="{{ $user->city }}" disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Pays</label>
                        <input type="text" class="form-control" value="{{ $user->country }}" disabled>
                    </div>
                    </div>

                    <div class="form-group">
                    <label>Adresse</label>
                    <input type="text" class="form-control" value="{{ $user->address }}" disabled>
                    </div>

                    <div class="form-group">
                    <label>Rôle</label>
                    <input type="text" class="form-control" value="{{ $user->roles->first()->name ?? 'N/A' }}" disabled>
                    </div>

                    <div class="form-group">
                    <label>Bio</label>
                    <textarea class="form-control summernote-simple" disabled>{!!$user->role ?? 'Aucune bio fournie.'!!}</textarea>
                    </div>
                </div>
                </div>
            </div>
            </div> <!-- end right col -->
        </div>
        </div>
    </section>
    </div>

@endsection
@extends('layouts/author')
@section('space-work')
    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Write Your Post</h4>
                </div>
                <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                    <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                    <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric">
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->name}}">{{ucfirst($categorie->name)}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                    <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control inputtags">
                        <small class="form-text text-muted">Séparez les tags par une virgule (ex: "SEO, Marketing, Rédaction").</small>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric">
                        <option>Publish</option>
                        <option>Draft</option>
                        <option>Pending</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Create Post</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Select Layout</h6>
            <div class="selectgroup layout-color w-50">
                <label class="selectgroup-item">
                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                <span class="selectgroup-button">Light</span>
                </label>
                <label class="selectgroup-item">
                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                <span class="selectgroup-button">Dark</span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Sidebar Color</h6>
            <div class="selectgroup selectgroup-pills sidebar-color">
                <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                </label>
                <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Color Theme</h6>
            <div class="theme-setting-options">
                <ul class="choose-theme list-unstyled mb-0">
                <li title="white" class="active">
                    <div class="white"></div>
                </li>
                <li title="cyan">
                    <div class="cyan"></div>
                </li>
                <li title="black">
                    <div class="black"></div>
                </li>
                <li title="purple">
                    <div class="purple"></div>
                </li>
                <li title="orange">
                    <div class="orange"></div>
                </li>
                <li title="green">
                    <div class="green"></div>
                </li>
                <li title="red">
                    <div class="red"></div>
                </li>
                </ul>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <div class="theme-setting-options">
                <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                    id="mini_sidebar_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Mini Sidebar</span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <div class="theme-setting-options">
                <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                    id="sticky_header_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Sticky Header</span>
                </label>
            </div>
            </div>
            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                <i class="fas fa-undo"></i> Restore Default
            </a>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
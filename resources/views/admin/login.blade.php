@extends('../layout.app')
@section('title')
    Log In | CK Travel and Tours
@endsection
@section('links')
    @include('../includes/css_dependencies')
    @include('../includes/adminLTE_css_dependecies')
    @include('../includes/google_fonts')
    <link href={{ asset("css/login/style.css") }} rel="stylesheet" />
@endsection
@section('content')
 <div class="container-fluid">
    <div class="row">
        <div class="col-4 h-100 login_left_div">
            <div class="row p-0 m-0">
                <div class="col-12 p-3 m-0">
                    <img src="{{ asset("assets/cktravel_logo.png") }}" class="w-25 h-auto" alt="CK Logo">
                </div>
                <div class="col-12 login_text_left">
                    <h2 class="text-center text-white">CK TRAVEL & TOURS</h2>
                    <p class="fs-6 fw-normal text-white text-center">Find Your Best Holiday</p>
                </div>
            </div>
        </div>
        <div class="col-8 p-5 bg-white h-100">
            <form class="row">
                <div class="col-12">
                    <h5 class="text-dark">LOGIN IN TO CK TRAVEL ADMIN DASHBOARD</h5>
                    <p class="fs-7 fw-normal text-dark">Enter your details below</p>
                </div>
                <div class="col-12">
                    <div class="form-group pl-3 pr-3">
                        <label for="exampleInputEmail1">Username or Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter username or email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group p pl-3 pr-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="col-12">  
                    <button type="button" class="btn btn-primary justify-content-center ml-5 btn-lg w-75 rounded-pill">Login</button>
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection
@section('scripts')
    @include('../includes/script_dependencies')
    @include('../includes/adminLTE_script_dependencies')
@endsection
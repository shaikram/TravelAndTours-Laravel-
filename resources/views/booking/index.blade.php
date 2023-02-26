@extends('../layout.app')
@section('title')
    Booking Form | CK Travel and Tours
@endsection
@section('links')
    @include('../includes/adminLTE_css_dependecies')
    <link href={{ asset("./css/booking/style.css") }} rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">   
    <div class="row justify-content-center">
        <div class="col-10 bg-white border border-top-0 border-bottom-0">
            <div class="row pt-5 pb-5">
                <div class="col-12 pt-5">
                    <h1>Booking Form</h1>
                    <div class="bg-primary p-1 w-100"></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label p-3">Destination</label>
                            <div id="emailHelp" class="form-tex ml-5 pb-1">Name of Destination</div>
                            <div class="w-75 h-auto border border-info p-0 ml-5 overflow-hidden">
                                <img src="https://via.placeholder.com/275x250" alt="Destination">
                            </div>
                        </div>
                        <div class="col-8 pt-5 pr-5">
                            <p class="fs-5 fw-normal lh-base text-secondary mt-5 pr-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label p-3">Packages</label>
                            <div class="form-check ml-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  5d2n
                                </label>
                            </div>
                            <div class="form-check ml-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  4d2n
                                </label>
                            </div>
                            <div class="form-check ml-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  3d2n
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label p-3">Choose Pax</label>
                                <select class="form-control select2" style="width: 50%;">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-6 p-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" disabled>
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12 p-5">  
                            <button type="button" class="btn btn-primary align-self-center btn-lg w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('scripts')
    @include('../includes/adminLTE_script_dependencies')
@endsection
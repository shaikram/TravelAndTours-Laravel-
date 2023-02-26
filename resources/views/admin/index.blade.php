@extends('../layout.admin')
@section('title')
    Admin | CK Travel and Tours
@endsection
@section('links')
    @include('../includes/css_dependencies')
    @include('../includes/adminLTE_css_dependecies')
    @include('../includes/google_fonts')
@endsection
@section('content')
    <div class="wrapper">
        @include('../admin_includes/preloader')
        @include('../admin_includes/navbar')
        @include('../admin_includes/sidebar')
        @include('../admin_includes/content_wrapper')
        @include('../admin_includes/footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- ./wrapper -->
    </div>
@endsection
@section('scripts')
    @include('../includes/script_dependencies')
    @include('../includes/adminLTE_script_dependencies')
@endsection
@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les mentions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">mentions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add mentions
                                <a href="{{ route('mentions.index') }}" class="btn btn-success float-right btn-sm">
                                    <i class="fa fa-list"> Listes des mentions</i>
                                </a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('mentions.store') }}" method="POST" id="myForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            class="@error('name') is-invalid @enderror">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6" style="padding-top: 32px">
                                        <input type="submit" class="btn btn-success">
                                        {{-- <button type="submit" class="btn btn-primary ml-3">Submit</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
    $('#myForm').validate({
        rules:{
            name:{
                required:true,
                minlength: 5,
            },
        },
        messages:{
           
        },
        errorElement:'span',
        errorPlacement: function(error,element){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element,errorClass,validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element,errorClass,validClass) {
            $(element).removeClass('is-invalid');
        }
    });
 });
</script>
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>

@endsection
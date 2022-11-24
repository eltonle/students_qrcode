@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les sections</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">sections</li>
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
                            <h4>Add sections
                                <a href="{{ route('sections.index') }}" class="btn btn-success float-right btn-sm">
                                    <i class="fa fa-list"> Listes des sections</i>
                                </a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('sections.store') }}" method="POST" id="myForm">
                                @csrf
                                <div class="form-row">
                                    {{-- <div class="form-group col-md-6 pb-2">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            class="@error('name') is-invalid @enderror">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <!-- Date -->
                                    {{-- <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- Date range -->
                                    <div class="form-group col-md-6 pb-2">
                                        <label>Section formation</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="name" class="form-control float-right"
                                                id="reservation" data-date-end-date="d">
                                        </div>
                                        <!-- /.input group -->
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
                minlength: 05,
            }
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


<script type="text/javascript">
    $(function () {

    // Date range picker
    $('#reservation').daterangepicker({
        locale: {
                format: 'D MMM, YYYY',
                separator: " au "
            },
      })
    }
)

</script>
@endsection
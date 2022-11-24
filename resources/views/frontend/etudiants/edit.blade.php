@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Etudiants</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">etudiants</li>
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
                            <h4>Edit etudiants
                                <a href="{{ route('etudiants.index') }}" class="btn btn-success float-right btn-sm">
                                    <i class="fa fa-list"> Listes des etudiants</i>
                                </a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('etudiants.update', $edit_students->id) }}" method="POST"
                                id="myForm">
                                @csrf
                                <div class="form-row">
                                    {{-- nom --}}
                                    <div class="form-group col-md-6">
                                        <label for="name">Nom</label>
                                        <input type="text" name="name" class="form-control"
                                            class="@error('name') is-invalid @enderror"
                                            value="{{ $edit_students->name }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- prenom --}}
                                    <div class="form-group col-md-6">
                                        <label for="prenom">Prenom</label>
                                        <input type="text" name="prenom" class="form-control"
                                            class="@error('prenom') is-invalid @enderror"
                                            value="{{ $edit_students->prenom }}">
                                        @error('prenom')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- email --}}
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            class="@error('email') is-invalid @enderror"
                                            value="{{ $edit_students->email }}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- phone --}}
                                    <div class="form-group col-md-6">
                                        <label for="phone">Telephone</label>
                                        <input type="text" name="phone" class="form-control"
                                            class="@error('phone') is-invalid @enderror"
                                            value="{{ $edit_students->phone }}">
                                        {{-- @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}
                                    </div>

                                    {{-- formation --}}
                                    <div class="form-group col-md-6">
                                        <label for="formation">Formation</label>
                                        <select name="formation_id" id="formation" class="form-control">
                                            @foreach ($formations as $formation)
                                            <option value="{{ $formation->id }}" {{ ($edit_students->formation_id ==
                                                $formation->id) ? 'selected' : '' }}>{{ $formation->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="phone" class="form-control"
                                            class="@error('phone') is-invalid @enderror"> --}}
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- section --}}
                                    <div class="form-group col-md-6">
                                        <label for="section">Section</label>
                                        <select name="section_id" id="section" class="form-control">
                                            @foreach ($sessions as $section)
                                            <option value="{{ $section->id }}" {{ ($edit_students->section_id ==
                                                $section->id) ? 'selected' : '' }}>{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="phone" class="form-control"
                                            class="@error('phone') is-invalid @enderror"> --}}
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- mention --}}
                                    <div class="form-group col-md-6">
                                        <label for="mention">Mention</label>
                                        <select name="mention_id" id="mention" class="form-control">
                                            @foreach ($mentions as $mention)
                                            <option value="{{ $mention->id }}" {{ ($edit_students->mention_id ==
                                                $mention->id) ? 'selected' : '' }}>{{ $mention->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="phone" class="form-control"
                                            class="@error('phone') is-invalid @enderror"> --}}
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- button soumettre --}}
                                    <div class="form-group col-md-6" style="padding-top: 32px">
                                        <input type="submit" class="btn btn-success" value="Soumettre les informations">
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
            prenom:{
                required:true,
                minlength: 4,
            },
            email:{
                required:true,
                email: true,
            },
            phone:{
                required:true,
                // phone: true,    A CHERCHER
            },
            formation_id:{
                required:true,
            },
            section_id:{
                required:true,
            },
            mention_id:{
                required:true,
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

@endsection
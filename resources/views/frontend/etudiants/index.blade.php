@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les Etudiants</h1>
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
                            <h3>Listes etudiants
                                <a href="{{ route('etudiants.create') }}" class="btn btn-success float-right btn-sm">
                                    <i class="fa fa-plus-circle"> Add new</i>
                                </a>
                            </h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Phone</th>
                                        <th>Formations </th>
                                        <th>Session </th>
                                        <th>Mention </th>
                                        <th>QrCode</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_students as $student)
                                    <tr>
                                        <td><span class="text-indigo">{{ $student->name }}</span></td>
                                        <td>{{ $student->prenom }}</td>
                                        {{-- <td>{{ $student->email }}</td> --}}
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->formation->name }}</td>
                                        <td>{{ $student->section->name }}</td>
                                        <td>{{ $student->mention->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$student->qr_code) }}" alt="" width="50px">
                                            <a href="{{ route('download', $student->id) }}"><i
                                                    class="fa fa-download"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div style="display: flex;">
                                                <a href="{{ route('etudiants.edit',$student->id) }}" title="edit"
                                                    class="btn mr-1 btn-xs btn-dark">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('etudiants.delete', $student->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'
                                                        style="border-radius:5px;"><i class="fa fa-trash"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Phone</th>
                                        <th>Formations </th>
                                        <th>Session </th>
                                        <th>Mention </th>
                                        <th>QrCode</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
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
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print", "colvis"] //copy,csv
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
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

{{-- sweetalert --}}
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
             title: `Voulez vous vraiment supprimer la formation?`,
             text: "Si vous supprimez ceci, il disparaîtra pour toujours.",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }
         });
     });
 
</script>
@endsection
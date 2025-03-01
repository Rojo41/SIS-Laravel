@extends('layouts.mainlayout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 pr-3 d-flex justify-content-between align-items-center">
                    <h3 class="welcome-text text-dark font-weight-bold m-0">Student table</span></h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#triggerModal"
                        data-id="" data-name="" data-email="" data-action="{{ route('students.store') }}" data-method="POST" data-mode="add">Add student</button>
                </div>
                <div style="height: calc(100vh - 210px); width: 100%; overflow-y: scroll; position:relative">
                    <table class="table table-hover position-relative ">
                        <colgroup>
                            <col width="10%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="14%">
                            <col width="15%">
                        </colgroup>
                        <thead style="position: sticky; top: 0;" class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Course</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentList as $students)
                            <tr style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#triggerModalStudentInformation" data-id="{{$students->id}}" data-name="{{$students->name}}" data-email="{{$students->email}}" data-course="{{$students->course}}" id="propagation">
                                <td>{{ $students->id }}</td>
                                <td>{{ $students->name }}</td>
                                <td>{{ $students->email }}</td>
                                <td>{{ $students->address }}</td>
                                <td>{{ $students->course }}</td>
                                <td class="gap-2 d-flex justify-content-start align-items-center ">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#triggerModal" data-id="{{ $students->id }}"
                                        data-name="{{ $students->name }}" data-email="{{ $students->email }}" data-address="{{ $students->address }}" data-course="{{ $students->course }}" data-mode="edit" data-action="{{ route('students.update', $students->id) }}" data-method="PUT" style="font-size: 1.5rem; color: green;">
                                        <span class="mdi mdi-square-edit-outline"></span>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#triggerModalInformation" data-id="{{ $students->id }}" style=" font-size: 1.5rem; color: blue;">

                                        <span class="mdi mdi-file-edit-outline"></span>
                                    </a>
                                    <a href="#" id="delete" data-bs-toggle="modal" class="exclude-modal" onclick="deleteStudent('{{ $students->id }}')" style="font-size: 1.5rem; color: red">
                                        <span class="mdi mdi-trash-can-outline"></span>
                                    </a>

                                    <form action="{{route('students.destroy', $students->id)}}" id="IdToDelete-{{$students->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(\Session::has('success'))
<script>
    Swal.fire({
        title: "Success",
        text: "{{\Session::get('success')}}",
        icon: "success",

    });
</script>
@endif
@if ($errors->any())
<script>
    Swal.fire({
        title: "Validation Error",
        html: "{!! implode('<br>', $errors->all()) !!}",
        icon: "error",
        confirmButtonText: "OK"
    });
</script>
@endif

<script>
    function deleteStudent(id) {

        Swal.fire({
            title: "Delete",
            text: "Are you sure you want to delete this student?",
            icon: "warning",
            showCancelButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById("IdToDelete-" + id)
                console.log(form.action);
                form.submit();
            }
        });

    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="assets/js/studentModalHandler.js"></script>
<script src="assets/js/enrollmentModalHandler.js"></script>
<script src="assets/js/studentInfoModalHandler.js"></script>
@include('modals.studentModal')
@include('modals.enrollmentModal')
@include('modals.studentInfoModal')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@extends('layouts.mainlayout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 pr-3 d-flex justify-content-between align-items-center">
                    <h3 class="welcome-text text-dark font-weight-bold m-0">Subject table</span></h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#triggerModalSubject"
                        data-id="" data-name="" data-code="" data-units="" data-action="{{ route('subjects.store') }}" data-method="POST" data-mode="add">Add Subject</button>
                </div>
                <div style="height: calc(100vh - 210px); width: 100%; overflow-y: scroll; position:relative">
                    <table class="table table-hover position-relative ">
                        <colgroup>
                            <col width="10%">
                            <col width="20%">
                            <col width="23%">
                            <col width="23%">
                            <col width="10%">
                        </colgroup>
                        <thead style="position: sticky; top: 0;" class="table-primary">
                            <tr>

                                <th scope="col">ID</th>
                                <th scope="col">Subject code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Units</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjectList as $subjects)
                            <tr style="cursor: pointer;">
                                <td scope="row">{{ $subjects->id }}</td>
                                <td>{{ $subjects->code }}</td>
                                <td>{{ $subjects->name }}</td>
                                <td>{{ $subjects->units }}</td>
                                <td class="gap-2 d-flex justify-content-start align-items-center ">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#triggerModalSubject" data-id="{{ $subjects->id }}"
                                        data-name="{{ $subjects->name }}" data-code="{{ $subjects->code }}" data-units="{{ $subjects->units }}" data-mode="edit" data-action="{{ route('subjects.update', $subjects->id) }}" data-method="PUT" style="font-size: 1.5rem; color: green;">
                                        <span class="mdi mdi-square-edit-outline"></span>
                                    </a>
                                    <a href="#" onclick="deleteStudent('{{ $subjects->id }}')" style="font-size: 1.5rem; color: red;">
                                        <span class="mdi mdi-trash-can-outline"></span>
                                    </a>

                                    <form action="{{route('subjects.destroy', $subjects->id)}}" id="IdToDelete-{{$subjects->id}}" method="POST">
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
            text: "Are you sure you want to delete this subject?",
            icon: "warning",
            showCancelButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById("IdToDelete-" + id)
                form.submit();
            }
        });

    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/subjectModalHandler.js"></script>
@include('modals.subjectModal')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
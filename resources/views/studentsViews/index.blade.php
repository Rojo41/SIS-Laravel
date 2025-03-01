@extends('layouts.studentlayout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 pr-3 d-flex justify-content-between align-items-center">
                    <h3 class="welcome-text text-dark font-weight-bold m-0">Grades Table</h3>
                </div>
                <div style="height: calc(100vh - 210px); width: 100%; overflow-y: scroll; position:relative">
                    <table class="table table-hover position-relative ">
                        <colgroup>
                            <col width="15%">
                            <col width="25%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>
                        <thead style="position: sticky; top: 0;" class="table-primary">
                            <tr>
                                <th scope="col">Subject Code</th>
                                <th scope="col">Subject Description</th>
                                <th scope="col">Units</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->subject->code }}</td>
                                <td>{{ $enrollment->subject->name }}</td>
                                <td>{{ $enrollment->subject->units }}</td>
                                <td class="fw-bold">{{ $enrollment->grade->grade ?? '' }}</td>
                                <td class="{{ $enrollment->grade->status == 'Passed' ? 'text-success' : 'text-danger' }} fw-bold">
                                    {{ $enrollment->grade->status ?? 'INC' }}
                                </td>

                            </tr>
                            @endforeach
                            @if ($enrollments->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No grades available.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
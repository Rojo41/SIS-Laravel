@extends('layouts.studentlayout')
@section('title','Student Dashboard')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 pr-3 d-flex justify-content-between align-items-center">
                    <h3 class="welcome-text text-dark font-weight-bold m-0">Grades Table</h3>
                </div>
                <div style="height: calc(100vh - 230px); width: 100%; overflow-y: scroll; position:relative">
                    <table class="table table-hover position-relative">
                        <colgroup>
                            <col width="15%">
                            <col width="20%">
                            <col width="20%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>
                        <thead style="position: sticky; top: 0;" class="table-primary">
                            <tr>
                                <th scope="col">Subject Code</th>
                                <th scope="col">Subject Description</th>
                                <th scope="col">Instructor</th>
                                <th scope="col">Units</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalWeightedGrade = 0;
                            $totalUnits = 0;
                            @endphp

                            @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->subject->code }}</td>
                                <td>{{ $enrollment->subject->name }}</td>
                                <td>{{ $enrollment->instructor }}</td>
                                <td>{{ $enrollment->subject->units }}</td>
                                <td class="fw-bold">
                                    {{ $enrollment->grade->grade ?? '' }}
                                    @php
                                    if (!empty($enrollment->grade->grade) && !empty($enrollment->subject->units)) {
                                    $totalWeightedGrade += $enrollment->grade->grade * $enrollment->subject->units;
                                    $totalUnits += $enrollment->subject->units;
                                    }
                                    @endphp
                                </td>
                                <td class="{{ optional($enrollment->grade)->status == 'Passed' ? 'text-success' : 'text-danger' }} fw-bold">
                                    {{ optional($enrollment->grade)->status ?? 'INC' }}
                                </td>
                            </tr>
                            @endforeach

                            @if ($enrollments->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">No grades available.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
                @if ($totalUnits > 0)
                <div class="mt-3">
                    <h4 class="text-dark font-weight-bold">General Weighted Average (GWA):
                        <span class="text-primary">{{ number_format($totalWeightedGrade / $totalUnits, 2) }}</span>
                    </h4>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
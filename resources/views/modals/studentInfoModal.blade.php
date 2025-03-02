<div class="modal fade" id="triggerModalStudentInformation" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-5" id="modalTitle">Student Enrollment Information</h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="informationCOntainer" class="d-flex gap-5 p-1 mb-2 justify-content-between" style="border-bottom: 2px solid gray;">
                    <div>
                        <p style="font-size:16px; font-weight:bold">ID: <span id="student_id" style="font-weight:normal;margin-left:5px"></span></p>
                        <p style="font-size:16px; font-weight:bold">Name: <span id="student_name" style="font-weight:normal;margin-left:5px"> </span></p>
                    </div>
                    <div>
                        <p style="font-size:16px; font-weight:bold">Email: <span id="email" style="font-weight:normal;margin-left:5px"></span></p>
                        <p style="font-size:16px;  font-weight:bold">Course: <span id="student_address" style="font-weight:normal;margin-left:5px"> </span></p>
                    </div>
                    <div>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#triggerGradesModal" type="btn">View Grades</button>
                    </div>
                </div>
                <div style="max-height: 500px; overflow-y:scroll; scrollbar-width:none">

                    <table class="table">
                        <colGroup>
                            <col width="10%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="10%">
                        </colGroup>
                        <thead style="position: sticky; top: 0;" class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Subject code</th>
                                <th>Subject name</th>
                                <th>Units</th>
                                <th>Instructor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="enrollmentList">

                        </tbody>
                    </table>
                    <form action="" id="IdToDelete" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/gradesModalHandler.js"></script>
<script src="assets/js/editEnrollmentHandler.js"></script>



<script>
    function deleteSubject(id) {
        console.log(id);
        Swal.fire({
            title: "Delete",
            text: "Are you sure you want to remove this subject for this student?",
            icon: "warning",
            showCancelButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById("IdToDelete");
                form.action = `/student/enroll/${id}`
                console.log(form.action);
                form.submit();
            }
        });

    }
</script>
@include('modals.gradesModal')
@include('modals.editEnrollment')
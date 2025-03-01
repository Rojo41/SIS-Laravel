<div class="modal fade" id="triggerGradesModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Student Grades Information</h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="max-height: 500px; overflow-y:scroll; scrollbar-width:none">
                    <table class="table">
                        <colGroup>
                            <col width="10%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="10%">
                        </colGroup>
                        <thead style="position: sticky; top: 0;" class="table-primary">
                            <tr>
                                <th>Subject code</th>
                                <th>Subject name</th>
                                <th>Grades</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="gradeList">

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
<script src="assets/js/stackModalHandler.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('modals.addGradeModal')
<script>
    $(document).ready(function() {
        $(document).on('click', '#addGradeButton', function() {
            var studentId = $("#student_id").text();
            var row = $(this).closest("tr");
            var grade = row.find(".subjectGrade").text();
            var enrollmentId = row.find(".enrollmentId").text();
            var subjectCode = row.find(".subjectCode").text();
            console.log("ahsdjkfhajksdf: ", enrollmentId);
            var actionUrl = "/grade"
            if (grade !== '') {
                return;
            }
            console.log(studentId);
            $('#triggerGradesModal').css({
                'z-index': '1040',
                'display': 'block'
            });
            $("#gradeForm").attr("action", actionUrl);
            $('.modal-backdrop').css('z-index', '1039');
            $('#triggerAddGradeModal').css('z-index', '2050').modal('show');
            $('#studentIdGrade').val(studentId);
            $('#enrollment_id').val(enrollmentId);
            $("#sCode").prop("disabled", true);
            $("#studentIdGrade").prop("disabled", true);
            $('#sCode').val(subjectCode);
            $('#gradeModalTitle').text('Add Grade')
        });

        $(document).on('click', '#editGradeButton', function() {
            var studentId = $("#student_id").text();
            var row = $(this).closest("tr");
            var subjectCode = row.find(".subjectCode").text();
            var grade = row.find(".subjectGrade").text();

            if (grade === '') {
                return;
            }
            $('#triggerGradesModal').css({
                'z-index': '1040',
                'display': 'block'
            });
            $('.modal-backdrop').css('z-index', '1039');
            $('#triggerAddGradeModal').css('z-index', '2050').modal('show');
            $('#studentIdGrade').val(studentId);
            $("#studentIdGrade").prop("disabled", true);
            $('#sCode').val(subjectCode);
            $("#sCode").prop("disabled", true);
            $('#grade').val(grade);
            $('#gradeModalTitle').text('Update Grade')
        });

        $('#triggerAddGradeModal').on('hidden.bs.modal', function() {
            $('#triggerGradesModal').css('z-index', '1050');
            $('#studentIdGrade').val("");
            $('#sCode').val("");
            $('#grade').val('');
            $('#gradeModalTitle').text('')
        });
    });
</script>
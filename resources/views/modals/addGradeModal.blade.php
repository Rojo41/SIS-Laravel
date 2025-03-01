<div class="modal fade" id="triggerAddGradeModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" id="thisModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeModalTitle"></h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="gradeForm">
                    @csrf
                    <div class="form-floating mb-3" id="studentIdGroup">
                        <input class="form-control" name="studentId" id="studentIdGrade" placeholder="123">
                        <label for="studentId">Student ID</label>
                    </div>
                    <input hidden class="form-control" name="enrollment_id" id="enrollment_id" placeholder="123">
                    <input hidden class="form-control" name="grade_id" id="grade_id" placeholder="123">
                    <div class="form-floating mb-3" id="studentIdGroup">
                        <input type="num" class="form-control" name="subject_code" id="sCode" placeholder="123">
                        <label for="sCode">Subject code</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="grade" id="grade" placeholder="Enter Name">
                        <label for="grade">Grade</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton" style="width: 100%;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
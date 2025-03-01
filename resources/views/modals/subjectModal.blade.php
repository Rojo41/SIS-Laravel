<div class="modal fade" id="triggerModalSubject" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="" id="subjectForm">
                    @csrf
                    <div class="form-floating mb-3" id="subjectIdGroup">
                        <input type="num" class="form-control" name="id" id="subjectId" placeholder="123">
                        <label for="studentId">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="code" id="subjectCode" placeholder="Enter Name">
                        <label for="subjectCode">Subject Code</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="subjectName" placeholder="Enter Name">
                        <label for="subjectName">Subject Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="units" id="units" placeholder="Enter Name">
                        <label for="units">Units</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton" style="width: 100%;"></button>
                </form>
            </div>
        </div>
    </div>
</div>
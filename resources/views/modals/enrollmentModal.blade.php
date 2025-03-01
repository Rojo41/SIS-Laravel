<div class="modal fade" id="triggerModalInformation" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Enroll subjects</h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="enrollmentForm" method="POST" action="{{ route('enroll.store') }}">
                    @csrf
                    <input type="hidden" name="studentId" id="id">
                    <h6>Available Subjects:</h6>
                    <div id="subjectsList" style="max-height: 500px; overflow-y:scroll"></div>

                    <button type="submit" class="btn btn-success mt-3" style="width: 100%;">Enroll</button>
                </form>
            </div>
        </div>
    </div>
</div>
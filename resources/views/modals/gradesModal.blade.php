<div class="modal fade" id="triggerGradesModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-5" id="modalTitle">Student Grades Information</h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="informationCOntainer" class="d-flex p-1 mb-2 justify-content-start" style="border-bottom: 2px solid gray;">
                    <div style="flex:1;">
                        <p style="font-size:16px; font-weight:bold">ID: <span id="sID" style="font-weight:normal;margin-left:5px"></span></p>
                        <p style="font-size:16px; font-weight:bold">Name: <span id="sName" style="font-weight:normal;margin-left:5px"> </span></p>
                    </div>
                    <div style="flex:1;">
                        <p style="font-size:16px; font-weight:bold">Email: <span id="sEmail" style="font-weight:normal;margin-left:5px"></span></p>
                        <p style="font-size:16px;  font-weight:bold">Course: <span id="sAddress" style="font-weight:normal;margin-left:5px"> </span></p>
                    </div>
                </div>
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
                    <form action="" id="IdToDeleteGrade" method="POST">
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
<script src="assets/js/gradeRequestHandler.js"></script>
<script>
    function deleteGrade(id) {
        console.log(id)
        if (!id) {
            return;
        }
        Swal.fire({
            title: "Delete",
            text: "Are you sure you want to delete this grade?",
            icon: "warning",
            showCancelButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById("IdToDeleteGrade");
                form.action = `/grade/${id}`
                console.log(form.action);
                form.submit();
            }
        });
    }
</script>
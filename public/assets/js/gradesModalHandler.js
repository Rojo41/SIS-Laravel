$(document).ready(function () {
    $("#triggerGradesModal").on("show.bs.modal", function (event) {
        var studentId = $("#student_id").text();
        console.log(`Fetching grades for student ID: ${studentId}`);

        $.ajax({
            url: `/student/enroll/${studentId}`,
            type: "GET",
            success: function (data) {
                console.log(data);
                $("#gradeList").empty();

                if (data.length > 0) {
                    data.forEach(function (enrollment) {
                        var actionUrl = `student/enroll/${enrollment.id}`;
                        $("#IdToDelete").attr("action", actionUrl);

                        $("#gradeList").append(`
                            <tr>
                                <td hidden class="enrollmentId">${
                                    enrollment.id
                                }</td>
                                <td hidden class="gradeId">${
                                    enrollment.grade ? enrollment.grade.id : ""
                                }</td>
                                <td class="subjectCode">${
                                    enrollment.subject.code
                                }</td>
                                <td>${enrollment.subject.name}</td>
                                <td class="subjectGrade fw-bold">${
                                    enrollment.grade
                                        ? enrollment.grade.grade
                                        : ""
                                }</td>
                                <td class="${
                                    enrollment.grade &&
                                    enrollment.grade.status === "Passed"
                                        ? "text-success"
                                        : "text-danger"
                                } fw-bold">
                                    ${
                                        enrollment.grade
                                            ? enrollment.grade.status
                                            : "INC"
                                    }
                                </td>
                                <td> 
                                    <a href="#" id="addGradeButton" style="font-size: 1.5rem;text-decoration:none; color: green; cursor:pointer;">
                                        <span class="mdi mdi-pencil-plus"></span>
                                    </a>
                                    <a href="#" id="editGradeButton" style="font-size: 1.5rem;text-decoration:none; color: green; cursor:pointer;">
                                        <span class="mdi mdi-square-edit-outline"></span>
                                    </a>
                                    <a href="#" onclick="deleteGrade(${
                                        enrollment.grade
                                            ? enrollment.grade.id
                                            : ""
                                    })" style="font-size: 1.5rem; color: red; cursor:pointer;">
                                        <span class="mdi mdi-trash-can-outline"></span>
                                    </a>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    $("#gradeList").html(
                        "<tr><td colspan='5' style='text-align:center'>Student not yet enrolled to any subject</td></tr>"
                    );
                }
            },
            error: function () {
                alert("Error loading enrollments.");
            },
        });
    });
});

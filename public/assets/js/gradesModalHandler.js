$(document).ready(function () {
    $("#triggerGradesModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var studentId = $("#student_id").text();
        console.log(studentId);
        console.log(`Fetching grades for student ID: ${studentId}`);

        $.ajax({
            url: `/grade/${studentId}`,
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
                     
                                <td class="subjectCode">${
                                    enrollment.subject.code
                                }</td>
                                <td>${enrollment.subject.name}</td>
                                <td class="subjectGrade">${
                                    enrollment.grade !== null
                                        ? enrollment.grade
                                        : ""
                                }</td>
                                <td>${
                                    enrollment.status !== null
                                        ? enrollment.status
                                        : "INC"
                                }</td>
                                <td> 
                                 <a href="#" id="addGradeButton" style="font-size: 1.5rem;text-decoration:none; color: green;cursur:pointer; "><span class="mdi mdi-pencil-plus" ></span>
                                </a>
                                <a href="#" id="editGradeButton" style="font-size: 1.5rem;text-decoration:none; color: green;cursur:pointer; "><span class="mdi mdi-square-edit-outline"></span>
                                </a>
                                <a href="#" onclick="deleteSubject(${
                                    enrollment.id
                                })" style="font-size: 1.5rem; color: red;cursur:pointer; ">
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

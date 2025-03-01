$(document).ready(function () {
    $("#triggerModalStudentInformation").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var studentId = button.data("id");
        var studentName = button.data("name");
        var studentEmail = button.data("email");
        var course = button.data("course");

        $("#student_id, #student_name, #email, #student_address").text(""); // Clear student details
        $("#enrollmentList").empty(); // Clear enrollment table

        // Only set student info if it's not already set
        if (!$("#student_id").text().trim()) {
            $("#student_id").text(studentId);
            $("#student_name").text(studentName);
            $("#email").text(studentEmail);
            $("#student_address").text(course);
        }

        console.log(studentId);
        $.ajax({
            url: `/student/enroll/${studentId}`,
            type: "GET",
            success: function (data) {
                console.log(data);

                // Prevent clearing enrollments when reopening modal
                if ($("#enrollmentList").children().length === 0) {
                    if (data.length > 0) {
                        data.forEach(function (enrollment) {
                            var actionUrl = `student/enroll/${enrollment.id}`;
                            $("#IdToDelete").attr("action", actionUrl);
                            $("#enrollmentList").append(`
                                <tr>
                                    <td>${enrollment.id}</td>
                                    <td>${enrollment.subject.code}</td>
                                    <td>${enrollment.subject.name}</td>
                                    <td>${enrollment.subject.units}</td>
                                    <td>${enrollment.instructor}</td>
                                    <td> 
                                        <a href="#" onclick="deleteSubject(${enrollment.id})" style="font-size: 1.5rem; color: red;">
                                            <span class="mdi mdi-trash-can-outline"></span>
                                        </a>
                                    </td>
                                </tr>
                            `);
                        });
                    } else {
                        $("#enrollmentList").html(
                            "<tr><td colspan='6'>No enrollments found</td></tr>"
                        );
                    }
                }
            },
            error: function () {
                alert("Error loading enrollments.");
            },
        });
    });

    // Clear data only when the modal is fully hidden
});

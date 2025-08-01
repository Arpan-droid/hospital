<?php
require_once __DIR__ . '/../../helpers/sessions.php';
checkLogin('doctor');
include '../partials/header.php';
?>

<h2>Doctor Dashboard</h2>

<table class="table table-bordered">
    <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Problem</th><th>Action</th></tr></thead>
    <tbody id="patientList"></tbody>
</table>

<div class="card mt-3 p-3" id="prescriptionForm" style="display:none;">
    <h4>Prescription</h4>
    <form method="post" action="../../controllers/DoctorController.php">
        <input type="hidden" name="action" value="prescribe">
        <input type="hidden" name="ticket_id" id="ticket_id">
        <input type="hidden" name="email" id="patient_email">
        <div class="mb-2"><input type="text" name="diagnosis" class="form-control" placeholder="Diagnosis" required></div>
        <div class="mb-2"><input type="text" name="checkups" class="form-control" placeholder="Recommended Checkups" required></div>
        <div class="mb-2"><textarea name="medicines" class="form-control" placeholder="Medicines" required></textarea></div>
        <button class="btn btn-primary">Send Prescription</button>
    </form>
</div>

<script>
function loadPatients(){
    $.get("../../controllers/TicketController.php?doctor_id=<?= $_SESSION['user_id'] ?>", function(data){
        $("#patientList").html(data);
    });
}

function showPrescription(ticket_id, email){
    $("#ticket_id").val(ticket_id);
    $("#patient_email").val(email);
    $("#prescriptionForm").show();
}

setInterval(loadPatients, 5000);
loadPatients();
</script>

<?php include '../partials/footer.php'; ?>

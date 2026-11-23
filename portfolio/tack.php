
<?php
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$reason = $_POST["reason"] ?? "";
$priority = $_POST["priority"] ?? "";
$message = $_POST["message"] ?? "";
?>

<main>
    <h1>Thank You!</h1>

    <p>
        Thank you,
        <?= htmlspecialchars($name) ?>!
    </p>

    <h2>Your Submitted Details</h2>

    <p>Name: <?= htmlspecialchars($name) ?></p>
    <p>Email: <?= htmlspecialchars($email) ?></p>
    <p>Reason: <?= htmlspecialchars($reason) ?></p>
    <p>Priority: <?= htmlspecialchars($priority) ?></p>
    <p>Message: <?= htmlspecialchars($message) ?></p>

    <p>This is a demonstration. No email has been sent.</p>

    <a href="contact.html">Back to contact form</a>
</main>


<?php
/* =========================================
   FORM DATA
   ========================================= */

/* Only accept form submissions using POST. */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.html");
    exit;
}

/* Read submitted form values. */
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$reason = $_POST["reason"] ?? "";
$priority = $_POST["priority"] ?? "";
$message = $_POST["message"] ?? "";

/* Make sure all values are strings. */
$name = is_string($name) ? trim($name) : "";
$email = is_string($email) ? trim($email) : "";
$reason = is_string($reason) ? trim($reason) : "";
$priority = is_string($priority) ? trim($priority) : "";
$message = is_string($message) ? trim($message) : "";

/* =========================================
   VALIDATION
   ========================================= */

$errors = [];

if ($name === "" || mb_strlen($name) > 100) {
    $errors[] = "Please enter a valid name.";
}

if (
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    strlen($email) > 254
) {
    $errors[] = "Please enter a valid email address.";
}

$allowedReasons = [
    "investigation",
    "collaboration",
    "technology",
    "other"
];

if (!in_array($reason, $allowedReasons, true)) {
    $errors[] = "Please select a valid reason.";
}

$allowedPriorities = ["normal", "urgent"];

if (!in_array($priority, $allowedPriorities, true)) {
    $errors[] = "Please select a valid priority.";
}

if ($message === "" || mb_strlen($message) > 2000) {
    $errors[] = "Please enter a valid message.";
}

/* =========================================
   OUTPUT SECURITY
   ========================================= */

/* Escape text before displaying it in HTML. */
function escape(string $value): string {
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="Confirmation page for the Batman student portfolio contact form."
    >

    <meta name="author" content="Group 16">

    <title>Thank You | Batman Portfolio</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body class="page page--contact">

    <!-- Skip link for keyboard navigation. -->
    <a class="skip-link" href="#main-content">
        Skip to main content
    </a>

    <!-- =====================================
         HEADER
         ===================================== -->

    <header class="site-header">

        <p class="site-header__title">
            Portfolio - Batman
        </p>

        <!-- JS: Close the menu when clicking outside
             or pressing Escape. -->

        <details
            class="menu"
            data-js-action="dismiss-menu"
        >

            <summary
                class="menu__toggle"
                data-js-target="menu-toggle"
            >
                <span aria-hidden="true">☰</span>

                <span class="visually-hidden">
                    Navigation menu
                </span>
            </summary>

            <nav
                class="menu__nav"
                aria-label="Main navigation"
                data-js-target="menu-panel"
            >

                <ul class="menu__list">

                    <li class="menu__item">
                        <a class="menu__link" href="index.html">
                            About Me
                        </a>
                    </li>

                    <li class="menu__item">
                        <a class="menu__link" href="skills.html">
                            Skills
                        </a>
                    </li>

                    <li class="menu__item">
                        <a class="menu__link" href="projects.html">
                            Projects
                        </a>
                    </li>

                    <li class="menu__item">
                        <a class="menu__link" href="experience.html">
                            Experience and Education
                        </a>
                    </li>

                    <li class="menu__item">
                        <a class="menu__link" href="certifications.html">
                            Certifications
                        </a>
                    </li>

                    <li class="menu__item">
                        <a
                            class="menu__link menu__link--current"
                            href="contact.html"
                            aria-current="page"
                        >
                            Contact
                        </a>
                    </li>

                    <li class="menu__item">
                        <a class="menu__link" href="extra.html">
                            Extra
                        </a>
                    </li>

                </ul>
            </nav>
        </details>
    </header>

    <!-- =====================================
         MAIN CONTENT
         ===================================== -->

    <main
        class="page__main"
        id="main-content"
        tabindex="-1"
    >

        <?php if (!empty($errors)): ?>

            <!-- Show validation errors. -->

            <h1 class="page__title">
                Form Submission Error
            </h1>

            <p class="contact__text">
                Please correct the following errors:
            </p>

            <ul class="contact__errors">

                <?php foreach ($errors as $error): ?>

                    <li class="contact__error">
                        <?= escape($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

            <a class="contact__link" href="contact.html">
                Back to contact form
            </a>

        <?php else: ?>

            <!-- Show submitted form data. -->

            <h1 class="page__title">
                Thank You!
            </h1>

            <p class="page__intro">
                Your form has been submitted successfully.
            </p>

            <section
                class="contact"
                aria-labelledby="submitted-details-title"
            >

                <h2
                    class="contact__heading"
                    id="submitted-details-title"
                >
                    Your Submitted Details
                </h2>

                <p class="contact__text">
                    <strong>Name:</strong>
                    <?= escape($name) ?>
                </p>

                <p class="contact__text">
                    <strong>Email:</strong>
                    <?= escape($email) ?>
                </p>

                <p class="contact__text">
                    <strong>Reason:</strong>
                    <?= escape($reason) ?>
                </p>

                <p class="contact__text">
                    <strong>Priority:</strong>
                    <?= escape($priority) ?>
                </p>

                <p class="contact__text">
                    <strong>Message:</strong>
                </p>

                <p class="contact__text--message">
                    <?= escape($message) ?>
                </p>

            </section>

            <p class="contact__note">
                This is a demonstration.
                No email has been sent and the
                information has not been stored.
            </p>

            <a class="contact__link" href="contact.html">
                Back to contact form
            </a>

        <?php endif; ?>

    </main>

    <!-- =====================================
         FOOTER
         ===================================== -->

    <footer class="site-footer">

        <p class="site-footer__text">
            &copy; 2026 Group 16.
            Fictional student portfolio for Responsive Web Design.
        </p>

    </footer>

</body>
</html>

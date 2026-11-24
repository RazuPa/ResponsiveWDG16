
<?php
// Read form data using POST
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$reason = $_POST["reason"] ?? "";
$priority = $_POST["priority"] ?? "";
$message = $_POST["message"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact form confirmation for Batman's portfolio.">
    <meta name="author" content="Group 16">

    <title>Thank You | Batman Portfolio</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body class="page page--contact">

    <a class="skip-link" href="#main-content">
        Skip to main content
    </a>

    <header class="site-header">
        <p class="site-header__title">Portfolio - Batman</p>

        <details class="menu" data-js-action="dismiss-menu">
            <summary class="menu__toggle" data-js-target="menu-toggle">
                <span aria-hidden="true">☰</span>
                <span class="visually-hidden">Navigation menu</span>
            </summary>

            <nav class="menu__nav" aria-label="Main navigation"
                 data-js-target="menu-panel">
                <ul class="menu__list">
                    <li class="menu__item">
                        <a class="menu__link" href="index.html">About Me</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="experience.html">
                            Experience and Education
                        </a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="skills.html">Skills</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="certifications.html">
                            Certifications
                        </a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="projects.html">Projects</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="extra.html">Extra</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link menu__link--current"
                           href="contact.html" aria-current="page">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </details>
    </header>

    <main class="page__main" id="main-content" tabindex="-1">

        <h1 class="page__title">Thank You!</h1>

        <p class="page__intro">
            Your form has been submitted successfully.
        </p>

        <section class="contact" aria-labelledby="details-title">

            <h2 class="contact__heading" id="details-title">
                Your Submitted Details
            </h2>

            <p class="contact__text">
                <strong>Name:</strong>
                <?php echo htmlspecialchars($name); ?>
            </p>

            <p class="contact__text">
                <strong>Email:</strong>
                <?php echo htmlspecialchars($email); ?>
            </p>

            <p class="contact__text">
                <strong>Reason:</strong>
                <?php echo htmlspecialchars($reason); ?>
            </p>

            <p class="contact__text">
                <strong>Priority:</strong>
                <?php echo htmlspecialchars($priority); ?>
            </p>

            <p class="contact__text">
                <strong>Message:</strong>
                <?php echo htmlspecialchars($message); ?>
            </p>

        </section>

        <p class="contact__note">
            This is a demonstration form. No email has been sent.
        </p>

        <a class="contact__link" href="contact.html">
            Back to contact form
        </a>

    </main>

    <footer class="site-footer">
        <p class="site-footer__text">
            &copy; 2026 Group 16.
            Fictional student portfolio for Responsive Web Design.
        </p>
    </footer>

</body>
</html>

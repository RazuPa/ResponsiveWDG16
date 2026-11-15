"use strict";

/* Shared: dismiss navigation */

const navigationMenus = document.querySelectorAll(
    '[data-js-action="dismiss-menu"]'
);

navigationMenus.forEach((menu) => {
    const toggle = menu.querySelector(
        '[data-js-target="menu-toggle"]'
    );

    const panel = menu.querySelector(
        '[data-js-target="menu-panel"]'
    );

    if (!toggle || !panel) {
        return;
    }

    document.addEventListener("click", (event) => {
        const clickedToggle = toggle.contains(event.target);
        const clickedPanel = panel.contains(event.target);

        if (menu.open && !clickedToggle && !clickedPanel) {
            menu.open = false;
        }
    });

    menu.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && menu.open) {
            menu.open = false;
            toggle.focus();
        }
    });
});


/* contact.html: message character counter */

const messageInput = document.querySelector(
    '[data-js-action="update-character-count"]'
);

const messageCount = document.querySelector(
    '[data-js-target="message-count"]'
);

if (messageInput && messageCount) {
    const characterLimit = Number(messageInput.dataset.limit);

    function updateCharacterCount() {
        const currentLength = messageInput.value.length;

        messageCount.textContent =
            `${currentLength} / ${characterLimit} characters`;
    }

    messageInput.addEventListener("input", updateCharacterCount);

    updateCharacterCount();
}
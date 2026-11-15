"use strict";

/* Hitta menyerna via deras JS-krok. */
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

    /* Hoppa över menyn om någon del saknas. */
    if (!toggle || !panel) {
        return;
    }

    /* Stäng menyn när besökaren klickar utanför den. */
    document.addEventListener("click", (event) => {
        const clickedToggle = toggle.contains(event.target);
        const clickedPanel = panel.contains(event.target);

        if (menu.open && !clickedToggle && !clickedPanel) {
            menu.open = false;
        }
    });

    /* Escape stänger menyn och återför fokus till knappen. */
    menu.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && menu.open) {
            menu.open = false;
            toggle.focus();
        }
    });
});

/* Hitta meddelandefältet och platsen där antalet ska visas. */
const messageInput = document.querySelector(
    '[data-js-action="update-character-count"]'
);

const messageCount = document.querySelector(
    '[data-js-target="message-count"]'
);

/* Kör bara räknaren på sidor där båda delarna finns. */
if (messageInput && messageCount) {
    const characterLimit = Number(messageInput.dataset.limit);

    function updateCharacterCount() {
        const currentLength = messageInput.value.length;

        messageCount.textContent =
            `${currentLength} / ${characterLimit} characters`;
    }

    /* Uppdatera när besökaren skriver. */
    messageInput.addEventListener("input", updateCharacterCount);

    /* Visa rätt antal redan när sidan öppnas. */
    updateCharacterCount();
}
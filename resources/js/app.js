import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    function generateRandomID() {
        return 'textarea-' + Math.random().toString(36).substr(2, 9);
    }

    const textareas = document.querySelectorAll("textarea");

    textareas.forEach(textarea => {
        textarea.id = generateRandomID();

        function autoResize(textarea) {
            textarea.style.height = "auto";
            textarea.style.height = textarea.scrollHeight + "px";
        }

        autoResize(textarea);

        textarea.addEventListener("input", () => autoResize(textarea));
    });
});
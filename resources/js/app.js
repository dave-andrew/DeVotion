document.addEventListener("DOMContentLoaded", function() {

    const textareas = document.querySelectorAll("textarea");

    textareas.forEach(textarea => {

        function autoResize(textarea) {
            textarea.style.height = "auto";
            textarea.style.height = textarea.scrollHeight + "px";
        }

        autoResize(textarea);

        textarea.addEventListener("input", () => autoResize(textarea));

        // TODO: Fix this so that it only updates the textarea that is being typed in
        textarea.addEventListener("change", () => {
            autoResize(textarea);
        });

        // Set up interval to continuously check and update textarea height
        // setInterval(() => {
        //     autoResize(textarea);
        // }, 1); // 1000 milliseconds = 1 second
    });
});


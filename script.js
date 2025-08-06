document.addEventListener("DOMContentLoaded", function() {
    const toggleButtons = document.querySelectorAll(".toggleBtn");

    toggleButtons.forEach(button => {
        button.addEventListener("click", function() {
            const userId = this.getAttribute("data-id");

            fetch("toggle.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "id=" + userId
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    location.reload(); // Reload to show updated status
                } else {
                    alert("Failed to toggle status");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});

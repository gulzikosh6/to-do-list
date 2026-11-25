document.addEventListener("DOMContentLoaded", () => {
    const openBtn = document.getElementById("openMainContentBtn");
    const navHomeBtn = document.getElementById("navHomeBtn");
    const catalog = document.getElementById("catalog");

    function goToCatalog(e) {
        if (catalog) {
            if (e) e.preventDefault();
            catalog.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    }

    if (openBtn) openBtn.addEventListener("click", goToCatalog);
    if (navHomeBtn) navHomeBtn.addEventListener("click", goToCatalog);

    const searchInput = document.getElementById("liveSearchInput");
    const cards = document.querySelectorAll(".book-glass-card");
    if (searchInput && cards.length > 0) {
        searchInput.addEventListener("input", () => {
            const q = searchInput.value.trim().toLowerCase();
            cards.forEach((card) => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(q) ? "flex" : "none";
            });
        });
    }

    const modal = document.getElementById("readerModal");
    const closeModal = document.getElementById("closeReaderModal");
    document.querySelectorAll(".btn-read-card").forEach((btn) => {
        btn.addEventListener("click", () => {
            if (!modal) return;
            document.getElementById("modalTitle").textContent = btn.dataset.title || "";
            document.getElementById("modalAuthor").textContent = btn.dataset.author || "";
            document.getElementById("modalDesc").textContent = btn.dataset.desc || "";
            modal.classList.add("open");
        });
    });

    if (closeModal && modal) {
        closeModal.addEventListener("click", () => modal.classList.remove("open"));
        modal.addEventListener("click", (e) => {
            if (e.target === modal) modal.classList.remove("open");
        });
    }
});

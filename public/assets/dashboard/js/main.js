// Wait for the DOM content to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
    // DOM Elements
    const sidebar = document.getElementById("sidebar");
    const header = document.getElementById("header");
    const mainContent = document.getElementById("main-content");
    const toggleSidebarBtn = document.getElementById("toggle-sidebar");
    const overlay = document.getElementById("overlay");
    const menuItems = document.querySelectorAll(".has-dropdown");

    // Toggle sidebar on button click
    toggleSidebarBtn.addEventListener("click", function () {
        // Check window width to determine mobile or desktop behavior
        if (window.innerWidth < 992) {
            // Mobile: Show/hide sidebar with overlay
            sidebar.classList.toggle("show");
            overlay.classList.toggle("show");
        } else {
            // Desktop: Collapse/expand sidebar
            sidebar.classList.toggle("collapsed");
            header.classList.toggle("expanded");
            mainContent.classList.toggle("expanded");
        }
    });

    // Close sidebar when clicking overlay (mobile only)
    overlay.addEventListener("click", function () {
        sidebar.classList.remove("show");
        overlay.classList.remove("show");
    });

    // Toggle dropdown menus
    menuItems.forEach(function (item) {
        const menuLink = item.querySelector(".menu-link");
        const submenu = item.querySelector(".submenu");

        menuLink.addEventListener("click", function (e) {
            e.preventDefault();

            // If sidebar is collapsed on desktop, don't toggle submenu
            if (
                window.innerWidth >= 992 &&
                sidebar.classList.contains("collapsed")
            ) {
                return;
            }

            // Toggle active class on menu item
            item.classList.toggle("open");

            // Toggle submenu visibility
            if (submenu.classList.contains("open")) {
                submenu.classList.remove("open");
            } else {
                // Close all other open submenus
                document
                    .querySelectorAll(".submenu.open")
                    .forEach(function (openSubmenu) {
                        if (openSubmenu !== submenu) {
                            openSubmenu.classList.remove("open");
                            openSubmenu.parentElement.classList.remove("open");
                        }
                    });

                submenu.classList.add("open");
            }
        });
    });

    // Handle window resize
    window.addEventListener("resize", function () {
        if (window.innerWidth >= 992) {
            // Desktop: Remove mobile classes
            overlay.classList.remove("show");

            // If sidebar was hidden on mobile, make it visible on desktop
            if (!sidebar.classList.contains("show")) {
                sidebar.classList.remove("show");
            }
        } else {
            // Mobile: Convert collapsed to hidden
            if (sidebar.classList.contains("collapsed")) {
                sidebar.classList.remove("collapsed");
                sidebar.classList.remove("show");
                header.classList.remove("expanded");
                mainContent.classList.remove("expanded");
            }
        }
    });

    // Set active menu item based on current page
    const currentPath = window.location.pathname;
    const menuLinks = document.querySelectorAll(".menu-link, .submenu-link");

    menuLinks.forEach(function (link) {
        const href = link.getAttribute("href");

        if (
            href === currentPath ||
            (currentPath.includes(href) && href !== "#")
        ) {
            // Set active class
            link.classList.add("active");

            // If it's a submenu link, open its parent menu
            if (link.classList.contains("submenu-link")) {
                const parentItem = link.closest(".menu-item");
                if (parentItem) {
                    parentItem.classList.add("open");
                    const submenu = parentItem.querySelector(".submenu");
                    if (submenu) {
                        submenu.classList.add("open");
                    }
                }
            }
        }
    });

    // Initialize tooltips and popovers
    if (typeof bootstrap !== "undefined") {
        const tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        const popoverTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="popover"]')
        );
        popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }

    // Action buttons functionality
    const actionButtons = document.querySelectorAll(".action-btn");

    actionButtons.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            const action = this.classList.contains("view")
                ? "view"
                : this.classList.contains("edit")
                ? "edit"
                : this.classList.contains("delete")
                ? "delete"
                : "";

            const row = this.closest("tr");
            const id = row
                ? row.querySelector("td:first-child").textContent
                : "";

            // For demonstration purposes, show different actions
            if (action === "view") {
                alert(`Viewing details for ID: ${id}`);
            } else if (action === "edit") {
                alert(`Editing item with ID: ${id}`);
            } else if (action === "delete") {
                if (
                    confirm(
                        `Are you sure you want to delete item with ID: ${id}?`
                    )
                ) {
                    alert(`Item with ID: ${id} deleted successfully`);
                }
            }
        });
    });
});

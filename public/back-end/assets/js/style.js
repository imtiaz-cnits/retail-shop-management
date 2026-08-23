// Sidebar Accordion & Active Menu Handler
$(document).ready(function () {
  const currentPath = window.location.pathname;

  // 1. Event Delegation for Parent Menu Li Click (Catches clicks on <a>, <span>, <i> or <li>)
  $(document).on("click", ".menu > ul > li", function (e) {
    // If click is on a child link inside sub-menu, allow normal navigation
    if ($(e.target).closest("ul.sub-menu").length > 0) {
      return;
    }

    const $submenu = $(this).find("> ul");
    if ($submenu.length > 0) {
      e.preventDefault();
      e.stopPropagation();

      // Close sibling submenus
      $(this).siblings().removeClass("active").find("> ul").slideUp(200);

      // Toggle current submenu
      $(this).toggleClass("active");
      $submenu.slideToggle(200);
    }
  });

  // 2. Submenu Child Item Click
  $(document).on("click", ".menu > ul > li ul li a", function (e) {
    e.stopPropagation();
    const childHref = $(this).attr("href");
    if (childHref) {
      localStorage.setItem("activeSubmenuLink", childHref);
    }
    const parentHref = $(this).closest("ul").closest("li").find("> a").attr("href");
    if (parentHref) {
      localStorage.setItem("activeSidebarLink", parentHref);
    }
  });

  // 3. Auto-Highlight & Auto-Expand Submenu based on Current URL Path or LocalStorage
  let matchedChild = false;
  $(".menu ul li a").each(function () {
    const href = $(this).attr("href");
    if (href) {
      const cleanHref = href.replace(/^https?:\/\/[^\/]+/, '');
      if (cleanHref && cleanHref !== '#' && !cleanHref.startsWith('javascript') && cleanHref.length > 1 && currentPath === cleanHref) {
        const $li = $(this).parent();
        $li.addClass("active");
        const $parentMenu = $li.closest("ul").closest("li");
        if ($parentMenu.length) {
          $parentMenu.addClass("active");
          $parentMenu.find("> ul").show();
        }
        matchedChild = true;
      }
    }
  });

  if (!matchedChild) {
    const activeSubmenuLink = localStorage.getItem("activeSubmenuLink");
    const activeSidebarLink = localStorage.getItem("activeSidebarLink");

    if (activeSubmenuLink && activeSubmenuLink !== 'null' && activeSubmenuLink !== 'undefined') {
      const $subEl = $(`.menu ul li a[href="${activeSubmenuLink}"]`).parent();
      if ($subEl.length) {
        $subEl.addClass("active");
        const $pMenu = $subEl.closest("ul").closest("li");
        $pMenu.addClass("active");
        $pMenu.find("> ul").show();
      }
    } else if (activeSidebarLink && activeSidebarLink !== 'null' && activeSidebarLink !== 'undefined') {
      const $pEl = $(`.menu > ul > li > a[href="${activeSidebarLink}"]`).parent();
      if ($pEl.length) {
        $pEl.addClass("active");
        $pEl.find("> ul").show();
      }
    }
  }
});

//   ................................................
//   ................................................
//   ................................................
//   ................................................

// Counter Animation
function counterAnimation() {
  const counters = document.querySelectorAll(".counter-value");
  counters.forEach((counter) => {
    const target = +counter.getAttribute("data-target");
    const speed = target / 250;
    const updateCounter = () => {
      const current = +counter.innerText;
      if (current < target) {
        counter.innerText = Math.ceil(current + speed);
        setTimeout(updateCounter, 1);
      } else {
        counter.innerText = target;
      }
    };
    updateCounter();
  });
}

// Sidebar Close on Outside Click
document.addEventListener("click", function (event) {
  const sidebar = document.querySelector(".vertical-menu");
  const toggleButton = document.querySelector(".vertical-menu-btn");

  if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
    document.body.classList.remove("sidebar-enable");
  }
});

// Initialize Sidebar Active State on Page Load
document.addEventListener("DOMContentLoaded", function () {
  setSidebarMenuActive();
});

// Responsive Sidebar Toggle
function toggleSidebar() {
  const currentSize = document.body.getAttribute("data-sidebar-size");

  document.body.classList.toggle("sidebar-enable");
  if (window.innerWidth >= 992) {
    document.body.setAttribute(
      "data-sidebar-size",
      currentSize === "sm" ? "lg" : "sm"
    );
  }
}
document.querySelectorAll(".vertical-menu-btn").forEach((button) => {
  button.addEventListener("click", toggleSidebar);
});

// Tooltip Initialization
document.querySelectorAll("[data-bs-toggle='tooltip']").forEach((tooltip) => {
  new bootstrap.Tooltip(tooltip);
});

// Popover Initialization
document.querySelectorAll("[data-bs-toggle='popover']").forEach((popover) => {
  new bootstrap.Popover(popover);
});

// Horizontal Layout Toggle
function toggleLayout() {
  const body = document.body;
  const layout = body.getAttribute("data-layout");

  if (layout === "horizontal") {
    body.setAttribute("data-layout", "vertical");
  } else {
    body.setAttribute("data-layout", "horizontal");
  }
}
document.querySelectorAll(".layout-toggle").forEach((button) => {
  button.addEventListener("click", toggleLayout);
});

// Initialize All Functions on Page Load
document.addEventListener("DOMContentLoaded", function () {
  counterAnimation();
  setActiveMenu();
});

// Right sidebar toggle functionality
document.querySelectorAll(".right-bar-toggle").forEach(function (toggleBtn) {
  toggleBtn.addEventListener("click", function () {
    document.body.classList.toggle("right-bar-enabled");
  });
});

// Close the right sidebar when clicking outside of it
document.body.addEventListener("click", function (event) {
  const isClickInside = event.target.closest(".right-bar-toggle, .right-bar");
  if (!isClickInside) {
    document.body.classList.remove("right-bar-enabled");
  }
});

// Toggle light/dark mode based on radio button selection
document
  .querySelectorAll('input[name="layout-mode"]')
  .forEach(function (toggleBtn) {
    toggleBtn.addEventListener("change", function () {
      const selectedMode = document.querySelector(
        'input[name="layout-mode"]:checked'
      ).value;
      document.body.setAttribute("data-layout-mode", selectedMode);
    });
  });






//.........................................................................

// // Function to toggle light and dark mode
function toggleLightMode() {
  const body = document.body;
  const currentMode = body.getAttribute('light-mode');
  const newMode = currentMode === 'dark' ? 'light' : 'dark';

  // Update the mode attribute
  body.setAttribute('light-mode', newMode);

  // Save the preference to localStorage
  localStorage.setItem('lightMode', newMode);
}

// Set the mode on page load based on localStorage
window.onload = function () {
  const savedMode = localStorage.getItem('lightMode') || 'light'; // Default to light mode
  document.body.setAttribute('light-mode', savedMode);
};
// // //////



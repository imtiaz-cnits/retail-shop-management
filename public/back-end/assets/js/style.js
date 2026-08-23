// MACS Dashboard Sidebar & Accordion Drilldown Handler
$(document).ready(function () {
  const currentPath = window.location.pathname;

  // 1. Drilldown submenu transition
  $(document).on("click", ".main-menu-panel li.submenu-active > a", function (e) {
    e.preventDefault();
    e.stopPropagation();

    const $li = $(this).parent();
    const parentName = $(this).find(".text").text().trim();
    const $subMenuUl = $li.find("> ul.sub-menu");

    if ($subMenuUl.length > 0) {
      // Build MACS drilldown submenu view
      let submenuHtml = `
        <div class="submenu-back-btn" id="submenuBackBtn">
          <i class="fa-solid fa-angle-left me-2"></i> ${parentName}
        </div>
        <ul>
          ${$subMenuUl.html()}
        </ul>
      `;

      // Inject and slide panel track to show submenu
      $(".submenu-panel").html(submenuHtml);
      $(".main-menu-panel li").removeClass("active-parent");
      $li.addClass("active-parent");
      $(".sidebar-menu-scroll").addClass("show-submenu");

      // Save drilldown state to localStorage
      localStorage.setItem("activeSubmenuParentName", parentName);
    }
  });

  // 2. Submenu back button click to slide back to main menu
  $(document).on("click", "#submenuBackBtn", function (e) {
    e.preventDefault();
    e.stopPropagation();

    // Slide back right
    $(".sidebar-menu-scroll").removeClass("show-submenu");
    localStorage.removeItem("activeSubmenuParentName");
  });

  // 3. Highlight sub-links and restore drilldown state on page load
  function restoreDrilldownMenuState() {
    let matched = false;

    // Check all menu links for exact matching path
    $(".main-menu-panel a, .submenu-panel a").each(function () {
      const href = $(this).attr("href");
      if (href) {
        const cleanHref = href.replace(/^https?:\/\/[^\/]+/, '');
        if (cleanHref && cleanHref !== '#' && !cleanHref.startsWith('javascript') && cleanHref.length > 1 && currentPath === cleanHref) {
          
          // Check if link is inside a hidden submenu structure
          const $subUl = $(this).closest("ul.sub-menu");
          if ($subUl.length > 0) {
            const $parentLi = $subUl.closest("li.submenu-active");
            $parentLi.addClass("active");
            
            const parentName = $parentLi.find("> a .text").text().trim();
            
            // Build the submenu items inside drilldown panel
            let submenuHtml = `
              <div class="submenu-back-btn" id="submenuBackBtn">
                <i class="fa-solid fa-angle-left me-2"></i> ${parentName}
              </div>
              <ul>
                ${$subUl.html()}
              </ul>
            `;
            $(".submenu-panel").html(submenuHtml);

            // Highlight child active item in the cloned panel
            $(".submenu-panel a").each(function () {
              const sHref = $(this).attr("href");
              if (sHref && sHref.replace(/^https?:\/\/[^\/]+/, '') === cleanHref) {
                $(this).parent().addClass("active");
              }
            });

            // Transition track instantly without slide animation to prevent flash
            $(".sidebar-menu-scroll").addClass("no-transition show-submenu");
            setTimeout(() => {
              $(".sidebar-menu-scroll").removeClass("no-transition");
            }, 50);

            matched = true;
          } else {
            // Main menu link match
            $(this).parent().addClass("active");
          }
        }
      }
    });

    // If no exact matching route is currently active but we have stored parent state
    if (!matched) {
      const activeParentName = localStorage.getItem("activeSubmenuParentName");
      if (activeParentName) {
        $(".main-menu-panel li.submenu-active > a").each(function () {
          if ($(this).find(".text").text().trim() === activeParentName) {
            const $parentLi = $(this).parent();
            const $subUl = $parentLi.find("> ul.sub-menu");
            if ($subUl.length > 0) {
              let submenuHtml = `
                <div class="submenu-back-btn" id="submenuBackBtn">
                  <i class="fa-solid fa-angle-left me-2"></i> ${activeParentName}
                </div>
                <ul>
                  ${$subUl.html()}
                </ul>
              `;
              $(".submenu-panel").html(submenuHtml);

              $(".sidebar-menu-scroll").addClass("no-transition show-submenu");
              setTimeout(() => {
                $(".sidebar-menu-scroll").removeClass("no-transition");
              }, 50);
            }
          }
        });
      }
    }
  }

  // Initial load execution
  restoreDrilldownMenuState();
});

// Counter Value Animation
function counterAnimation() {
  const counters = document.querySelectorAll(".counter-value");
  counters.forEach((counter) => {
    const target = +counter.getAttribute("data-target");
    if (!target) return;
    const speed = target / 150;
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

// Responsive Sidebar Toggle
function toggleSidebar() {
  // Mobile check
  if (window.innerWidth < 992) {
    document.body.classList.toggle("sidebar-enable");
  } else {
    // Desktop: collapse sidebar completely off-screen (MACS dashboard toggle style)
    document.body.classList.toggle("sidebar-collapsed");
    localStorage.setItem("sidebarCollapsedState", document.body.classList.contains("sidebar-collapsed"));
  }
}

// Register click events
document.querySelectorAll(".vertical-menu-btn").forEach((button) => {
  button.addEventListener("click", toggleSidebar);
});

// Sidebar Close on Mobile Outside Click
document.addEventListener("click", function (event) {
  const sidebar = document.querySelector(".vertical-menu");
  const toggleButton = document.querySelector(".vertical-menu-btn");

  if (sidebar && toggleButton) {
    if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
      document.body.classList.remove("sidebar-enable");
    }
  }
});

// Initialize on DOM Load
document.addEventListener("DOMContentLoaded", function () {
  counterAnimation();
  
  // Restore collapsed state on desktop
  const isCollapsed = localStorage.getItem("sidebarCollapsedState") === "true";
  if (isCollapsed && window.innerWidth >= 992) {
    document.body.classList.add("sidebar-collapsed");
  }
});

// Initialize Tooltips & Popovers
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("[data-bs-toggle='tooltip']").forEach((tooltip) => {
    new bootstrap.Tooltip(tooltip);
  });
  document.querySelectorAll("[data-bs-toggle='popover']").forEach((popover) => {
    new bootstrap.Popover(popover);
  });
});


// Function to toggle light and dark mode (Tailwind and MACS compatible)
function toggleLightMode() {
  const currentMode = document.documentElement.getAttribute('light-mode') || 'light';
  const newMode = currentMode === 'dark' ? 'light' : 'dark';

  // Apply to Document Element and Body
  document.documentElement.setAttribute('light-mode', newMode);
  document.documentElement.setAttribute('data-layout-mode', newMode);
  document.body.setAttribute('light-mode', newMode);
  
  if (newMode === 'dark') {
    document.documentElement.classList.add('dark');
    document.body.classList.add('dark-mode');
  } else {
    document.documentElement.classList.remove('dark');
    document.body.classList.remove('dark-mode');
  }

  // Save the preference to localStorage
  localStorage.setItem('lightMode', newMode);
  
  // Update toggle icons
  updateThemeToggleIcons(newMode);
}

function updateThemeToggleIcons(mode) {
  const moonIcons = document.querySelectorAll('.theme-icon-moon');
  const sunIcons = document.querySelectorAll('.theme-icon-sun');
  const themeBadges = document.querySelectorAll('#DropdownThemeBadge');
  
  moonIcons.forEach(icon => {
    icon.style.display = mode === 'dark' ? 'none' : 'inline-block';
  });
  sunIcons.forEach(icon => {
    icon.style.display = mode === 'dark' ? 'inline-block' : 'none';
  });
  themeBadges.forEach(badge => {
    badge.innerText = mode === 'dark' ? 'DARK' : 'LIGHT';
  });
}

// Set initial theme icons on document ready
$(document).ready(function() {
  const savedMode = localStorage.getItem('lightMode') || 'light';
  updateThemeToggleIcons(savedMode);
});

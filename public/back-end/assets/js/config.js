// Global flag for page initial loading skeleton
window.isInitialPageLoad = true;

function showLoader() {
    // Show top progress bar
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.remove('d-none');
    }
    
    // Page level skeleton injection on initial load
    if (window.isInitialPageLoad && !window.location.pathname.includes('/pos')) {
        injectPageSkeleton();
    }
    
    // Auto-inject table skeletons into empty or loading tables
    const tableBodies = document.querySelectorAll('tbody#tableList, .table tbody');
    tableBodies.forEach(tbody => {
        if (!tbody.innerHTML || tbody.innerHTML.includes('Loading') || tbody.innerHTML.trim() === '') {
            const table = tbody.closest('table');
            const headers = table ? table.querySelectorAll('thead th') : [];
            const colCount = headers.length || 5;
            showTableSkeleton(tbody, colCount, 5);
        }
    });
}

function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.add('d-none');
    }
    
    // If it was the initial load, remove the page skeleton and restore the real content
    if (window.isInitialPageLoad) {
        removePageSkeleton();
        window.isInitialPageLoad = false; // Turn off initial load flag
    }
}

function injectPageSkeleton() {
    const pageContent = document.querySelector('.page-content');
    if (!pageContent) return;
    
    // Check if the skeleton is already injected
    if (document.getElementById('global-page-skeleton')) return;
    
    // Hide the real page content children temporarily
    const children = pageContent.children;
    for (let i = 0; i < children.length; i++) {
        if (children[i].tagName !== 'SCRIPT' && children[i].id !== 'global-page-skeleton') {
            children[i].setAttribute('data-pre-skeleton-display', children[i].style.display || '');
            children[i].style.setProperty('display', 'none', 'important');
        }
    }
    
    // Inject the page skeleton structure
    const skeletonDiv = document.createElement('div');
    skeletonDiv.id = 'global-page-skeleton';
    skeletonDiv.className = 'page-skeleton-wrapper';
    skeletonDiv.innerHTML = `
        <div class="page-skeleton-header">
            <div class="skeleton-loader skeleton-title" style="width: 250px; height: 32px; border-radius: 6px;"></div>
            <div class="skeleton-loader skeleton-text" style="width: 400px; height: 14px; border-radius: 4px;"></div>
        </div>
        <div class="page-skeleton-cards">
            <div class="page-skeleton-card">
                <div class="skeleton-loader" style="width: 120px; height: 14px; margin-bottom: 12px; border-radius: 4px;"></div>
                <div class="skeleton-loader" style="width: 80px; height: 28px; margin-bottom: 12px; border-radius: 6px;"></div>
                <div class="skeleton-loader" style="width: 140px; height: 12px; border-radius: 4px;"></div>
            </div>
            <div class="page-skeleton-card">
                <div class="skeleton-loader" style="width: 120px; height: 14px; margin-bottom: 12px; border-radius: 4px;"></div>
                <div class="skeleton-loader" style="width: 80px; height: 28px; margin-bottom: 12px; border-radius: 6px;"></div>
                <div class="skeleton-loader" style="width: 140px; height: 12px; border-radius: 4px;"></div>
            </div>
            <div class="page-skeleton-card">
                <div class="skeleton-loader" style="width: 120px; height: 14px; margin-bottom: 12px; border-radius: 4px;"></div>
                <div class="skeleton-loader" style="width: 80px; height: 28px; margin-bottom: 12px; border-radius: 6px;"></div>
                <div class="skeleton-loader" style="width: 140px; height: 12px; border-radius: 4px;"></div>
            </div>
        </div>
        <div class="page-skeleton-body">
            <div class="skeleton-loader skeleton-title" style="width: 180px; height: 22px; border-radius: 6px;"></div>
            <div class="skeleton-loader skeleton-text" style="width: 100%; height: 14px; border-radius: 4px;"></div>
            <div class="skeleton-loader skeleton-text" style="width: 95%; height: 14px; border-radius: 4px;"></div>
            <div class="skeleton-loader skeleton-text" style="width: 98%; height: 14px; border-radius: 4px;"></div>
            <div class="skeleton-loader skeleton-text" style="width: 90%; height: 14px; border-radius: 4px;"></div>
            <div class="skeleton-loader skeleton-text" style="width: 85%; height: 14px; border-radius: 4px;"></div>
        </div>
    `;
    pageContent.appendChild(skeletonDiv);
}

function removePageSkeleton() {
    const pageContent = document.querySelector('.page-content');
    if (!pageContent) return;
    
    // Remove the skeleton container
    const skeletonDiv = document.getElementById('global-page-skeleton');
    if (skeletonDiv) {
        skeletonDiv.remove();
    }
    
    // Restore the real page content children display states
    const children = pageContent.children;
    for (let i = 0; i < children.length; i++) {
        if (children[i].tagName !== 'SCRIPT' && children[i].id !== 'global-page-skeleton') {
            const preDisplay = children[i].getAttribute('data-pre-skeleton-display') || '';
            children[i].style.display = preDisplay;
            children[i].removeAttribute('data-pre-skeleton-display');
        }
    }
}

function showTableSkeleton(target, columnsCount = 5, rowsCount = 5) {
    const tbody = typeof target === 'string' ? document.getElementById(target) : target;
    if (!tbody) return;
    
    let html = '';
    for (let i = 0; i < rowsCount; i++) {
        html += '<tr>';
        for (let j = 0; j < columnsCount; j++) {
            let width = j === 0 ? '70%' : (j === columnsCount - 1 ? '40%' : '80%');
            html += `
                <td>
                    <div class="skeleton-loader skeleton-text" style="width: ${width}; height: 12px; margin-bottom: 0; display: inline-block;"></div>
                </td>
            `;
        }
        html += '</tr>';
    }
    tbody.innerHTML = html;
}

function showCardSkeleton(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.innerHTML = `
        <div class="skeleton-loader skeleton-title" style="width: 60%; height: 18px; margin-bottom: 12px; border-radius: 4px;"></div>
        <div class="skeleton-loader skeleton-text" style="width: 80%; height: 12px; margin-bottom: 8px; border-radius: 4px;"></div>
        <div class="skeleton-loader skeleton-text" style="width: 50%; height: 12px; margin-bottom: 8px; border-radius: 4px;"></div>
    `;
}

function successToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        }
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        }
    }).showToast();
}

let logoutTimer; // Variable to store the logout timer

function startLogoutTimer() {
    // Clear existing timer, if any
    if (logoutTimer) {
        clearTimeout(logoutTimer);
    }
    // Start a new timer for 24 hours (86,400,000 milliseconds)
    logoutTimer = setTimeout(logout, 43200000); // 6 hours in milliseconds
}

function resetLogoutTimer() {
    // Restart the logout timer
    startLogoutTimer();
}


function logout() {
    localStorage.clear();
    sessionStorage.clear();
    window.location.href = "/nexus-login-page";
}

function unauthorized(code){
    if(code===401){
        localStorage.clear();
        sessionStorage.clear();

        window.location.href="/nexus-login-page"
    }
}

function setToken(token){
    localStorage.setItem("token",`Bearer ${token}`)
}

function getToken(){
    return  localStorage.getItem("token")
}

function HeaderToken() {
    let token = getToken();
    // Start or reset the logout timer whenever the token is used
    startLogoutTimer();
    return {
        headers: {
            Authorization: token
        }
    }
}
function HeaderTokenWithBlob() {
    let token = getToken();
    // Start or reset the logout timer whenever the token is used
    startLogoutTimer();
    return {
        responseType: 'blob',
        headers: {
            Authorization: token
        }
    }
}

document.addEventListener("mousemove", resetLogoutTimer);
document.addEventListener("keypress", resetLogoutTimer);

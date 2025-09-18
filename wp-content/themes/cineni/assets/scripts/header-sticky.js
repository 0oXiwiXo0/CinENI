const header = document.getElementById('sticky-header');
const spacer = document.getElementById('headerSpacer');
const body = document.body;

let isSticky = false;
const headerOffsetTop = header.offsetTop;

// Fonction pour connaître la hauteur de la barre admin
function getAdminBarHeight() {
    const adminBar = document.getElementById('wpadminbar');
    if (adminBar) {
        return adminBar.offsetHeight;
    }
    return 0;
}

// Fonction pour gérer le sticky
function updateHeaderSticky() {
    const scrollTop = window.scrollY;
    const adminBarHeight = getAdminBarHeight();

    console.log(adminBarHeight);

    if (scrollTop >= headerOffsetTop && !isSticky) {
        header.classList.add('stuck');
        header.style.top = `${adminBarHeight}px`;
        spacer.style.height = `${header.offsetHeight}px`;
        isSticky = true;
    } else if (scrollTop < headerOffsetTop && isSticky) {
        header.classList.remove('stuck');
        header.style.top = '';
        spacer.style.height = '0px';
        isSticky = false;
    }
}

// Écouteurs
window.addEventListener('scroll', updateHeaderSticky);
window.addEventListener('resize', updateHeaderSticky);

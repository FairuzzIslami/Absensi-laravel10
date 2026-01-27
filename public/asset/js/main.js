// Toggle Password
document.addEventListener("DOMContentLoaded", function () {
    const toggleIcons = document.querySelectorAll('.toggle-password');

    toggleIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            const input = this.closest('.input-group').querySelector('input');
            const eyeIcon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');
    const mainContent = document.getElementById('mainContent');
    const navbar = document.getElementById('mainNavbar');

    // Mobile default close
    if (window.innerWidth <= 768) {
        sidebar.classList.remove('active');
        backdrop.classList.remove('active');
    }

    toggleButton.addEventListener('click', function () {

        if (window.innerWidth <= 768) {

            sidebar.classList.toggle('active');
            backdrop.classList.toggle('active');

        } else {

            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            navbar.classList.toggle('expanded');

        }

    });

    // Klik backdrop auto close
    backdrop.addEventListener('click', function () {
        sidebar.classList.remove('active');
        backdrop.classList.remove('active');
    });

});



// kode random
function generateKode() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let kode = '';
    for (let i = 0; i < 6; i++) {
        kode += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    document.getElementById('kode').value = kode;
}

function updateClock() {
    const now = new Date();

    const time = now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });

    document.getElementById('liveClock').innerText = time;
}

setInterval(updateClock, 1000);
updateClock();

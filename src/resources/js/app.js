import Alpine from 'alpinejs'

// alpine js
window.Alpine = Alpine
Alpine.start()


// Javascript to toggle the menu
document.getElementById('nav-toggle').onclick = function() {
    document.getElementById("nav-content").classList.toggle("hidden");
}

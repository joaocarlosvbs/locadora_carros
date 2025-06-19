document.addEventListener('DOMContentLoaded', function() {
    // Inicializa o Sidenav (menu mobile)
    var elemsSidenav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(elemsSidenav);

    // Inicializa Dropdowns
    var elemsDropdown = document.querySelectorAll('.dropdown-trigger');
    M.Dropdown.init(elemsDropdown, { constrainWidth: false });

    // Inicializa Selects
    var elemsSelect = document.querySelectorAll('select');
    M.FormSelect.init(elemsSelect);
});
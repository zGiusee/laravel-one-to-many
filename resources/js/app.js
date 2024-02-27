import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// Recupero tutti i pulsanti della tabella
const deleteButtons = document.querySelectorAll('.my_delete_button');

// Ciclo tutti i pulsanti

deleteButtons.forEach((button) => {
    button.addEventListener('click', function () {
        // Recupero lo slug dai data
        let projectSlug = button.getAttribute('data-project-slug');

        // Recupero il nome del progetto
        let projectName = button.getAttribute('data-project-name');

        // Recupero lo spazio riservato al nome del progetto dentro il modal
        const modal_project_name = document.getElementById('project_name');

        // Applico il contenuto al modal
        modal_project_name.textContent = projectName;

        // Definisco la url
        let url = `${window.location.origin}/admin/projects/${projectSlug}`;

        // Recupero la formìì
        let delete_form = document.getElementById('delete_form');

        // applico alla form l'url
        delete_form.setAttribute('action', url);
    })
})

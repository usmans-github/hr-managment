import './bootstrap';

document.querySelectorAll('[data-dismiss-target]').forEach(button => {
    button.addEventListener('click', function () {
        this.parentElement.remove();
    });
});
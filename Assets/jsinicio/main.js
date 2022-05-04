document.querySelectorAll('#temario .lista  a').forEach((elemento) => {
    elemento.addEventListener('click', () => {
        document.querySelector('#temario .activo').classList.remove('activo');
        elemento.parentElement.parentElement.classList.add('activo');
    });
});
const Modal = {
    open() {
        document.querySelector('.modal-overlay').classList.add('ativo')
    },
    close() {
        document.querySelector('.modal-overlay').classList.remove('ativo')
    }
}
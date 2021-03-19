const Modal = {
    open() {
        document.querySelector('.modal-overlay').classList.add('ativo')
    },
    close() {
        document.querySelector('.modal-overlay').classList.remove('ativo')
        document.querySelector('.modal-erro').classList.remove('ativo')
        Login.limparCampo()
    }
}

const Login = {
    usuario: document.getElementById('inputUsuario'),
    senha: document.getElementById('inputSenha'),

    getValues() {
        return {
            usuario: Login.usuario.value,
            senha: Login.senha.value
        }
    },

    validarCampo() {
        const { usuario, senha } = Login.getValues()
        if (usuario.trim() === "" || senha.trim() === "") {
            document.querySelector('.modal-erro').classList.add('ativo')
        }else{
            console.log("CAMPOS PREENCHIDOS")
        }
    },

    limparCampo() {
        const { usuario, senha } = Login.getValues()
        if (usuario.trim() !== "" || senha.trim() !== "") {
            Login.usuario.value = ""
            Login.senha.value = ""
        }else{
            console.log("CAMPOS VAZIOS")
        }
    }
}

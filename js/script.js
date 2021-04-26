const ModalAluno = {
    open() {
        document.querySelector('.modal-overlay-aluno').classList.add('ativo')
    },

    close() {
        document.querySelector('.modal-overlay-aluno').classList.remove('ativo')
        document.querySelector('.modal-erro-aluno').classList.remove('ativo')
        LoginAluno.limparCampo()
    }
}

const ModalFuncionario = {
    open() {
        document.querySelector('.modal-overlay-funcionario').classList.add('ativo')
    },

    close() {
        document.querySelector('.modal-overlay-funcionario').classList.remove('ativo')
        document.querySelector('.modal-erro-funcionario').classList.remove('ativo')
        LoginFuncionario.limparCampo()
    }
}

const LoginAluno = {
    matricula: document.getElementById('inputMatricula'),
    senha: document.getElementById('inputSenhaAluno'),

    getValues() {
        return {
            matricula: LoginAluno.matricula.value,
            senha: LoginAluno.senha.value
        }
    },

    validarCampo() {
        const { matricula, senha } = LoginAluno.getValues()
        if (matricula.trim() === "" || senha.trim() === "") {
            document.querySelector('.modal-erro-aluno').classList.add('ativo')
        } else {
            console.log("CAMPOS PREENCHIDOS")
        }
    },

    limparCampo() {
        const { matricula, senha } = LoginAluno.getValues()
        if (matricula.trim() !== "" || senha.trim() !== "") {
            LoginAluno.matricula.value = ""
            LoginAluno.senha.value = ""
        } else {
            console.log("CAMPOS VAZIOS")
        }
    }
}

const LoginFuncionario = {
    usuario: document.getElementById('inputFuncionario'),
    senha: document.getElementById('inputSenhaFuncionario'),

    getValues() {
        return {
            usuario: LoginFuncionario.usuario.value,
            senha: LoginFuncionario.senha.value
        }
    },

    validarCampo() {
        const { usuario, senha } = LoginFuncionario.getValues()
        if (usuario.trim() === "" || senha.trim() === "") {
            document.querySelector('.modal-erro-funcionario').classList.add('ativo')
        } else {
            console.log("CAMPOS PREENCHIDOS")
        }
    },

    limparCampo() {
        const { usuario, senha } = LoginFuncionario.getValues()
        if (usuario.trim() !== "" || senha.trim() !== "") {
            LoginFuncionario.usuario.value = ""
            LoginFuncionario.senha.value = ""
        } else {
            console.log("CAMPOS VAZIOS")
        }
    }
}

function sideBar() {
    var width = window.innerWidth;
    if (width <= 768) { 
        sideBarMobile()
    } else if (width > 768) {
    console.log("DISPOSITIVO COM RESOLUÇÃO MAIOR QUE 768px")
    }
}

let fechado = Boolean;
fechado = true;

function sideBarMobile() {

    if (fechado == true) {
        document.querySelector('.sidebar').classList.add('ativo');
        fechado = false;
    } else if (fechado == false) {
        document.querySelector('.sidebar').classList.remove('ativo');
        fechado = true;
    } else {
        console.log("ERRO MENU MOBILE")
    }
}

/* function ajustarSideBar() { 
    document.querySelector('.sidebar').classList.add('menor')
    document.querySelector('button').classList.add('menor')
    document.querySelector('.sidebar button img').classList.add('menor')

} SÓ ESTA PEGANDO O PRIMEIRO BOTAO DA SIDEBAR */ 
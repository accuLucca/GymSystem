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

const SideBar = {
    
    sideBar() {

        var buttonsList = document.querySelectorAll('.bSidebar');
        var imgList = document.querySelectorAll('.imgSidebar');

        var width = window.innerWidth;
        if (width <= 768) {
            document.querySelector('.sidebar').classList.toggle('sidebarMobile');
        } else if (width > 768) {
            document.querySelector('.sidebar').classList.toggle('sidebarMenor');
            buttonsList.forEach(button => {
                button.classList.toggle('bSidebarMenor')
            });
            imgList.forEach(img => {
                img.classList.toggle('imgSidebarMenor')
            });
        } else {
            console.log("ERRO NA SIDEBAR");
        }
    }
}
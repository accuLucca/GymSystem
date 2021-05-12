const ModalAluno = {
    open() {
        document.querySelector('.modal-overlay-aluno').classList.add('ativo')
    },

    close() {
        document.querySelector('.modal-overlay-aluno').classList.remove('ativo')
        document.querySelector('.modal-erro-aluno').classList.remove('ativo')
        ModalAluno.limparCampo()
    },

    matricula: document.getElementById('inputMatricula'),
    senha: document.getElementById('inputSenhaAluno'),

    getValues() {
        return {
            matricula: ModalAluno.matricula.value,
            senha: ModalAluno.senha.value
        }
    },

    validarCampo() {
        const { matricula, senha } = ModalAluno.getValues()
        if (matricula.trim() === "" || senha.trim() === "") {
            document.querySelector('.modal-erro-aluno').classList.add('ativo')
        } else {
            console.log("CAMPOS PREENCHIDOS")
        }
    },

    limparCampo() {
        const { matricula, senha } = ModalAluno.getValues()
        if (matricula.trim() !== "" || senha.trim() !== "") {
            ModalAluno.matricula.value = ""
            ModalAluno.senha.value = ""
        } else {
            console.log("CAMPOS VAZIOS")
        }
    }
}

const ModalFuncionario = {
    open() {
        document.querySelector('.modal-overlay-funcionario').classList.add('ativo')
    },

    close() {
        document.querySelector('.modal-overlay-funcionario').classList.remove('ativo')
        document.querySelector('.modal-erro-funcionario').classList.remove('ativo')
        ModalFuncionario.limparCampo()
    },

    usuario: document.getElementById('inputFuncionario'),
    senha: document.getElementById('inputSenhaFuncionario'),

    getValues() {
        return {
            usuario: ModalFuncionario.usuario.value,
            senha: ModalFuncionario.senha.value
        }
    },

    validarCampo() {
        const { usuario, senha } = ModalFuncionario.getValues()
        if (usuario.trim() === "" || senha.trim() === "") {
            document.querySelector('.modal-erro-funcionario').classList.add('ativo')
        } else {
            console.log("CAMPOS PREENCHIDOS")
        }
    },

    limparCampo() {
        const { usuario, senha } = ModalFuncionario.getValues()
        if (usuario.trim() !== "" || senha.trim() !== "") {
            ModalFuncionario.usuario.value = ""
            ModalFuncionario.senha.value = ""
        } else {
            console.log("CAMPOS VAZIOS")
        }
    }
}

const ModalCadastroAluno = {
    open() {
        document.querySelector('.modal-overlay-criarAluno').classList.add('ativo')
    },

    close() {
        document.querySelector('.modal-overlay-criarAluno').classList.remove('ativo')
        document.querySelector('.modal-overlay-criarAluno').classList.remove('ativo')
        ModalCadastroAluno.limparCampo()
    },

    cpf: document.getElementById('CPF'),
    nome: document.getElementById('Nome'),
    nascimento: document.getElementById('nascimento'),
    celular: document.getElementById('Celular'),
    email: document.getElementById('email'),

    getValues() {
        return {
            cpf : ModalCadastroAluno.cpf.value,
            nome: ModalCadastroAluno.nome.value,
            nascimento: ModalCadastroAluno.nascimento.value,
            celular: ModalCadastroAluno.celular.value,
            email: ModalCadastroAluno.email.value
        }
    },

    limparCampo() {
        const { cpf, nome, nascimento, celular, email } = ModalCadastroAluno.getValues()
        if (cpf.trim() !== "" || nome.trim() !== "" || nascimento.trim() !== "" || celular.trim() !== "" || email.trim() !== "") {
            ModalCadastroAluno.cpf.value = ""
            ModalCadastroAluno.nome.value = ""
            ModalCadastroAluno.nascimento.value = ""
            ModalCadastroAluno.celular.value = ""
            ModalCadastroAluno.email.value = ""
        } else {
            console.log("CAMPOS VAZIOS")
        }
    }

}

const ModalExcluirAluno = {
    open() {
        document.querySelector('.modal-overlay-excluir').classList.add('ativo')
    },

    close() {
        document.querySelector('.modal-overlay-excluir').classList.remove('ativo')
        document.querySelector('.modal-overlay-excluir').classList.remove('ativo')
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
            document.querySelector('.container').classList.toggle('containerMaior');
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

function gerenciaTreino() {

    document.getElementById('gerenciaAluno').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaFluxo').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAval').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaTreino').classList.toggle('bSidebarClicked');
    
}

function gerenciaAval() {

    document.getElementById('gerenciaTreino').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaFluxo').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAluno').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAval').classList.toggle('bSidebarClicked');
    
}

function gerenciaFluxo() {

    document.getElementById('gerenciaTreino').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAval').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAluno').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaFluxo').classList.toggle('bSidebarClicked');

}

function gerenciaAluno(){

    document.getElementById('gerenciaTreino').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAval').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaFluxo').classList.remove('bSidebarClicked');
    document.getElementById('gerenciaAluno').classList.toggle('bSidebarClicked');
    window.location.href = 'listarAlunos.php';
}
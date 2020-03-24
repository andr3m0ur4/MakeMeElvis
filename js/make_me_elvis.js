// Classe para Contado
class Contato {
	constructor(name, lastname, email) {
		this.name = name
		this.lastname = lastname
		this.email = email
	}

	validarDados() {
		for (let i in this) {
			if (this[i] == undefined || this[i] == null || this[i] == '') {
				return false
			}
		}

		return true
	}
}

// Adicionar eventos na página
let caminho = window.location.pathname
let arquivo = extrairArquivo(caminho).arquivo

if (arquivo == 'addemail.html') {
	document.getElementById('adicionarBtn').addEventListener('click', adicionarContato, false)
}

if (arquivo == 'addemail.php') {
	carregarModalSucesso();
	document.getElementById('modalBtn').addEventListener('click', voltar, false)
}
	
if (arquivo == 'removeemail.html') {
	document.getElementById('removerBtn').addEventListener('click', removerEmail, false)
}

if (arquivo == 'removeemail.php') {
	carregarModalSucessoRemocao();
	carregarModalErroRemocao();
	document.getElementById('modalBtn').addEventListener('click', voltarRemocao, false)
}

// Função para validar campos do formulário
function adicionarContato() {
	let name = document.getElementById('firstname').value
	let lastname = document.getElementById('lastname').value
	let email = document.getElementById('email').value

	let contato = new Contato(name, lastname, email)

	if (contato.validarDados()) {
		document.getElementById('myForm').submit()
	} else {
		carregarModalErro()
	}
}

// Função para validar email
function removerEmail() {
	let email = document.getElementById('email').value

	if (email == undefined || email == null || email == '') {
		carregarModalErroEmail()
	} else {
		document.getElementById('myForm').submit()
	}
}

// Função para voltar à página inicial
function voltar() {
	location.href = 'addemail.html'
}

function voltarRemocao() {
	location.href = 'removeemail.html'
}

// Função para carregar modal de erro
function carregarModalErro() {
	document.getElementById('modalCabecalho').className = 'modal-header text-danger'
	document.getElementById('modalTitulo').innerHTML = 'Erro ao adicionar contato'
	document.getElementById('modalConteudo').innerHTML = 'Existem campos obrigatórios que não foram preenchidos!'
	document.getElementById('modalBtn').className = 'btn btn-danger'
	document.getElementById('modalBtn').innerHTML = 'Voltar e corrigir'

	$('#modalAdicionarContato').modal('show')
}

// Função para carregar modal de sucesso
function carregarModalSucesso() {
	document.getElementById('modalCabecalho').className = 'modal-header text-success'
	document.getElementById('modalTitulo').innerHTML = 'Cliente adicionado.'
	document.getElementById('modalConteudo').innerHTML = 'Seu e-mail foi cadastrado com sucesso!'
	document.getElementById('modalBtn').className = 'btn btn-success'
	document.getElementById('modalBtn').innerHTML = 'Voltar'

	$('#modalSucesso').modal('show')
}

$('#modalSucesso').on('hidden.bs.modal', function (e) {
	location.href = 'addemail.html'
})

// Função para carregar modal de erro
function carregarModalErroEmail() {
	document.getElementById('modalCabecalho').className = 'modal-header text-danger'
	document.getElementById('modalTitulo').innerHTML = 'Erro ao remover contato'
	document.getElementById('modalConteudo').innerHTML = 'Você deve preencher o campo de e-mail!'
	document.getElementById('modalBtn').className = 'btn btn-danger'
	document.getElementById('modalBtn').innerHTML = 'Voltar e corrigir'

	$('#modalErroEmail').modal('show')
}

function carregarModalSucessoRemocao() {
	$('#modalSucessoRemocao').modal('show')
}

function carregarModalErroRemocao() {
	$('#modalErroRemocao').modal('show')
}

$('#modalSucessoRemocao').on('hidden.bs.modal', function (e) {
	location.href = 'removeemail.html'
})
$('#modalErroRemocao').on('hidden.bs.modal', function (e) {
	location.href = 'removeemail.html'
})

// Função para extrair nome e extensão do arquivo
function extrairArquivo(caminho){
	caminho	= caminho.replace("/\/g", "/")
	let arquivo = caminho.substring(caminho.lastIndexOf('/') + 1)
	let extensao = arquivo.substring(arquivo.lastIndexOf('.') + 1)
	return {arquivo, extensao}
}

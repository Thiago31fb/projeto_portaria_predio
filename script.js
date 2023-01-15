const nome = document.querySelector("#nome");
const sobrenome = document.querySelector("#sobrenome");
const indentidade = document.querySelector("#indentidade");
const empresa = document.querySelector("#empresa");
const submit_cadastro = document.querySelector("#submit_cadastro");
const errorMensagem = document.querySelector(".msg");

submit_cadastro.addEventListener("click", (e) => {

    const nomeV = nome.value;
    const sobrenomeV = sobrenome.value;
    const indentidadeV = indentidade.value;
    const empresaV = empresa.value;

    if (nomeV === "" || sobrenomeV === "" || indentidadeV === "" || empresaV === "" ) {
        e.preventDefault();
        errorMensagem.textContent = "Preencha todos os campos!";
        errorMensagem.classList = "error";
    
        setTimeout(() => {
            errorMensagem.textContent = "";
            errorMensagem.classList = "";
        }, 3000);
        return;
      };

});

const indentidade_entrada = document.querySelector("#indentidade_entrada");
const submit_entrada = document.querySelector("#submit_entrada");
const errorMensagem_entrada = document.querySelector(".msg_entrada");

submit_entrada.addEventListener("click", (e) => {
    

    const indentidade_entradaV = indentidade_entrada.value;
   

    if (indentidade_entradaV === "" ) {
        e.preventDefault();
        errorMensagem_entrada.textContent = "Digite uma indentidade.";
        errorMensagem_entrada.classList = "error";
    
        setTimeout(() => {
            errorMensagem_entrada.textContent = "";
            errorMensagem_entrada.classList = "";
        }, 3000);
        return;
    };

});


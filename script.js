const nome = document.querySelector("#nome");
const sobrenome = document.querySelector("#sobrenome");
const indentidade = document.querySelector("#indentidade");
const submit_cadastro = document.querySelector("#submit_cadastro");
const errorMensagem = document.querySelector(".msg");

submit_cadastro.addEventListener("click", (e) => {

    const nomeV = nome.value;
    const sobrenomeV = sobrenome.value;
    const indentidadeV = indentidade.value;

    if (nomeV === "" || sobrenomeV === "" || indentidadeV === "" ) {
        e.preventDefault();
        errorMensagem.textContent = "Preencha os campos obrigatorios.";
        errorMensagem.classList = "error";
        nome.classList ="campo";
        sobrenome.classList ="campo";
        indentidade.classList ="campo";
    
        setTimeout(() => {
            errorMensagem.textContent = "";
            errorMensagem.classList = "";
            nome.classList ="";
            sobrenome.classList ="";
            indentidade.classList ="";
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
        indentidade_entrada.classList = "campo";
        setTimeout(() => {
            errorMensagem_entrada.textContent = "";
            errorMensagem_entrada.classList = "";
            indentidade_entrada.classList = "";
        }, 3000);
        return;
    };

});


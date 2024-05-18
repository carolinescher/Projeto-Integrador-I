const CPFInput = document.getElementsByName("cpf");
const phoneInput = document.getElementsByName("telefone");
CPFInput[0].addEventListener("keyup", CPFMask);
phoneInput[0].addEventListener("keyup", phoneMask);

//Confirmar logout
function confirmAction() {
    if (confirm("Deseja encerrar sessão?")) {
        window.location.href = "/curriculo/cv/utils/logout.php";
    };
}

function confirmDelete(param_id) {
    if (confirm("Deseja realmente excluir este administrador Geral?")) {
        window.location.href = `/curriculo/cv/pages/agente/excluir.php?paramId=${param_id}`;
    };
}

function phoneMask(event){
  let inputValue = event.target.value.replace(/\D/g,"");

  inputValue = inputValue.replace(/^(\d\d)(\d)/g,"($1)$2"); 
  inputValue = inputValue.replace(/(\d{5})(\d)/,"$1-$2");    
  event.target.value = inputValue;
}

function CPFMask(event){
    let inputValue =  event.target.value.replace(/\D/g,"");

    inputValue = inputValue.replace(/(\d{3})(\d)/,"$1.$2");
    inputValue = inputValue.replace(/(\d{3})(\d)/,"$1.$2");
    inputValue = inputValue.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    event.target.value = inputValue;
}
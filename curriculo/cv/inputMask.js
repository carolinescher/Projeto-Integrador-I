const CPFInput = document.querySelectorAll(".input_cpf");
const phoneInput = document.querySelectorAll(".input_telefone");

CPFInput.forEach((currentElement) => {
  currentElement.addEventListener("keyup", CPFMask);
})
phoneInput.forEach((currentElement) => {
  currentElement.addEventListener("keyup", phoneMask);
})

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
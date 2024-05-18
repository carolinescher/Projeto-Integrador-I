const inputCPF = document.getElementsByName("cpf");
inputCPF.addEventListener('input', formatInput);

function formatInput(event) {
    let currentValue = event.target.value;
    
    if(currentValue.length == 4) {

    }
}

//Confirmar logout
function confirmAction() {
    if (confirm("Deseja encerrar sessão?")) {
        window.location.href = "/cv/utils/logout.php";
    };
}

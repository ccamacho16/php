const modal = document.getElementById('confirm-modal');
if (modal){
    let swCloseConfirm = ()=>{
        document.getElementById('confirm-modal').classList.toggle('hidden');
    };

    const btnCancel = document.getElementById('btnCancel');
    btnCancel.addEventListener('click', ()=>{
        swCloseConfirm();
    });

    /*Boton que muestra el modal de confirmacion*/
    const btnDelete = document.getElementById('btnClearLockers');
    if (btnDelete != null){
        btnDelete.addEventListener('click', ()=>{
            swCloseConfirm();
        });
    };    

    /* Evento submit que se ejecuta al click del boton de confirmacion*/
    const btnConfirm = document.getElementById('btnConfirm');
    btnConfirm.addEventListener('click', ()=>{
        document.getElementById('formClearLockers').submit();
        swCloseConfirm();
    });
}


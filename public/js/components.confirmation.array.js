const modalarray = document.getElementById('confirm-modal-array');
if (modalarray){
    let swCloseConfirm = ()=>{
        document.getElementById('confirm-modal-array').classList.toggle('hidden');
    };
    const btnDeletes = document.querySelectorAll('.btnDelete');
    if (btnDeletes.length>0) {
        btnDeletes.forEach((btn) =>{
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                let id = btn.value;
                document.getElementById('delete_id').value = id;
                swCloseConfirm();
            });
        });    
    } 
    
    const btnCancel = document.getElementById('btnCancel');
    btnCancel.addEventListener('click', ()=>{
        swCloseConfirm();
    });
}

const form = document.getElementById('form');
const characters =document.getElementById('characters');
const table =document.getElementById('table');

form.addEventListener('submit', (e)=>{
    e.preventDefault();
    getDataPro(characters.children[characters.selectedIndex].value);

});

const getdata = ()=>{
    let xhr;
    if (window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject("Microsoft.XMLHTTP");

    //if (id == undefined){
    xhr.open('GET', 'getData');
    
    xhr.addEventListener('load', (data)=>{
        const dataJSON = JSON.parse(data.target.response);
        //console.log(dataJSON);
        const fragment = document.createDocumentFragment();
        for (const categ of dataJSON) {
            const option = document.createElement('OPTION');
            option.setAttribute('value', categ.id);
            option.textContent = categ.name;
            fragment.append(option);
        }
        characters.append(fragment);

    });

    xhr.send();
}

const getDataPro = (id)=>{
    let xhr;
    if (window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject("Microsoft.XMLHTTP");


    xhr.open('GET', id+'/getDataPro');
    xhr.addEventListener('load', (data)=>{
        const dataJSON = JSON.parse(data.target.response);
        console.log(dataJSON);
        const fragment = document.createDocumentFragment();
        for (const prod of dataJSON) {
            const row = document.createElement('TR');
            const dataname = document.createElement('TD');
            const databrand = document.createElement('TD');
            const datacode = document.createElement('TD');

            dataname.textContent = prod.name;
            databrand.textContent = prod.brand;
            datacode.textContent = prod.code;

            row.append(dataname);
            row.append(databrand);
            row.append(datacode);

            fragment.append(row);
        }

        for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
        }

        table.append(fragment); 

    });

    xhr.send();
};

getdata();

/* ------------------------- */
const form2 = document.getElementById('form2');
const mensaje = document.getElementById('mensaje');

form2.addEventListener('submit',(e)=>{
    e.preventDefault();
    
    sendData(form2);
});

const sendData = (data)=>{
    let xhr;
    if (window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject("Microsoft.XMLHTTP");

    /* xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText);
        }
    };   */
    //console.log(data.target.response);
    xhr.addEventListener('load', (data)=>{
        //console.log(JSON.parse(data.target.response));
        mensaje.textContent = (JSON.parse(data.target.response)).message;
    })    
    
/*     xhr.open('POST', data.action);
    xhr.setRequestHeader('X-CSRF-TOKEN', data.querySelector('input[name="_token"]').value);
    xhr.send(new FormData(data));  */  

    xhr.open('POST', 'senddat');
    xhr.setRequestHeader('X-CSRF-TOKEN', data.querySelector('input[name="_token"]').value); 
    const formData = new FormData(data);
    xhr.send(formData);  

};

/* var dropdownBtn = document.getElementById('dropdown-btn');
var dropdownMenu = document.getElementById('dropdown-menu');

dropdownBtn.addEventListener('contextmenu', function(event) {
    event.preventDefault();
    dropdownMenu.style.left = (event.clientX) + 'px';
    dropdownMenu.style.top = event.clientY + 'py';  
    dropdownMenu.classList.toggle('hidden');


});

document.addEventListener('click', function(event) {
    console.log('dos');
    if (!dropdownBtn.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
    }
}); */

const myButton = document.getElementById('myButton');
const myContextMenu = document.getElementById('myContextMenu');

myButton.addEventListener('contextmenu', function (e) {
  e.preventDefault();
  myContextMenu.style.left = e.clientX + 'px';
  myContextMenu.style.top = e.clientY + 'px';
  myContextMenu.classList.remove('hidden');
});

document.addEventListener('click', function (e) {
  if (!myContextMenu.contains(e.target)) {
    myContextMenu.classList.add('hidden');
  }
});
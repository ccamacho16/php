const modallocker = document.getElementById('modal-locker');

if (modallocker){

        /* Implementa el evento click de los Paneles de Locker, para que muestre
        la pantalla de edicion modal */
        const btnPaneles = document.querySelectorAll('.btnPanel');
        if (btnPaneles.length>0) {
            btnPaneles.forEach((btn) =>{
                btn.addEventListener('click', (e) => {
                    //e.preventDefault();
                    let id = btn.value;
                    document.getElementById('idlocker').value = id;

                    let lnumber = btn.querySelector('.lnumber');
                    document.getElementById('idlockertext').textContent = lnumber.textContent;

                    let lname = btn.querySelector('.lname');
                    document.getElementById('namelocker').value = lname.textContent;

                    let ltime_access = btn.querySelector('.ltime_access');
                    let ldescription = btn.querySelector('.ldescription');
                    
                    if (lname.textContent.length > 0){

                        document.getElementById('descriptionlocker').value = ldescription.textContent;
                        
                        document.getElementById('accesslocker').innerHTML = 'Access: <strong>'+ltime_access.textContent.substring(0,5)+'</strong>';

                        let dif_min = differenceMin(ltime_access.textContent);

                        document.getElementById('uselocker').innerHTML = 'Use: <strong>'+convertMinHour(dif_min)+'</strong>';

                    }else{
                        document.getElementById('descriptionlocker').value = '';
                        document.getElementById('accesslocker').textContent = '';
                        document.getElementById('uselocker').textContent = '';
                    }

                    swCloseModalPanel(); 
                    
                });
            });    
        } 

        /* Implementa el evento click del boton Free que se encuentra en el Modal Locker
        este boton activa el evento submit del formulario */
        const btnFree = document.getElementById('btnFree');
        btnFree.addEventListener('click', ()=>{
            document.getElementById('namelocker').value = "";
            document.getElementById('descriptionlocker').value = "";
        });
        

        /* Implementa el Boton SUBMIT DEL FORMULARIO LOCKERS */
        const formlocker = document.getElementById('formlocker');
        formlocker.addEventListener('submit',(e)=>{
            e.preventDefault();
            SaveLocker(formlocker);
            updateStatusPanel();
            swCloseModalPanel();
    
        });

        /* Implementa el evento click del boton CLOSE MODAL, 
        cierra el Modal Locker sin realizar ninguna accion*/
        const close = document.getElementById('btnClose');
        close.addEventListener('click', ()=>{
            document.getElementById('modal-locker').classList.toggle('hidden');
        });

        const Createlockers = document.getElementById('btnCreatelockers');
        Createlockers.addEventListener('click', ()=>{
            swCloseModalPanelCreate();
            //document.getElementById('modal-locker').classList.toggle('hidden');
        });
        const btnCancelCreate = document.getElementById('btnCancelCreate');
        btnCancelCreate.addEventListener('click', ()=>{
            swCloseModalPanelCreate();
        });


        /* Implementa el evento del boton CLEAR
        Limpia todos los campos del Modal Locker */
        const btnClear = document.getElementById('btnClear');
        btnClear.addEventListener('click', ()=>{
            document.getElementById('namelocker').value = "";
            document.getElementById('descriptionlocker').value = ""; 
        });    

        /* Implementa el evento click del Boton SEACRH */
        const btnSearch = document.getElementById('btnSearch');
        const textSearch = document.getElementById('textSearch');
        btnSearch.addEventListener('click', ()=>{
            $texts = textSearch.value; 
            const btnPaneles = document.querySelectorAll('.btnPanel');
            if (btnPaneles.length>0) {
                btnPaneles.forEach((btn) =>{
                    let lname = btn.querySelector('.lname');
                    let ltime_access = btn.querySelector('.ltime_access');
                    if (lname.textContent.length > 0){
                        if ($texts.length > 0 && lname.textContent.toLowerCase().includes($texts.toLowerCase())){
                            btn.style.backgroundColor = "#86efac"       //yellow
                        }else{
                            btn.style.backgroundColor = "#76A9FA"      //blue
                        }
                    }

                    if (lname.textContent.length > 0){
                        let txt = ltime_access.textContent;
                        var indiceEspacio = txt.indexOf(" ");
                        if (indiceEspacio !== -1) {
                            txt = txt.substring(0, indiceEspacio);
                        } 
                        ltime_access.textContent = txt;
                    }
                });      
            }       
            textSearch.focus();
        });    

        /* Funcion que se ejecuta cada vez que se termina de RECARGAR LA PAGINA*/
        let menu;
        window.onload = ()=>{
            const btnPaneles = document.querySelectorAll('.btnPanel');
            if (btnPaneles.length>0) {
                btnPaneles.forEach((btn) =>{
                    let lname = btn.querySelector('.lname');
                    let ldescription = btn.querySelector('.ldescription');
                    let lpoint = btn.querySelector('.lpoint');
                    if (lname.textContent.length > 0){
                        btn.classList.remove('bg-white');
                        btn.style.backgroundColor = "#76A9FA"   //blue
                    }
                    if (ldescription.textContent.length > 0) {
                        lpoint.classList.toggle('hidden');
                    }
                    
                    /* --------------------------------------------- */
                    /* --------------------------------------------- */
                    const menucontext = document.getElementById('menucontext');
                    btn.addEventListener('contextmenu', (e) => {
                        e.preventDefault();
                        
                       if (document.getElementById("miOpcion")==null) {
                            menu = document.createElement("div");
                            menu.innerHTML = "<a href='#' class='px-2 py-1 my-1 rounded-md text-gray-800 bg-white hover:bg-gray-200' id='miOpcion'>Free Locker</a>";
                            document.body.appendChild(menu);
                            const miOpcion = document.getElementById("miOpcion");
                            miOpcion.addEventListener("click", (event) => {
                                event.preventDefault();
                                freelocker(btn);
                                document.body.removeChild(menu);
                            });
                            menu.style.position = "absolute";
                            menu.style.left = e.pageX+'px';
                            menu.style.top = e.pageY+'px';
                            document.addEventListener('click',closeMenu);    
                        } 
                    });

                    /* --------------------------------------------- */
                    /* --------------------------------------------- */
                });      
            }       
            updateStatusPanel();
        }

        /* Funcion que se ejecuta cada que vez que se PRESIONA EL BOTON ENTER
           en la pagina. */
        document.addEventListener('keydown', (e) => {
            const activeElement = document.activeElement;
            if (e.key === 'Enter') {
                if (modallocker.classList.contains('hidden')==false){
                    const botonAceptar = document.getElementById('btnSave');
                    if (activeElement != botonAceptar) {
                        botonAceptar.focus();
                    }
                }else{
                    const btnSearch = document.getElementById('btnSearch');
                    btnSearch.focus();
                }
            }
            
        });

        const slcTime = document.getElementById('slcTime');
        const btnTime = document.getElementById('btnTime');
        btnTime.addEventListener('click', ()=>{
            const btnPaneles = document.querySelectorAll('.btnPanel');
            if (btnPaneles.length>0) {
                btnPaneles.forEach((btn) =>{
                    let time_access = btn.querySelector('.ltime_access');
                    if (time_access.textContent.length > 0){
                        let time_a = time_access.textContent;

                        let dif_min = differenceMin(time_a);

                        /* let txt = time_access.textContent; */
                        var indiceEspacio = time_a.indexOf(" ");
                        if (indiceEspacio !== -1) {
                            time_a = time_a.substring(0, indiceEspacio);
                        } 

                        time_access.innerHTML = time_a + ' <strong>&nbsp;-'+ convertMinHour(dif_min)+'-</strong>';
                        
                        if ( dif_min >= parseInt(slcTime.value)){
                            btn.style.backgroundColor = "#fed7aa"       //naranja
                        }else{
                            btn.style.backgroundColor = "#76A9FA"      //blue
                        }
                    }
                    textSearch.focus();
                });      
            }    
        });    

        /* ------------------------------------------------------- */
        /* -----------------------FUNCIONES----------------------- */
        /* ------------------------------------------------------- */

        /* Oculta y Muestra el Modal del Locker*/
        let swCloseModalPanel = ()=>{
            document.getElementById('modal-locker').classList.toggle('hidden');
            document.getElementById('namelocker').focus();
        };

        let swCloseModalPanelCreate = ()=>{
            document.getElementById('modal-create').classList.toggle('hidden');
            document.getElementById('numLockers').focus();
        };

        let swCloseTimeLocker = ()=>{
            document.getElementById('timelocker').classList.toggle('hidden');
            //document.getElementById('numLockers').focus();
        };


        const SaveLocker = (data)=>{
            let xhr;
            if (window.XMLHttpRequest) xhr = new XMLHttpRequest();
            else xhr = new ActiveXObject("Microsoft.XMLHTTP");
            let mensaje='';
            xhr.addEventListener('load', (data)=>{
                mensaje = (JSON.parse(data.target.response)).message;
                uploadPanel(mensaje);
                
            })    
            let dir = 'saveLocker';
            if (location.pathname.includes('locker')==false){dir = 'sgcc/locker/saveLocker';}
            xhr.open('POST', dir);
            xhr.setRequestHeader('X-CSRF-TOKEN', data.querySelector('input[name="_token"]').value); 
            const formData = new FormData(data);
            xhr.send(formData);       
            
            
        }

        /* ACTUALIZA los datos del PANEL que se ha SELECCIONADO PARA MODIFICAR */
        const uploadPanel = ($time)=>{
            let idpanel = document.getElementById('idlockertext').textContent;
            const btnPaneles = document.querySelectorAll('.btnPanel');
            if (btnPaneles.length>0) {
                btnPaneles.forEach((btn) =>{
                    let lnumber = btn.querySelector('.lnumber');
                    let lname = btn.querySelector('.lname');
                    let ldescription = btn.querySelector('.ldescription');
                    let ltime_access = btn.querySelector('.ltime_access');
                    let lpoint = btn.querySelector('.lpoint');
                    
                    if ((lnumber.textContent.length > 0) && (lnumber.textContent === idpanel)){
                        let xname = document.getElementById('namelocker').value;    
                        let xdescription = document.getElementById('descriptionlocker').value;
                        if (xname.length > 0){
                            lname.textContent = xname;
                            ltime_access.textContent = $time.substring(0,5);
                            ldescription.textContent = xdescription;
                            btn.style.backgroundColor = "#76A9FA"; //azul
                        }else{
                            lname.textContent = '';
                            ltime_access.textContent = '';
                            btn.style.backgroundColor = "white" //blanco
                        }    
                        
                        if ((xdescription.length > 0) && (lpoint.classList.contains('hidden'))){
                            lpoint.classList.toggle('hidden');
                        }
                        if ((xdescription.length === 0) && !(lpoint.classList.contains('hidden'))){
                            lpoint.classList.toggle('hidden');
                        }
                    }else{
                        
                        if (lname.textContent.length > 0){
                            let txt = ltime_access.textContent;
                            var indiceEspacio = txt.indexOf(" ");
                            if (indiceEspacio !== -1) {
                                txt = txt.substring(0, indiceEspacio);
                            } 
                            ltime_access.textContent = txt;
                            btn.style.backgroundColor = "#76A9FA"; //azul
                        }
                                            }
                });      
            }
        }

        /* funcion que EJECUTA la OPCION CLICK DERECHO */
        const freelocker = (blocker)=>{
            let id = blocker.value;
            let lnumber = blocker.querySelector('.lnumber');
            document.getElementById('idlocker').value = id;
            document.getElementById('idlockertext').textContent = lnumber.textContent;
            document.getElementById('namelocker').value = '';
            document.getElementById('descriptionlocker').value = '';
            SaveLocker(formlocker);
            updateStatusPanel();
            
        }

        /* FUNCION CLOSEMENU */
        const closeMenu = (e)=>{
            if (document.getElementById("miOpcion")!=null) {
                if (!menu.contains(e.target)){
                    document.body.removeChild(menu);
                    document.removeEventListener('click', closeMenu); 
                }
            }
        }

        /* Funcion que actualiza los datos de STATUS LOCKER */
        const updateStatusPanel = ()=>{
            
            let xhr;
            if (window.XMLHttpRequest) xhr = new XMLHttpRequest();
            else xhr = new ActiveXObject("Microsoft.XMLHTTP");

            const in_use = document.getElementById('in_use');
            const available = document.getElementById('available');
            
            let dir = 'statusLockers'; 
            if (location.pathname.includes('locker')==false){dir = 'sgcc/locker/statusLockers';}

            xhr.open('GET', dir); // una peticion GET a la url dir
            xhr.addEventListener('load', (data)=>{ //escuchamos un evento para saber cuando la informacion a llegado
                //console.log(typeof data.target.response);  con typeof sabemos el tipo de dato que nos esta llegando.
                const dataJSON = JSON.parse(data.target.response);  //convertimos el string a un formato JSON
                in_use.textContent = (dataJSON['in_use'].toString()).padStart(2,'0'); 
                available.textContent = (dataJSON['available'].toString()).padStart(2,'0'); 
            });
            xhr.send();     
            /* ---------------------------------------------------------------------------------- */
            /* En resumen, se utiliza la solicitud GET cuando se necesita recuperar datos del servidor, 
            mientras que se utiliza la solicitud POST cuando se necesita enviar datos al servidor. */
            /* ---------------------------------------------------------------------------------- */
        }  

        const convertMinHour = (min)=>{
            
            let horas = Math.floor(min / 60); // Obtiene las horas completas
            let minutosRestantes = min % 60; // Obtiene los minutos restantes
            let horasStr = horas < 10 ? "0" + horas : "" + horas;
            let minutosStr = minutosRestantes < 10 ? "0" + minutosRestantes : "" + minutosRestantes;
            let h = horasStr + ":" + minutosStr; // Imprime "02:25"

            return h;

        }

        const differenceMin = (time_a)=>{
            let date_a = new Date(); // crea un objeto de fecha
            date_a.setSeconds(0);
            let partstime = time_a.split(":"); // divide la hora y los minutos en un array
            let hour = parseInt(partstime[0]); // convierte la hora en un número entero
            let minute = parseInt(partstime[1]); // convierte los minutos en un número entero
            date_a.setHours(hour, minute); // establece la hora en el objeto de fecha
            let difference = Math.abs(date_a.getTime() - new Date().getTime());
            let dif_min = Math.floor(difference / 1000 / 60);
            return dif_min;
        }

        /* configuracion del campo Input para crear los Lockers */
/*         const input = document.getElementById('numLockers');
        input.addEventListener('keydown', function(event) {
            event.preventDefault();
        });
        input.addEventListener('wheel', function(event) {
            event.preventDefault();
        });
        input.addEventListener('focus', function(event) {
            this.blur();
        });
        input.addEventListener('input', function(event) {
            if (this.value < this.min) {
                this.value = this.min;
            } else if (this.value > this.max) {
                this.value = this.max;
            }
        }); */

}







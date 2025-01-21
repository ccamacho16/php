const menu = document.querySelectorAll("#menu li");
if (menu){
    menu.forEach(item => {
            item.addEventListener("click", ()=>{
                if (item.querySelector("ul")){
                    const submenu = item.querySelector("ul");
                    submenu.classList.toggle("hidden");
                
                    const img1 = item.querySelector("#img1");
                    img1.classList.toggle("hidden"); 
                
                    const img2 = item.querySelector("#img2");
                    img2.classList.toggle("hidden");            
                }    
            });
    });   
}

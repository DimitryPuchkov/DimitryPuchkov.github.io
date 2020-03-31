var a =0;
    function menu(){
        if(a==0){
            var menuop = document.getElementById('nava');
            menuop.classList.add("none");
            a=1;
        }
        else{
            var menuop = document.getElementById('nava');
            // menuop.classList.add("notvisible");
            menuop.classList.remove("none");
            a=0;
        }

    }
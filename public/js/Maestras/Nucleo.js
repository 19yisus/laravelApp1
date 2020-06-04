const form = document.formulario;
// const formD = document.formularioDelete;
console.log(form);

document.formulario.forEach( f=>{
    console.log(f)
});

// form.forEach( f =>{
//     f.addEventListener('submit',(e)=>{
//         e.preventDefault();
//         console.log(e);
//     })
// });

// form.addEventListener('submit', (e)=>{
//     e.preventDefault();

//     var sel = document.getElementById('SelNu');
//     console.log(sel);

//     if(sel.value != '00'){
//         form.submit();
//     }else{
//         messageFire('error','El tipo de nucleo es obligatorio');
//     }
// });

// formD.addEventListener('submit', (e)=>{
//     e.preventDefault();

//     var res = confirm();

//     if(res){
//         formD.submit();
//     }
// })

function ordenaSelect(){
    const dato = document.getElementById('SelValue');
    const select = document.getElementById('Select');
    
    for(var i = 0; i < select.options.length; i++){
        
        if(select.options[i].value == dato.value){
            select.selectedIndex = i;
            break;
        }
    }
}
function messageFire(type,text){
    Swal.fire({
        'title':type,
        'type':type,
        'text':text
    });
}

function confirm(){
    Swal.fire({
        'title':'Estas Seguro?',
        'text':'Solicitando confirmacion para proceder con la operacion',
        'type':'warning',
        'showCancelButton':true,
        'showConfirmButton':true
    }).then( valor => {

        if(valor.value){
            return true;
        }
    })
}

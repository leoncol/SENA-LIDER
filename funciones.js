
/* funciones para registro */
        function validateForm() {/* valida cada que le undes al boton contraseña y email */
            if(validarCorreo()){;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match");
                debugger;
                return false;
            }
            return true;
            
        }
    return false
    }

function validarCorreo(){
    var inputtxt = document.getElementById('email');
    var valor = inputtxt.value;
    var mensaje ="direccion de correo invalida"
    var mensajeError = document.getElementById("ErrorCorreo");
    if(valor.includes("@")){
        var dominio = valor.split('@')[1];
        if(dominio.includes(".")){
            return true;
        }else {console.log("dominio invalido")
        return false
    }

    }else{
        mensajeError.innerHTML = mensaje
        
        return false
    }

}       
function validaTelefono(){
    var inputtxt = document.getElementById('phone'); 
    var valor = inputtxt.value;
    var mensajeError = document.getElementById("mensajeError");
    for(i=0;i<valor.length;i++){
        if(/[a-zA-Z]/.test(valor)){          
            
            
            mensajeError.innerHTML = "Este campo no puede contener letras.";
                } 
        else{
            
            mensajeError.innerHTML = "";}
    // Verificar si el campo cumple con ciertas condiciones
    if(mensajeError.innerHTML!="Este campo no puede contener letras."){
        if (valor.length != 10) {
        mensajeError.innerHTML = "El telefono debe tener 10 digitos";
    } else {
        mensajeError.innerHTML = "";  // Limpiar el mensaje de error si la verificación es exitosa
    }
            return;
                
    }}

}
function validaContraseña(){
    var password = document.getElementById("password").value;
    var sitio = document.getElementById("errorPass");

    var men = "";
    var men1 = "la contraseña debe contener minimo 8 caracteres. \n";
    var men2 = "la contraseña debe contener al menos 1 mayuscula. \n"


    if(password.length<8){
        men = `${men} ${men1}`
    }
    if(!(/[A-Z]/.test(password))){
        men = `${men} ${men2}`
    }
    sitio.innerHTML = men
}
function contraseñaIgual(){
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("confirmPassword").value;
    var span = document.getElementById("igual");

    if (password!=cpassword){
        span.innerHTML="!!"
    }
}
/**
 * Por Matthias Malek
 */


/*
   id: Opción del menú izquierdo que debe estar activo
   id2 : Si se envía, se le agrega la clase 'in'  al padre para no siga colapada y se activa el submenú id2.
 */

function setActiveMenu(id, id2) {
    $(id).addClass('active');
    if (id2 != null) {
        $(id  + "> ul").addClass('in');   //des-colapsamos el menú con submenú
        $(id2).addClass('active');
    }

}


function cursorWait()
{

    $("*").css("cursor", "wait");
}
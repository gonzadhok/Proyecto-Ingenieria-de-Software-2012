// scrip Rut
function validadorRut(texto)
{	
    var tmpstr = "";	
    for ( i=0; i < texto.length ; i++ )		
        if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
            tmpstr = tmpstr + texto.charAt(i);	
    texto = tmpstr;	
    largo = texto.length;	

    if ( largo < 2 )	
    {		
        alert("Debe ingresar el rut completo")		
        return false;	
    }	

    for (i=0; i < largo ; i++ )	
    {			
        if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
        {			
            alert("El valor ingresado no corresponde a un R.U.T valido");					
            return false;		
        }	
    }	

    var invertido = "";	
    for ( i=(largo-1),j=0; i>=0; i--,j++ )		
        invertido = invertido + texto.charAt(i);	
    var dtexto = "";	
    dtexto = dtexto + invertido.charAt(0);	
    dtexto = dtexto + '-';	
    cnt = 0;	

    for ( i=1,j=2; i<largo; i++,j++ )	
    {		
        //alert("i=[" + i + "] j=[" + j +"]" );		
        if ( cnt == 3 )		
        {			
            dtexto = dtexto + '.';			
            j++;			
            dtexto = dtexto + invertido.charAt(i);			
            cnt = 1;		
        }		
        else		
        {				
            dtexto = dtexto + invertido.charAt(i);			
            cnt++;		
        }	
    }	

    invertido = "";	
    for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
        invertido = invertido + dtexto.charAt(i);	

    if ( revisarDigitoverificador(texto) )		
        return true;	

    return false;
}

function revisarDigitoverificador( crut )
{	
    largo = crut.length;	
    if ( largo < 2 )	
        return false;	
    	
    if ( largo > 2 )		
        rut = crut.substring(0, largo - 1);	
    else		
        rut = crut.charAt(0);	
    dv = crut.charAt(largo-1);	
    revisarDigito( dv );	

    if ( rut == null || dv == null )
        return 0;	

    var dvr = '0'	
    suma = 0	
    mul  = 2	

    for (i= rut.length -1 ; i >= 0; i--)	
    {	
        suma = suma + rut.charAt(i) * mul		
        if (mul == 7)			
            mul = 2		
        else    			
            mul++	
    }	
    res = suma % 11	
    if (res==1)		
        dvr = 'k'	
    else if (res==0)		
        dvr = '0'	
    else	
    {		
        dvi = 11-res		
        dvr = dvi + ""	
    }
    if ( dvr != dv.toLowerCase() )	
    {		
        return false	
    }

    return true
}

function revisarDigito( dvr )
{	
    dv = dvr + ""	
    if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
    {		
        alert("Debe ingresar un digito verificador valido");		
        window.document.form1.rut.focus();		
        window.document.form1.rut.select();		
        return false;	
    }	
    return true;
}

function revisarDigito2( crut )
{	
    largo = crut.length;	
    if ( largo < 2 )	
    {		
        alert("Debe ingresar el rut completo")		
        window.document.form1.rut.focus();		
        window.document.form1.rut.select();		
        return false;	
    }	
    if ( largo > 2 )		
        rut = crut.substring(0, largo - 1);	
    else		
        rut = crut.charAt(0);	
    dv = crut.charAt(largo-1);	
    revisarDigito( dv );	

    if ( rut == null || dv == null )
        return 0	

    var dvr = '0'	
    suma = 0	
    mul  = 2	

    for (i= rut.length -1 ; i >= 0; i--)	
    {	
        suma = suma + rut.charAt(i) * mul		
        if (mul == 7)			
            mul = 2		
        else    			
            mul++	
    }	
    res = suma % 11	
    if (res==1)		
        dvr = 'k'	
    else if (res==0)		
        dvr = '0'	
    else	
    {		
        dvi = 11-res		
        dvr = dvi + ""	
    }
    if ( dvr != dv.toLowerCase() )	
    {		
        alert("EL rut es incorrecto")		
        window.document.form1.rut.focus();		
        window.document.form1.rut.select();		
        return false	
    }

    return true
}

function Rut(texto)
{	
    var tmpstr = "";	
    for ( i=0; i < texto.length ; i++ )		
        if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
            tmpstr = tmpstr + texto.charAt(i);	
    texto = tmpstr;	
    largo = texto.length;	

    if ( largo < 2 )	
    {		
        alert("Debe ingresar el rut completo")		
        window.document.form1.rut.focus();		
        window.document.form1.rut.select();		
        return false;	
    }	

    for (i=0; i < largo ; i++ )	
    {			
        if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
        {			
            alert("El valor ingresado no corresponde a un R.U.T valido");			
            window.document.form1.rut.focus();			
            window.document.form1.rut.select();			
            return false;		
        }	
    }	

    var invertido = "";	
    for ( i=(largo-1),j=0; i>=0; i--,j++ )		
        invertido = invertido + texto.charAt(i);	
    var dtexto = "";	
    dtexto = dtexto + invertido.charAt(0);	
    dtexto = dtexto + '-';	
    cnt = 0;	

    for ( i=1,j=2; i<largo; i++,j++ )	
    {		
        //alert("i=[" + i + "] j=[" + j +"]" );		
        if ( cnt == 3 )		
        {			
            dtexto = dtexto + '.';			
            j++;			
            dtexto = dtexto + invertido.charAt(i);			
            cnt = 1;		
        }		
        else		
        {				
            dtexto = dtexto + invertido.charAt(i);			
            cnt++;		
        }	
    }	

    invertido = "";	
    for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
        invertido = invertido + dtexto.charAt(i);	

    window.document.form1.rut.value = invertido.toUpperCase()		

    if ( revisarDigito2(texto) )		
        return true;	

    return false;
}
// 	validacion  numero 
function soloNumyk(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890k";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false; 
    }
}
//digito verificador onkeypress="return soloNumyk(event)"
function soloNum(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false; 
    }
// solo las letras 
}
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false; 
    }
}
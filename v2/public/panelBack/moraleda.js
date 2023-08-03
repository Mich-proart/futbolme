
function mostrarSelect2(id){ $('#mostrar-select2-'+id).toggle();}
function partidoVer(id){ $('#partido-'+id).toggle();}

function submitPartido (event, form, id){
    event.preventDefault();    
    var url = "moraleda.php";
    var txt = "Partido editado.";
    
    
    .log(txt);
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
            console.log(data);  
           $('#partido-'+id).html(data);
        }
    });
};

function submitJornada (event, form, id){
    event.preventDefault();    
    var url = "moraleda.php";
    var txt = "Jornada editada.";
    
    console.log(txt);
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
            console.log(data);  
           $('#laliga-'+id).html(data);
        }
    });
};


$('.minutas').click(function(){
    //alert('Si entre');
    $('.minutas').each(function(){
        $(this).css('color','black');
        $(this).css('font-weight','');
    });

    var identity = $(this).attr('data');
    $(this).css('color','red');
    $(this).css('font-weight','bold');
    console.log("Identity: " + identity);
    
    $('#contenido-minutas').find('.contenedor-minutas').each(function(){
        var theId = $(this).attr('id');        
        if(theId === identity){
            $(this).show();  
            console.log("Id content: " + theId);
        } else {
            $(this).hide();
        }
    });
});

$('.contentTorneo').click(function(){
    //alert('Si entre');
    $('.contentTorneo').each(function(){
        $(this).css('color','black');
        $(this).css('font-weight','');
    });

    var identity = $(this).attr('data');
    $(this).css('color','red');
    $(this).css('font-weight','bold');
    console.log("Identity: " + identity);
    
    $('#contenido-torneos').find('.contenedor-torneo').each(function(){
        var theId = $(this).attr('id'); 

        console.log("id: " + theId);

        if(theId == identity){
            $(this).show();  
            console.log("Id content: " + theId);
        } else {
            $(this).hide();
        }
    });
});

$('.contentLiga').click(function(){
    //alert('Si entre');
    $('.contentLiga').each(function(){
        $(this).css('color','black');
        $(this).css('font-weight','');
    });

    var identity = $(this).attr('data');
    $(this).css('color','red');
    $(this).css('font-weight','bold');
    console.log("Identity: " + identity);
    
    $('#liga').find('.contenedor-liga').each(function(){
        var theId = $(this).attr('id');        
        if(theId === identity){
            $(this).show();  
            console.log("Id content: " + theId);
        } else {
            $(this).hide();
        }
    });
});

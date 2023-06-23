function RecupererValeurSelectUpdateRub()
{
    var slctelm=document.getElementById("selection");
    var valslct=slctelm.value;
    AfficherTableauUpRub(valslct);
}



function RecupererValeurSelectForBP()
{
    var slctelm=document.getElementById("selectionemp");
    var valslct=slctelm.value;
    AfficherTableauEmp(valslct);
    
}

function RecForVisBullsEmps()
{
    var slctelm=document.getElementById("selectionent1");
    var valslct=slctelm.value;
    AfficherOtherSelectForEmps(valslct);
}



function AfficherOtherSelectForEmps(data)
{
    $.get("get_data_VisBP.php?valslct="+data,function(rep)
    {
        $("#messageselection").html("<h2><b>Veillez choisir un employé</b></h2> ");
        $("#tableauResultatemp2").html(rep);
    });
}
function AfficherTableauEmp(data)
{
    $.get("get_data_Bp.php?valslct="+data,function(rep)
    {
        $("#tableauResultatemp").html(rep);
    
    });
}


function AfficherTableauUpRub(data)
{
    $.get("get_data_uprub.php?valslct="+data,function(rep)
    {
        $("#tableauResultat").html(rep);
    });
}





    

function CalculerIGR(salairebase,cnss,amo)
{
    var calc;
    var abb;
    var FP;
    if(salairebase<=6500) FP=salairebase*0.35;
    else FP=salairebase*0.25;
    if((salairebase<=2500) && (0<=salairebase)) abb=0;
    else if((salairebase<=4166) && (2501<=salairebase)) abb=250;
    else if((salairebase<=5000) && (4167<=salairebase)) abb=666.67;
    else if((salairebase<=6666) && (5001<=salairebase)) abb=1166.67;
    else if((salairebase<=15000) && (6667<=salairebase)) abb=1433.33;
    else abb=2033.33;
    calc=((salairebase-cnss-amo-FP)*0.34)-abb;
    return calc;
}
function Calculer(a,salairbase)
    {
        var calc;
        switch(a)
        {
            case 1 : calc=salairbase*0.0448;
                    return calc;
            case 3 :calc=salairbase *0.0228;
                    return calc;
        }
    }

function Modifier()
{
    $(".settings").click(function() {
        var id = $(this).data('id');
        var nom = $(this).data('nom');
        var regle = $(this).data('regle');
    
        $("#input-id").val(id);
        $("#libelle_rub").val(nom);
        $("#regle_de_calcul").val(regle);
        $("#ModifierModal").modal("show");
    });
}



// function ValiderChangement()
// {
//     var nom=document.getElementById("libelle_rub");
//     var regle=document.getElementById("regle_de_calcul");
//     console.log(nom);
//     console.log(regle);
// }

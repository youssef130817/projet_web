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

function Generer_Bp()
{
    $(".settings").click(function() {
        var nomsoc = $(this).data('nomsoc');
        var adsoc = $(this).data('adrsoc');
        var cnsscos = $(this).data('cnsscos'); 
        var idemp=$(this).data('idemp'); 
        var sbase=$(this).data('Sbase'); 
        var nomemp=$(this).data('nomemp'); 
        var premp=$(this).data('premp'); 
        var cin=$(this).data('cin'); 
        var sfam=$(this).data('sfam'); 
        var cnssemp=$(this).data('cnssemp'); 
        var daten=$(this).data('daten'); 
        var modep=$(this).data('modep'); 
        var nbrenf=$(this).data('nbrenf'); 
        

        $("#input-nomsoc").val(nomsoc);
        $("#input-adsoc").val(adsoc);
        $("#input-cnsscos").val(cnsscos);
        $("#input-idemp").val(idemp);
        $("#input-sbase").text(sbase);
        $("#input-nomemp").val(nomemp);
        $("#input-prenemp").val(premp);
        $("#input-cinemp").val(cin);
        $("#input-sfamemp").val(sfam);
        $("#input-cnssemp").val(cnssemp);
        $("#input-dnemp").val(daten);
        $("#input-modep").val(modep);
        $("#input-nbreemp").val(nbrenf);
        $("#BulletinPaie").modal("show");
    });
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

function AjouterRub()
{
    var name=document.getElementById("addnom").value;
    var type=document.getElementById("GR").value;
    var regle=document.getElementById("formulaInput").value;
}


// function ValiderChangement()
// {
//     var nom=document.getElementById("libelle_rub");
//     var regle=document.getElementById("regle_de_calcul");
//     console.log(nom);
//     console.log(regle);
// }

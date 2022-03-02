@extends('layouts.app')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">
@endsection
@section("title","Inscription visiteur") 
@section("content")
<div id="centre"></div>

<script>
    $( document ).ready(function() {
        begin();
    });

    function begin(){
        $(".t1").remove();
        $(".t2").remove();
        $("#b1").remove();
        $("#form1").remove();
        $("#centre").append($("<h1>").text("Soumettre une demande d'inscription.").attr("class","t1"));
        $("#centre").append($("<button>").text("Etudiant résident de l'UE").attr("onClick", "ue()").attr("class","t1"));
        $("#centre").append($("<button>").text("Etudiant non résident de l'UE").attr("onClick", "pasUe()").attr("class","t1"));
    }

    function ue(){
        $("#centre").append($("<h1>").text("Vous inscrivez-vous pour la première fois dans l'enseignement supérieur ?").attr("class","t2"));
        $("#centre").append($("<button>").text("oui").attr("onClick", "premierFois()").attr("class","t2"));
        $("#centre").append($("<button>").text("non").attr("onClick", "pasPremierFois()").attr("class","t2"));
        $(".t1").remove();
        $("#centre").append($("<button>").text("Retour").attr("onclick","begin()").attr("id", "b1"));
    }
    function pasUe(){
        $("#centre").append($("<h1>").text("Etes-vous un étudiant ressortissant d'un état tiers à l'union européenne ou assimilé à un étudiant de l'ue?").attr("class","t2"));
        $("#centre").append($("<button>").text("oui").attr("onClick", "ressortisant()").attr("class","t2"));
        $("#centre").append($("<button>").text("non").attr("onClick", "pasPremierFois()").attr("class","t2"));
        $(".t1").remove();
        $("#centre").append($("<button>").text("Retour").attr("onclick","begin()").attr("id", "b1"));
    }
    function premierFois(){
        var string = "<form id='form1' action='{{ route('inscriptionV')}}' method='post' enctype='multipart/form-data' >" + 
        '@csrf' +
        "<label for='nom'> Nom : </label>" +
        "<input type='text' name='nom' required> " +
        "<label for='prenom'> Prenom : </label>" +
        "<input type='text' name='prenom' required>" +
        "<label for='tel'> Numéro de téléphone : </label>" +
        "<input type='text' name='tel' required>" +
        "<label for='bloc'>Bloc : </label>" +
        "<input type='number' value='1' name='bloc' required readonly>" +
        "<label for='opt'>Option : </label>" +
        "<select name='opt' required>" +
        "<option value='G' selected='selected'>Gestion</option>" +
        "<option value='R'>Réseau</option>" +
        "<option value='I'>Industriel</option>" +
        "</select>" +
        "<label for='ci'>Carte d'identité : </label>" +
        "<input type='file' name='ci' required>" +
        "<label for='cm'>Composition ménage : </label>" +
        "<input type='file' name='cm' required>" +
        "<label for='dp'>Diplome/CESS : </label>" +
        "<input type='file' name='dp' required>" +
        "<input type='submit'>" +
        "</form>";
        $("#centre").html(string);
        $(".t2").remove();
        $("#centre").append($("<button>").text("Retour").attr("onclick","begin()").attr("id", "b1"));
    }
    function pasPremierFois(){
        var string = "<form id='form1' action='{{ route('inscriptionV')}}' method='post' enctype='multipart/form-data'>" + 
        '@csrf' +
        "<label for='nom'> Nom : </label>" +
        "<input type='text' name='nom' required> " +
        "<label for='prenom'> Prenom : </label>" +
        "<input type='text' name='prenom' required>" +
        "<label for='tel'> Numéro de téléphone : </label>" +
        "<input type='text' name='tel' required>" +
        "<label for='ci'>Carte d'identité : </label>" +
        "<label for='bloc'>Bloc : </label>" +
        "<select name='bloc' required disabled>" +
        "<option value='1' selected='selected'>1</option>" +
        "<option value='2'>2</option>" +
        "<option value='3'>3</option>" +
        "</select>" +
        "<label for='opt'>Option : </label>" +
        "<select name='opt' required>" +
        "<option value='G' selected='selected'>Gestion</option>" +
        "<option value='R'>Réseau</option>" +
        "<option value='I'>Industriel</option>" +
        "</select>" +
        "<input type='file' name='ci' required>" +
        "<label for='cm'>Composition ménage : </label>" +
        "<input type='file' name='cm' required>" +
        "<label for='dp'>Diplome/CESS : </label>" +
        "<input type='file' name='dp' required>" +
        "<label for='ds'>Diplome fin étude supérieure : </label>" +
        "<input type='file' name='ds' required>" +

        "<label for='re'>Récapitulatif des 5 dernières années : </label>" +
        "<input type='file' name='re' required>" +
        "<p>Si étuide/formation : </p>" +
        
        "<label for='rn'>Relevé de notes : </label>" +
        "<input type='file' name='rn' required>" +
        "<label for='ad'>Attestation d'apurement de dettes : </label>" +
        "<input type='file' name='ad' required>" +
        "<label for='av'>Attestation visite médicale : </label>" +
        "<input type='file' name='av' required>" +
        "<p>Si chômage : </p>" +

        "<label for='actiris'>Le ruling Actiris/ONEM/VDAB : </label>" +
        "<input type='file' name='actiris' required>" +
        "<label for='dispense'>L'attestation de non délivrance de dispense de pointage : </label>" +
        "<input type='file' name='dispense' required>" +
        "<p>Si travail : </p>" +

        "<label for='trv'>Attestion de/du employeur ou contrat de travail : </label>" +
        "<input type='file' name='trv' required>" +
        
        "<p>Si année sabatique : </p>" +

        "<label for='honneur'>Compléter la déclaration sur l'honneur : </label>" +
        "<input type='file' name='honneur' required>" +
        "<input type='submit'>" +
        "</form>";

        $("#centre").html(string);
        $(".t2").remove();
        $("#centre").append($("<button>").text("Retour").attr("onclick","begin()").attr("id", "b1"));
    }
    
    function ressortisant(){
        var string = "<form id='form1' action='{{ route('inscriptionV')}}' method='post' enctype='multipart/form-data'>" + 
        '@csrf' +
        "<p> Si parents résident en Belgique : </p>" +
        "<label for='pci'> Carte identité : </label>" +
        "<input type='file' name='pci' required>" +

        "<p> Si réfugié : </p>" +
        "<label for='ref'> Attestation de votre statut de réfugié : </label>" +
        "<input type='file' name='ref' required>" +

        "<p> Si travail : </p>" +
        "<label for='trav'> Permis de travail C + attestation de l'employeur/contrat de travail + fiche de paye des 6 derniers mois: </label>" +
        "<input type='file' name='trav' required>" +

        "<p> Si Prise en charge par CPAS : </p>" +
        "<label for='cpas'> Attestation : </label>" +
        "<input type='file' name='cpas' required>" +

        "<p> Si mariage/ cohabitation légale : </p>" +
        "<label for='mariage'> Carte d'identité du conjoint (séjour 5 ans) + contrat de travail du conjoint ou attestation de l'employeur : </label>" +
        "<input type='file' name='mariage' required>" +
        "<input type='text' name='userId' value='{{Auth::id()}}' hidden>" +
        "<input type='submit'>" +
        "</form>";
        $("#centre").html(string);
        $(".t2").remove();
        $("#centre").append($("<button>").text("Retour").attr("onclick","begin()").attr("id", "b1"));
    }
</script>
@endsection
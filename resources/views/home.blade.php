@extends('layouts.app')

@section("head")
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">
@endsection
@section("title","He2B ESI") 
@section("content")
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="text-center">
            <h1>Bienvenue sur le site de l'ESI ! </h1>
            @guest
                <button type="button" class="btn btn-primary btn-lg" 
                onclick="window.location.href='/login'">Se connecter</button>
                <button type="button" class="btn btn-secondary btn-lg" 
                onclick="window.location.href='/register'">Créer un compte</button>
            @endguest
        </div>
        @hasrole('Administrative staff|Admin')
            <div>
                <br>
                <h3>Statistiques</h3>
                <p>Il y a 
                    <strong>{{$countStudent}} étudiants</strong>
                :</p>
                <ul>
                    <li id="insc">{{$countStdInscrit}} étudiants inscrits</li>
                    <li id="nonInsc">{{$countStdNotInscrit}} étudiants non inscrits</li>
                </ul> 
                
                <div class="box" style="--p:100*({{$countStdInscrit}}/{{$countStudent}}); width:300px;"></div>
            </div>
        @endhasrole
        @unlessrole('Admin|Administrative staff|cavp staff')
            <div>
                <br>
                <h3>Présentation</h3>
                L'ESI délivre le grade de BA (Bachelier/Bachelor) en Informatique. La durée des études est de trois ans, et il y a trois sections:
                    <ul>
                        <li> 
                            <a target="_blank" href="https://www.he2b.be/campus-esi/27-esi/95-informatique-de-gestion">
                            Informatique de gestion</a> 
                        </li>
                        <li> 
                            <a target="_blank" href="https://www.he2b.be/campus-esi/27-esi/96-informatique-industrielle">
                                Informatique et systèmes : finalité industrielle</a> 
                        </li>
                        <li> 
                            <a target="_blank" href="https://www.he2b.be/campus-esi/27-esi/97-telecommunications-et-reseaux">
                                Informatique et systèmes : finalité réseaux et télécommunication</a>
                        </li>
                    </ul>          
                
                Depuis septembre 2010, l'ESI organise une année de :
                    <ul>
                        <li> 
                            <a target="_blank" href="https://www.he2b.be/campus-esi/27-esi/103-specialisation-en-securite-des-reseaux-et-systemes-informatiques">
                            Spécialisation en sécurité des réseaux et systèmes informatiques.</a>
                        </li>
                    </ul> 
                
                Depuis septembre 2016, l'ESI participe au :
                    <ul>
                        <li> 
                            <a target="_blank" href="https://www.he2b.be/campus-esi/27-esi/76-master-en-cybersecurite">
                            Master en cybersécurité en co-diplômation avec différents partenaires.</a> 
                        </li>
                    </ul>
            </div>
            <div>
                <h3>Tronc commun</h3>
                <p> Dès la première année, les trois programmes s'appuyent sur un tronc commun qui inclut les cours de mathématiques, de statistique, 
                de communication en français et en anglais, d'analyse et de bases de données, de programmation, de systèmes d'exploitation, de 
                réseaux et de structure des ordinateurs. Des cours spécifiques à chaque orientation complètent ce cursus commun. 
                    <a target="_blank" href="https://www.he2b.be/images/ESI/pdf/grilles_comp.pdf"> (voir tableau comparatif des grilles des différentes sections)</a>
                </p>

                <p>Conformément au Processus de Bologne et au Décret Paysage de l'enseignement supérieur, le programme de chaque section correspond à 
                180 ECTS pour les 3 années : 150 ECTS pour la formation à l'école et 30 ECTS pour le stage en entreprise durant le second semestre 
                de la dernière année d'étude.</p>

                <p>La pondération des unités d'enseignements pour la délibération finale du grade dans chaque section est proportionnelle au nombre 
                d'ECTS : 1 par tranche de 5 ECTS</p>
            </div>
            <div>
                <h3>Débouchés</h3>
                <p>Dans un secteur en plein développement, notre diplôme de BA (Bachelier/Bachelor) en informatique est un atout majeur pour 
                    l'emploi : plus de 95% de nos diplômés trouvent un emploi dans les trois mois.</p>
                <p>Les débouchés sont nombreux: analyste-programmeur·se, développeur·se d'applications, chef·fe de projet, programmeur·se système, 
                    responsable réseau, administrateur·trice de bases de données, formateur·trice, délégué·e commercial, consultant·e en 
                    informatique, etc., dans des secteurs variés, de la PME à la grosse société multinationale, de la banque à l'exploitation 
                    agricole, de l'industrie à l'entreprise humanitaire, etc.</p>
            </div>
            <div>
                <h3>Principes pédagigiques de l'ESI</h3>
                <ul>
                    <li>Former des informaticiens capables de s'adapter à l'évolution rapide et constante des nouveaux systèmes et des nouvelles 
                        techniques informatiques.</li>
                    <li>Fournir un enseignement de base de qualité ainsi qu'une formation pratique de haut niveau.</li>
                    <li>Assurer un suivi personnalisé de chaque étudiant·e lors des travaux pratiques en laboratoire (programmation sur PC, atelier 
                        de génie logiciel, base de données, systèmes d'exploitation, microprocesseurs, automates programmables, électronique...)</li>
                </ul> 
            </div>
            <div>
                <h3>Stage de fin d'étude en Belgique ou à l'étranger</h3>
                <p>La dernière année se termine par un stage de 15 semaines en entreprise offrant aux personnes en fin d'étude l'occasion de se 
                    plonger dans le monde du travail belge ou international.</p>
                <p>Ce stage met en lumière la compétence et les facultés d'adaptation des étudiants et étudiantes de l'ESI, qualités que les 
                    employeurs recherchent et apprécient. C'est aussi un tremplin fréquent pour l'emploi belge ou étranger.</p>
                <a target="_blank" href="https://www.he2b.be/se-former-esi/27-esi/218-stages-esi">Plus d'infos</a>
                <br>
            </div>
            <div>
                <h3>L'environnement et le matériel</h3>
                <p>L'ESI est installée depuis février 2001 dans un bâtiment confortable et spacieux. Les logiciels et matériels installés à l'ESI 
                    et utilisés par les étudiants et les étudiantes connaissent une évolution constante parallèle à celle du marché de 
                    l'informatique.</p>
                <p>La configuration informatique mise à la disposition des étudiants et étudiantes donne une ouverture sur tous les types 
                    d'ordinateurs et de matériels rencontrés sur le marché:</p>
                <ul>
                    <li>un parc de micro-ordinateurs en réseau local tournant sur divers systèmes d'exploitation permettant la réalisation d'un 
                        grand nombre d'applications du type gestion ou du type industriel;</li>
                    <li>en section industrielle, des automates programmables et de nombreux appareillages électroniques permettent de travailler sur 
                        des techniques informatiques de pointe utilisés dans l'industrie;</li>
                    <li>dans l'option réseaux et télécommunications, des routeurs, des commutateurs et appareillages électroniques permettent de 
                        travailler sur des techniques d'interconnexion de pointe en matière des télécoms.</li>
                </ul>
            </div>
            <div>
                <h3>Compétences à acquérir</h3>
                <p>Les programmes de l'ESI sont constitués d'unités d'enseignements qui correspondent aux compétences que nous voulons permettre à 
                    nos étudiants et étudiantes de développer progressivement dans un schéma idéal de trois ans.</p>
                <h5>
                    <strong>Compétences citoyennes et professionnelles</strong>
                </h5>
                <p>N'oublions pas que la vie d'étudiant ne se limite pas à étudier servilement ; l'institution académique donne l'occasion à chacun 
                    et chacune de développer des compétences citoyennes et professionnelles, notamment empathie, fiabilité et autonomie, au travers 
                    d'actes nécessaires tels que :</p>
                <ul>
                    <li>remplir à temps ses devoirs administratifs vis-à-vis de l'institution;</li>
                    <li>gérer sa vie (santé, vie quotidienne, etc) en s'adressant à temps aux services d'aide que l'institution offre;</li>
                    <li>organiser son étude en s'aidant à temps des conseils prodigués par le corps enseignant et en prenant à temps des initiatives 
                        adaptées;</li>
                    <li>participer éventuellement à la représentation institutionnelle des étudiants afin de mieux comprendre le fonctionnement 
                        d'une organisation, ce qui peut se révéler utile à l'informaticien et à l'informaticienne.</li>
                </ul>
                <h5>
                    <strong>Compétences informatiques communes aux trois bachelors initiaux</strong>
                </h5>
                <ul>
                    <li>Participer à l'analyse d'un système d'information (ensemble de données et de processus constitutifs d'une organisation) et 
                        collaborer à la mise en œuvre d'une application informatique (ensemble de données et d'algorithmes automatisant tout ou 
                        partie du système d'information analysé) en envisageant les évolutions possibles. à temps ses devoirs administratifs 
                        vis-à-vis de l'institution;</li>
                    <li>Prévoir toutes les possibilités de résultats fournis par une application informatique, la tester, la sécuriser et la 
                        documenter.</li>
                    <li>Communiquer dans plusieurs langues (écouter, expliquer, rédiger, présenter des écrans, vérifier que le message a bien été 
                        compris) et s'insérer dans un projet ou participer à sa gestion (structurer, planifier, coordonner, gérer de manière 
                        rigoureuse les actions et les tâches liées à sa mission, travailler en équipes d'informaticiens, en équipes 
                        multidisciplinaires ou en équipes multiculturelles).</li>
                    <li>S'adapter rapidement à un nouvel environnement professionnel et à son évolution, en respecter les réglementations en vigueur, 
                        en apprécier les aspects éthiques et sociétaux.</li>
                    <li>Apprendre par soi-même, exercer un esprit critique par rapport aux nouveautés en différenciant ce qui relève du phénomène de 
                        mode et ce qui pourrait être une avancée solide à long terme.</li>
                </ul>
            </div>
        @endunlessrole
        
    </div>
</div>
@endsection

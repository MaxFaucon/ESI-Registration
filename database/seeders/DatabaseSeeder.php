<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Seeders\CreateAdministrativeTableSeeder;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\CreateStudentTableSeeder;
use Database\Seeders\CreateCavpTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PermissionTableSeeder::class, CreateAdministrativeTableSeeder::class, CreateStudentTableSeeder::class,
                        CreateAdminUserSeeder::class, CreateCavpTableSeeder::class]);


        DB::table('courses')->insert([

            #Quadrimestre 1
            [
                'acronym'=> 'DEV1',
                'title' => 'Developpement I',
                'ects' => 10,
                'hours' => 114,
                'quad' => 1,
                'opt' => 'GIR',
            ],
            [
                'acronym'=> 'CAI1',
                'title' => 'Communication anglophone contextualisée I',
                'ects' => 2,
                'hours' => 24,
                'quad' => 1,
                'opt' => 'GIR',
            ],
            [
                'acronym'=> 'CPT1',
                'title' => 'Comptabilité générale',
                'ects' => 2,
                'hours' => 24,
                'quad' => 1,
                'opt' => 'GIR',
            ],
            [
                'acronym'=> 'INT1',
            'title' => 'Introduction à l informatique',
            'ects' => 10,
            'hours' => 108,
            'quad' => 1,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'MAT1',
            'title' => 'Mathématiques contextualisée',
            'ects' => 6,
            'hours' => 72,
            'quad' => 1,
            'opt' => 'GIR',
            ],
            #Quadrimestre 2
            [
            'acronym'=> 'ALG2',
            'title' => 'Algorithmique II',
            'ects' => 2,
            'hours' => 24,
            'quad' => 2,
            'opt' => 'GIR',],
            [
                'acronym'=> 'ANA2',
            'title' => 'Analayse I',
            'ects' => 2,
            'hours' => 24,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'CAI2',
            'title' => 'Communication anglophone contextualisée II',
            'ects' => 2,
            'hours' => 24,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'DEV2',
            'title' => 'Développement II',
            'ects' => 6,
            'hours' => 60,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            
            [
                'acronym'=> 'DON2',
            'title' => 'Persistance des données I',
            'ects' => 5,
            'hours' => 48,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'MIC2',
            'title' => 'Microprocesseurs',
            'ects' => 3,
            'hours' => 48,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'STA2',
            'title' => 'Statistique contextualisée',
            'ects' => 3,
            'hours' => 48,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'SYS2',
            'title' => 'Systèmes d exploitations I',
            'ects' => 2,
            'hours' => 24,
            'quad' => 2,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'WEB2',
            'title' => 'Développement web I',
            'ects' => 5,
            'hours' => 60,
            'quad' => 2,
            'opt' => 'G',
            ],
            
            [
                'acronym'=> 'PHYIR',
            'title' => 'Physique I',
            'ects' => 3,
            'hours' => 48,
            'quad' => 2,
            'opt' => 'IR',
            ],
            [
                'acronym'=> 'RESIR2',
                'title' => 'Réseaux I',
                'ects' => 2,
                'hours' => 24,
                'quad' => 2,
                'opt' => 'IR',
            ],

            #Quadrimestre 3
            [
                
            'acronym'=> 'DEV3',
            'title' => 'Développement III',
            'ects' => 6,
            'hours' => 72,
            'quad' => 3,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'DON3',
            'title' => 'Persistance des données II',
            'ects' => 5,
            'hours' => 48,
            'quad' => 3,
            'opt' => 'GIR',         

            ],
            [
                'acronym'=> 'ANA3',
            'title' => 'Analyse II',
            'ects' => 4,
            'hours' => 48,
            'quad' => 3,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'ALG3',
            'title' => 'Algorithmique III',
            'ects' => 4,
            'hours' => 48,
            'quad' => 3,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'ATLG3',
            'title' => 'Atelier logiciel I',
            'ects' => 5,
            'hours' => 48,
            'quad' => 3,
            'opt' => 'G',],
            [
                'acronym'=> 'CAI3',
            'title' => 'Communication anglophone contextualisée III',
            'ects' => 3,
            'hours' => 48,
            'quad' => 3,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'AUTI3',
            'title' => 'Automates programmables I',
            'ects' => 5,
            'hours' => 48,
            'quad' => 3,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'LANR3',
            'title' => 'Réseaux LAN',
            'ects' => 5,
            'hours' => 60,
            'quad' => 3,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'PHYR3',
            'title' => 'Physique II',
            'ects' => 2,
            'hours' => 24,
            'quad' => 3,
            'opt' => 'R',
            ],
            #Quadrimestre 4
            [
                'acronym'=> 'DEV4',
            'title' => 'Développement IV',
            'ects' => 3,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'DON4',
            'title' => 'Persistance des données III',
            'ects' => 3,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'CPTG4',
            'title' => 'Comptabilité contextualisée II',
            'ects' => 2,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'ECOG4',
            'title' => 'Economie contextualisée',
            'ects' => 3,
            'hours' => 36,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'ATLG4',
            'title' => 'Atelier logiciel II',
            'ects' => 4,
            'hours' => 48,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'ERGG4',
            'title' => 'Ergonomie du logiciel',
            'ects' => 2,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'LDPG4',
            'title' => 'Laboratoire de persistance de donnée III',
            'ects' => 2,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'SECG4',
            'title' => 'Sécurité',
            'ects' => 2,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'CPRG4',
            'title' => 'Complément réseaux',
            'ects' => 2,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'ATLIR4',
            'title' => 'Atelier logiciel I',
            'ects' => 5,
            'hours' => 48,
            'quad' => 4,
            'opt' => 'IR',
            ],
            [
                'acronym'=> 'EMBI4',
            'title' => 'Systèmes embarqués',
            'ects' => 5,
            'hours' => 60,
            'quad' => 4,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'AGRI4',
                'title' => 'Administration et gestion des réseaux',
                'ects' => 2,
                'hours' => 24,
                'quad' => 4,
                'opt' => 'I',
            ],
            [
                'acronym'=> 'AVAI4',
            'title' => 'Aquisition, visualisation et analyse',
            'ects' => 5,
            'hours' => 84,
            'quad' => 4,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'IOTI4',
            'title' => 'Réseaux IOT',
            'ects' => 2,
            'hours' => 36,
            'quad' => 4,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'IMGI4',
                'title' => 'Traitement et analyse d image I',
                'ects' => 1,
                'hours' => 12,
                'quad' => 4,
                'opt' => 'I',
            ],
            [
                'acronym'=> 'RLII4',
            'title' => 'Réseaux locaux industriels',
            'ects' => 5,
            'hours' => 48,
            'quad' => 4,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'ATLR4',
            'title' => 'Administration et gestion des réseaux I',
            'ects' => 2,
            'hours' => 36,
            'quad' => 4,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'AGWR4',
            'title' => 'Administration et gestion des réseaux windows I',
            'ects' => 2,
            'hours' => 36,
            'quad' => 4,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'WANR4',
            'title' => 'Réseaux WAN',
            'ects' => 5,
            'hours' => 6,
            'quad' => 4,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'WIRR4',
            'title' => 'Réseaux sans fils et mobiles',
            'ects' => 4,
            'hours' => 36,
            'quad' => 4,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'SYS34',
            'title' => 'Systèmes d exploitation',
            'ects' => 5,
            'hours' => 72,
            'quad' => 4,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'WEBG34',
            'title' => 'Développement web II',
            'ects' => 3,
            'hours' => 24,
            'quad' => 4,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'WEBR34',
            'title' => 'Développement web',
            'ects' => 5,
            'hours' => 72,
            'quad' => 4,
            'opt' => 'R',
            ],
            #Quadrimestre 5
            [        
            'acronym'=> 'VEI5',
            'title' => 'Veilles technologiques',
            'ects' => 1,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'GIR',
            ],
            [
                'acronym'=> 'PRJG5',
                'title' => 'Gestion de projet',
                'ects' => 5,
                'hours' => 72,
                'quad' => 5,
                'opt' => 'G',
            ],
            [
                'acronym'=> 'ORGG5',
            'title' => 'Organisation et entreprise',
            'ects' => 3,
            'hours' => 36,
            'quad' => 5,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'ERPG5',
            'title' => 'Progiciel de gestion intégré',
            'ects' => 5,
            'hours' => 48,
            'quad' => 5,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'MOBG56',
            'title' => 'Développement mobile',
            'ects' => 5,
            'hours' => 48,
            'quad' => 5,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'WEBG56',
            'title' => 'Développement web III',
            'ects' => 3,
            'hours' => 48,
            'quad' => 5,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'DONG56',
            'title' => 'Persistance des données IV',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'G',
            ],
            ['acronym'=> 'SYSG56',
            'title' => 'Système d exploitation III',
            'ects' => 4,
            'hours' => 36,
            'quad' => 5,
            'opt' => 'G',
            ],
            [
                'acronym'=> 'ORGIR5',
            'title' => 'Organisation des entreprises',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'IR',
            ],
            [
                'acronym'=> 'ANLIR5',
            'title' => 'Laboratoire d analyse III',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'IR',
            ],
            [
                'acronym'=> 'ATLIR5',
            'title' => 'Atelier logiciel II',
            'ects' => 4,
            'hours' => 48,
            'quad' => 5,
            'opt' => 'IR',
            ],
            [
                'acronym'=> 'RELI5',
            'title' => 'Electronique, mécanique et programmation appliquée à la robotique humanoïde',
            'ects' => 3,
            'hours' => 40,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'ROBI5',
            'title' => 'Robotique',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'AUTI5',
            'title' => 'Automates programmables II',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'STRI5',
            'title' => 'Système d exploitation temps réel',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'IMGI5',
            'title' => 'Traitement et analyse d image II',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'PIAI5',
            'title' => 'Projet intelligence artificielle',
            'ects' => 2,
            'hours' => 28,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'IEII5',
            'title' => 'Interfaçage d équipements industriels',
            'ects' => 2,
            'hours' => 16,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'SECI5',
            'title' => 'Eléments de sécurité informatique',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'PRJI5',
            'title' => 'Projet transversal',
            'ects' => 2,
            'hours' => 24,
            'quad' => 5,
            'opt' => 'I',
            ],
            [
                'acronym'=> 'IXVR55',
            'title' => 'Réseaux et télécommunication',
            'ects' => 5,
            'hours' => 60,
            'quad' => 5,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'AGRR5',
            'title' => 'Administration et sécurité des réseaux II',
            'ects' => 7,
            'hours' => 72,
            'quad' => 5,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'SECR5',
            'title' => 'Sécurité',
            'ects' => 4,
            'hours' => 35,
            'quad' => 5,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'PRJR5',
            'title' => 'Projet transversal',
            'ects' => 3,
            'hours' => 36,
            'quad' => 5,
            'opt' => 'R',
            ],
            [
                'acronym'=> 'ETE6',
            'title' => 'Epreuve terminale',
            'ects' => 30,
            'hours' => 650,
            'quad' => 6,
            'opt' => 'GIR',
            ],
        ]);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\PaeController;
use App\Models\PaeModel;
use App\Models\Course;

class PaeTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_pae_student()
    {
        Course::addMyCours("ATLG3", "Atelier logiciel 1", 5, 78, 3, "G");
        PaeModel::ajout(25568, ["ATLG3"]);

        $this->assertDatabaseHas('pae', [
            'matricule' => 25568,
            'acronym' => "ATLG3",
        ]);
        PaeModel::renvoie(25568);
        Course::DropMyCours("ATLG3");

    }
    public function test_drop_pae_student()
    {
        Course::addMyCours("ATLG4", "Atelier logiciel 2", 5, 78, 4, "G");
        PaeModel::ajout(35568, ["ATLG4"]);
        PaeModel::renvoie(35568);
        $this->assertDeleted('pae', [
            'matricule' => 35568,
        ]);
        Course::DropMyCours("ATLG4");
    }
}

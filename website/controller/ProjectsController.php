<?php

use Ellimac\Controller;

class ProjectsController extends Controller
{
    //TODO: Projekt-Controller schreiben
    public function listAction()
    {
        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
        $list = 'SELECT pro_name, pro_url, sta_id FROM project';

        // 2. Befehl: Übergebe alle Projekte ans View

    }

    public function addAction()
    {
        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts
        $new = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project';
        $new .= 'SELECT tas_id, pro_id, sta_id FROM project_has_task';

        // 2. Befehl: Übergeben diese Daten dem View


        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)

    }

    public function detailAction()
    {
        // Logik für Projekt-Detail

        // 1. Befehl: Hole mir alle Projekt-Daten
        $detail = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project WHERE pro_id=' . $id .
        'UNION' . ' '
        'SELECT tas_id, pro_id, pt_state FROM project_has_task WHERE pro_id=' . $id;

        // 2. Befehl: Übergeben diese Daten dem View
    }

    public function editAction()
    {
        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten
        $edit = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project WHERE pro_id=' . $id;

        // 2. Befehl: Übergeben diese Daten dem View


        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)

    }

}
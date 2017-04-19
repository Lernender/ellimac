<?php

class ProjectsController
{
    //TODO: Projekt-Controller schreiben
    public function listAction()
    {
        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
        $list = 'SELECT pro_name, pro_url, sta_id FROM project';
        echo $list;

        // 2. Befehl: Übergebe alle Projekte ans View

    }

    public function newProjectAction()
    {
        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts
        $new = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project';
        echo $new;

        // 2. Befehl: Übergeben diese Daten dem View


        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)

    }

    public function projectDetailAction()
    {
        // Logik für Projekt-Detail

        // 1. Befehl: Hole mir alle Projekt-Daten
        $detail = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project WHERE pro_id = ' . $id ;
        echo $detail;
        // 2. Befehl: Übergeben diese Daten dem View
    }

    public function editProjectAction()
    {
        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten
        $edit = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project WHERE pro_id = ' . $id;
        echo $edit;

        // 2. Befehl: Übergeben diese Daten dem View


        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)

    }

}
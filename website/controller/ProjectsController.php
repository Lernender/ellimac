<?php

namespace Website\Controller;

use Ellimac\Controller;
use Ellimac\Model\Database;

class ProjectsController extends Controller
{

    //TODO: Projekt-Controller schreiben
    public function listAction()
    {
        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
        $list = 'SELECT pro_name, pro_url, sta_id FROM project';

        // 2. Befehl: Übergebe alle Projekte ans View
        $db = new Database();
        $getList = $db->select($list);
        return $getList;
    }

    public function addAction()
    {
        $db = new Database();

        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts
        $new = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project JOIN project_has_task ON project.pro_id = project_has_task.pro_id WHERE projects.pro_id=' . $new;

        // 2. Befehl: Übergeben diese Daten dem View
        $getAdd = $db->select($new);
        return $getAdd;

        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)

    }

    public function detailAction()
    {
        $db = new Database();

        // Logik für Projekt-Detail

        // 1. Befehl: Hole mir alle Projekt-Daten
        $detail = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project JOIN project_has_task ON project.pro_id = project_has_task.pro_id WHERE project.pro_id=' . $id;


        // 2. Befehl: Übergeben diese Daten dem View
        $getDetail = $db->select($detail);
        return $getDetail;
    }

    public function editAction()
    {
        $db = new Database();

        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten
        $edit = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project WHERE pro_id=' . $id;

        // 2. Befehl: Übergeben diese Daten dem View
        $getEdit = $db->select($edit);
        return $getEdit;

        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)


    }

}
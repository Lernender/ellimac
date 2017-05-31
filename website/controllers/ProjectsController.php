<?php

use Website\Controller\Action;
use Ellimac\Model\Database;

class ProjectsController extends Action
{

    //TODO: Projekt-Controller schreiben
    public static function listAction()
    {
        use Ellimac\Model\Client
        echo 'Hallo';
        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
        $get = new Client();
        $set = $get->getName();
        return $set;
        
        // 2. Befehl: Übergebe alle Projekte ans View

        // Inhalt für Model
        $list = 'SELECT pro_name, pro_url, sta_id FROM project';

        $db = new Database();
        $getList = $db->select($list);
        return $getList;
    }

    public function addAction()
    {
        $db = new Database();

        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)

        // Inhalt für Model
        $new = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project JOIN project_has_task ON project.pro_id = project_has_task.pro_id WHERE projects.pro_id=' . $new;

        $getAdd = $db->select($new);
        return $getAdd;
    }

    public function detailAction()
    {
        $db = new Database();

        // Logik für Projekt-Detail

        // 1. Befehl: Hole mir alle Projekt-Daten

        // 2. Befehl: Übergeben diese Daten dem View

        // Inhalt für Model
        $detail = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project JOIN project_has_task ON project.pro_id = project_has_task.pro_id WHERE project.pro_id=' . $id;

        $getDetail = $db->select($detail);
        return $getDetail;
    }

    public function editAction()
    {
        $db = new Database();

        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)


        // Inhalt für Model
        $edit = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project WHERE pro_id=' . $id;

        $getEdit = $db->select($edit);
        return $getEdit;


    }

}
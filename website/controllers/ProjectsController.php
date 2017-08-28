<?php

use Website\Controller\Action;
use Ellimac\Model\Database;
use Ellimac\Model\Project;

class ProjectsController extends Action
{
    public $params;

    /**
     * ProjectsController constructor.
     * @param $params
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    //TODO: Projekt-Controller schreiben
    public function listAction()
    {
        $db = new Database();

        // Logik für Projekt-Liste
        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
        $list = $db->list();

        // 2. Befehl: Übergebe alle Projekte ans View
        $projects = $db->select($list);

        // Inhalt für Model
        return $this->render('/scripts/index.html.twig', [
            'projects' => $projects
        ]);
    }

    public function addAction()
    {
        $db = new Database();
        $id = $_POST['pro_id'];

        // Logik für neues Projekt
        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts

        // 2. Befehl: Übergeben diese Daten dem View

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['saveNew']) {
                $new = $db->add($_POST["client"], $_POST["cli_address"], $_POST["cli_zipCode"], $_POST["cli_city"], $_POST["project"], $_POST["pro_url"],  $_POST["cli_id"], $_POST["par_id"], $_POST["ser_id"], $_POST["sta_id"]);
                $result = $db->query($new);

//                p_r($result);echo "new";die;

                if ($result) {
                    $db->redirectNew($url . '?add=');
                }
            } else {
                echo 'Nice try Camille ;)'; die;
            }
        }

        // Inhalt für Model
        return $this->render('/scripts/new.html.twig', [
            'project' => $project[$id]
        ]);
    }

    public function detailAction()
    {
        $db = new Database();

        $id = $this->params['id'];

        // Logik für Projekt-Detail
        // 1. Befehl: Hole mir alle Projekt-Daten
        $search = $db->search($id);

        // 2. Befehl: Übergeben diese Daten dem View
        $project = $db->select($search);

        // Inhalt für Model
        return $this->render('/scripts/details.html.twig', [
            'project' => $project[0]
        ]);
    }

    public function editAction()
    {
        $db = new Database();
        $router = new \Ellimac\Router();

        $url = $router->getCurrentUri();

        $id = $this->params['id'];


        // Logik für Projekt bearbeiten
        // 1. Befehl: Hole mir alle Projekt-Daten
        $search = $db->search($id);
        $project = $db->select($search);

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['saveProject']) {
                $id = $this->params['id'];

                $changes = $db->update($_POST["project"], $_POST["pro_url"], $_POST["cli_id"], $_POST["par_id"], $_POST["sta_id"], $_POST["sta_id"], $id);
                $result = $db->query($changes);

//                p_r($result);echo "save";die;

                if ($result) {
                   $db->redirectUpdate($url . '?update=');
               }

            } elseif ($_POST['deleteProject']) {
                $id = $this->params['id'];

                $result = $db->delete('projects', $id);
//
//                p_r($result);echo "delete";die;

                if ($result) {
                    $db->redirectDelete($url . '?delete=');
                }
            } else {
                echo "Nice try Camille :)"; die;
            }
        }
        // Inhalt für Model
        return $this->render('/scripts/edit.html.twig', [
            'project' => $project[0],
            'request' => [
                'path_info' => $_SERVER['REQUEST_URI']
            ]
        ]);
    }

}
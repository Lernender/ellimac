<?php

use Website\Controller\Action;
use Ellimac\Model\Database;
use Ellimac\Router;

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
        $query = $db->getList();

        // 2. Befehl: Übergebe alle Projekte ans View
//        $projects = $db->select($query);

        // Inhalt für Model
        return $this->render('/scripts/index.html.twig', [
            'projects' => $query
        ]);
    }

    public function addAction()
    {
        // Logik für neues Projekt
        $db = new Database();

        // 1. Befehl: Übergeben die Daten dem View
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['saveNew'])) {
                $query = $db->addProject($_POST["client"], $_POST["cli_address"], $_POST["cli_zipCode"], $_POST["cli_city"], $_POST["project"], $_POST["pro_url"],  $_POST["par_id"], $_POST["ser_id"]);
                p_r($query);

                if ($query) {
                    $this->redirect('projects?add=true');
                }
            } else {
                echo "Nice try Camille :)";
                echo "saveNew went wrong!"; die;
            }
        }

        // Inhalt für Model
        return $this->render('/scripts/new.html.twig', [
            'project' => $query[0]
        ]);
    }

    public function detailAction()
    {
        $db = new Database();

        $id = $this->params['id'];

        // Logik für Projekt-Detail
        // 1. Befehl: Hole mir alle Projekt-Daten
        $query = $db->getProject($id);

        // 2. Befehl: Übergeben diese Daten dem View
        //$project = $db->select($query);

        // Inhalt für Model
        return $this->render('/scripts/details.html.twig', [
            'project' => $query[0]
        ]);
    }

    public function editAction()
    {
        $db = new Database();

        $id = $this->params['id'];

        // Logik für Projekt bearbeiten
        // 1. Befehl: Hole mir alle Projekt-Daten
        $query = $db->getProject($id);

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['saveProject'])) {

                $result = $db->update($_POST["project"], $_POST["pro_url"], $_POST["client"], $_POST["cli_address"], $_POST["cli_zipCode"], $_POST["cli_city"], $_POST["par_id"], $_POST["ser_id"], $id, $cli_id);

                if ($result) {
                   $this->redirect("projects" . $id . "?update=true");
                }
            } elseif (isset($_POST['deleteProject'])) {
                $result = $db->delete('projects', $id);

                if ($result) {
                    $this->redirect('/projects?delete=true');
                }
            } else {
                echo "Nice try Camille :)";
                echo "saveProject oder deleteProject went wrong!"; die;
            }
        }

        // Inhalt für Model
        return $this->render('/scripts/edit.html.twig', [
            'project' => $query[0],
            'request' => [
                'path_info' => $_SERVER['REQUEST_URI']
            ]
        ]);
    }

}
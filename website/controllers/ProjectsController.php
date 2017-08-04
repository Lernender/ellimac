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
        $query = 'SELECT * FROM project LEFT OUTER JOIN state  ON project.sta_id = state.sta_id';

        $projects = $db->select($query);

        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model

        // 2. Befehl: Übergebe alle Projekte ans View

        // Inhalt für Model

        return $this->render('/scripts/index.html.twig', [
            'projects' => $projects
        ]);
    }

    public function addAction()
    {
        $db = new Database();
        $query = "INSERT INTO client (cli_name, cli_address, cli_zipCode, cli_city) VALUES ('" . $_POST["client"] . "', '" . $_POST["cli_address"] . "', '" . $_POST["cli_zipCode"] . "', '" . $_POST["cli_city"] . "')";
        $query .= "INSERT INTO project (pro_name, pro_url, cli_id, par_id, ser_id, sta_id) VALUES ('" . $_POST["project"] . "', '" . $_POST["pro_url"] . "', '" . $_POST["cli_id"] . "', '" . $_POST["par_id"] . "', '" . $_POST["ser_id"] . "', '" . $_POST["sta_id"] . "')";

        $project = $db->select($query);

        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)

        // Inhalt für Model

        return $this->render('/scripts/new.html.twig', [
            'project' => $project[0]
        ]);

    }

    public function detailAction()
    {
        $db = new Database();
        $query = 'SELECT * FROM project LEFT OUTER JOIN state ON project.sta_id = state.sta_id LEFT OUTER JOIN client  ON project.cli_id = client.cli_id LEFT OUTER JOIN partner  ON project.par_id = partner.par_id LEFT OUTER JOIN server  ON project.ser_id = server.ser_id WHERE pro_id = ' . $this->params['id'];

        $project = $db->select($query);

        // Logik für Projekt-Detail

        // 1. Befehl: Hole mir alle Projekt-Daten

        // 2. Befehl: Übergeben diese Daten dem View

        // Inhalt für Model

        return $this->render('/scripts/details.html.twig', [
            'project' => $project[0]
        ]);
    }

    public function editAction()
    {
        $db = new Database();


        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)
        if (isset($_GET['save'])) {

            $changes = "ALTER TABLE project (pro_name, pro_url, cli_id, par_id, ser_id, sta_id) VALUES ('" . $_GET["project"] . "', '" . $_GET["pro_url"] . "', '" . $_GET["cli_id"] . "', '" . $_GET["par_id"] . "', '" . $_GET["ser_id"] . "', '" . $_GET["sta_id"] . "') WHERE pro_id = " . $this->params['id'];
            $change = $db->query($changes);


        }

        $query = 'SELECT * FROM project LEFT OUTER JOIN state ON project.sta_id = state.sta_id LEFT OUTER JOIN client  ON project.cli_id = client.cli_id LEFT OUTER JOIN partner  ON project.par_id = partner.par_id LEFT OUTER JOIN server  ON project.ser_id = server.ser_id WHERE pro_id = ' . $this->params['id'];

        $project = $db->select($query);

        // 4. Befehl: Lösche das Projekt

        $id = $this->params['id'];

        if (isset($_POST["delete"]))
        {
            $delete = $db->delete('project', $id);
            return $delete;
        }

        // Inhalt für Model

        return $this->render('/scripts/edit.html.twig', [
            'project' => $project[0],
            'request' => [
                'path_info' => $_SERVER['REDIRECT_URL']
            ]
        ]);
    }

}
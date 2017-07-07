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
        //use Ellimac\Model\Project
//         echo 'Hallo';exit;
        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
//        $get = new Project($name, $url, $sta);
//        $set = $get->getName();
//        return $set;

        // 2. Befehl: Übergebe alle Projekte ans View

        // Inhalt für Model
//        $list = 'SELECT pro_name, pro_url, sta_id FROM project';
//        $db = new Database();
//        $getList = $db->select($list);
//        p_r($getList);


//        $name = 'SELECT pro_name FROM project';
//        $db = new Database();
//        $getName = $db->select($name);
//
//        $url = 'SELECT pro_url FROM project';
//        $db = new Database();
//        $getUrl = $db->select($url);
//
//        $state = 'SELECT sta_id FROM project';
//        $db = new Database();
//        $getState = $db->select($state);

//        $projects = [
//            'name' => $getName,
//            'url' => $getUrl,
//            'state' => $getState
//        ];
//
//        $projects = [
//            'name' => 'SELECT pro_name FROM project',
//            'url' => 'SELECT pro_url FROM project',
//            'state' => 'SELECT sta_id FROM project'
//        ];

        $db = new Database();
        $query = 'SELECT * FROM project LEFT OUTER JOIN state  ON project.sta_id = state.sta_id';
        $projects = $db->select($query);

//        $projects = [
//            1 => [
//                'name' => 'Gewerbe Meggen',
//                'url' => 'www.gewerbe-meggen.ch',
//                'state' => 'Abgeschlossen'
//            ],
//            2 => [
//                'name' => 'Gewerbeverein Sursee',
//                'url' => 'www.gewerberegionsursee.ch',
//                'state' => 'in Bearbeitung'
//            ],
//            3 => [
//                'name' => 'Elektro Shmid Sursee',
//                'url' => 'www.yamiro.ch/schmid-sursee',
//                'state' => 'Neusatz'
//            ]
//        ];

        return $this->render('/scripts/index.html.twig', [
            'projects' => $projects
        ]);
    }

    public function addAction()
    {
        $db = new Database();

        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)

        // Inhalt für Model
//        $new = 'SELECT pro_name, pro_url, ser_id, cli_id, par_id, sta_id FROM project JOIN project_has_task ON project.pro_id = project_has_task.pro_id WHERE projects.pro_id=' . $new;
//
//        $getAdd = $db->select($new);

        return $this->render('/scripts/new.html.twig', []);
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
            'project' => $project[0],
        ]);
    }

    public function editAction()
    {
        $db = new Database();
        $query = 'SELECT * FROM project LEFT OUTER JOIN state ON project.sta_id = state.sta_id LEFT OUTER JOIN client  ON project.cli_id = client.cli_id LEFT OUTER JOIN partner  ON project.par_id = partner.par_id LEFT OUTER JOIN server  ON project.ser_id = server.ser_id WHERE pro_id = ' . $this->params['id'];
        $project = $db->select($query);

        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten

        // 2. Befehl: Übergeben diese Daten dem View

        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)

        // Inhalt für Model

        return $this->render('/scripts/edit.html.twig', [
            'project' => $project[0],
            'request' => [
                'path_info' => $_SERVER['REDIRECT_URL']
            ]
        ]);
    }

}
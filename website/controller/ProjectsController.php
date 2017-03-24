<?php

class ProjectsController
{
    //TODO: Projekt-Controller schreiben
    public function listAction()
    {
        // Logik für Projekt-Liste

        // 1. Befehl: Hole mir alle Projekte (Liste) vom Model
        // 2. Befehl: Übergebe alle Projekte ans View
    }

    public function newProjectAction()
    {
        // Logik für neues Projekt

        // 1. Befehl: Hole mir alle relevanten Daten zu Erstellung eines neuen Projekts
        // 2. Befehl: Übergeben diese Daten dem View
        // 3. Befehl: Neues Projekt in der Datenbank abspeichern (via Model)
    }

    public function editProjectAction()
    {
        // Logik für Projekt bearbeiten

        // 1. Befehl: Hole mir alle Projekt-Daten
        // 2. Befehl: Übergeben diese Daten dem View
        // 3. Befehl: Speichere mir alle bearbeiteten Projekt-Daten in der Datenbank ab (via Model)
    }

    public function projectDetailAction()
    {
        // Logik für Projekt-Detail

        // 1. Befehl: Hole mir alle Projekt-Daten
        // 2. Befehl: Übergeben diese Daten dem View
    }
}
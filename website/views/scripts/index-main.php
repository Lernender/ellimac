    <main class="main-content" uk-height-viewport="expand: true">

        <section class="uk-padding uk-padding-remove-horizontal">
            <div class="uk-container">
                <p uk-margin>
                    <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small">Alle</button>
                    <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small">Kein Status</button>
                    <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small">Neusatz</button>
                    <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small">In Bearbeitung</button>
                    <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small">Testing-Phase</button>
                    <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small">Abgeschlossen</button>
                    <button class="cp-button cp-button-new uk-button uk-card-default uk-card-hover uk-button-small uk-align-right">Neues Projekt erstellen</button>
                </p>
            </div>
        </section>

        <section>
            <div class="uk-container">
                <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m " uk-grid>
                    <?php// include_once('../controller/projects.php'); ?>
                    <?php var_dump($projectData);die; ?>
                    <?php foreach ($projectData as $project): ?>
                        <div>
                            <div class="cp-padding cp-button uk-card uk-card-default uk-card-body uk-card-hover">
                                <!--Status/Label aus DB importieren-->
                                <span class="uk-label uk-label-success uk-position-top-right cp-label cp-lable-abgeschlossen">Abgeschlossen</span>
                                <div class="cp-bold uk-margin-top"><?=$project['name']; ?></div><div><?=$project['url']; ?></div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>

    </main>


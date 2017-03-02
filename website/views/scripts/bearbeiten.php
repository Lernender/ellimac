<main class="main-content" uk-height-viewport="expand: true">

    <section class="uk-padding uk-padding-remove-horizontal">
        <div class="uk-container">
            <div uk-grid>

                <div class="uk-width-5-6@s">
                    <div uk-grid>
                        <div class="uk-width-1-6@m">
                            <div class="cp-bold cp-blue">Projekt</div>
                        </div>
                        <div class="uk-width-1-6@m uk-width-1-3@s">
                            <div class="cp-bold">Projektname</div>
                        </div>
                        <div class="uk-width-2-3@s">
                            <input class="cp-text-input uk-button uk-button-small" type="text" name="client" value="Gewerbe Meggen">
                        </div>

                        <div class="uk-width-1-6@m uk-margin-top">
                        </div>
                        <div class="uk-width-1-6@m uk-margin-top">
                            <div class="cp-bold">Projektname</div>
                        </div>
                        <div class="uk-width-2-3@m uk-margin-top">
                            <input class="cp-text-input uk-button uk-button-small" type="text" name="client" value="www.gewerbe-meggen.ch">
                        </div>

                        <div class="uk-width-1@m">
                            <hr class="cp-hr">
                        </div>

                        <div class="uk-width-1-6@m">
                            <div class="cp-bold cp-blue">Kundeninfo</div>
                        </div>
                        <div class="uk-width-1-6@m">
                            <div class="cp-bold">Kunde</div>
                        </div>
                        <div class="uk-width-2-3@m">
                            <input class="cp-text-input uk-button uk-button-small" type="text" name="client" value="Gewerbe Meggen">
                        </div>

                        <div class="uk-width-1-6@m uk-margin-top">
                            <div></div>
                        </div>
                        <div class="uk-width-1-6@m uk-margin-top">
                            <div class="cp-bold">Adresse</div>
                        </div>
                        <div class="uk-width-2-3@m uk-margin-top">
                            <input class="cp-text-input uk-button uk-button-small" type="text" name="client" value="Musterstrasse 185">
                        </div>

                        <div class="uk-width-1-6@m uk-margin-top">
                            <div></div>
                        </div>
                        <div class="uk-width-1-6@m uk-margin-top">
                            <div class="cp-bold">PLZ/Ort</div>
                        </div>
                        <div class="uk-width-2-3@m uk-margin-top">
                            <div uk-grid>
                                <div class="uk-width-1-3@m "><input class="cp-text-input uk-button uk-button-small" type="text" name="client" value="2000"></div>
                                <div class="uk-width-2-3@m "><input class="cp-text-input uk-button uk-button-small" type="text" name="client" value="Musterdorf"></div>
                            </div>
                        </div>

                        <div class="uk-width-1@m">
                            <hr class="cp-hr">
                        </div>

                        <div class="uk-width-1-6@m">
                            <div class="cp-bold cp-blue">Allg. Info</div>
                        </div>
                        <div class="uk-width-1-6@m">
                            <div class="cp-bold">Partner</div>
                        </div>
                        <div class="uk-width-2-3@m">
                            <select class="uk-select cp-select">
                                <option>bitte wählen</option>
                                <option>Kobalt</option>
                                <option>Woche-Pass</option>
                                <option>Dä</option>
                                <option>Die</option>
                                <option>Desi</option>
                            </select>
                        </div>

                        <div class="uk-width-1-6@m uk-margin-top"></div>

                        <div class="uk-width-1-6@m uk-margin-top">
                            <div class="cp-bold">Server</div>
                        </div>
                        <div class="uk-width-2-3@m uk-margin-top">
                            <select class="uk-select cp-select">
                                <?php foreach ($projectData as $value): ?>
                                    <div>
                                        <div class="cp-padding cp-button uk-card uk-card-default uk-card-body uk-card-hover">
                                            <span class="uk-label uk-label-success uk-position-top-right cp-label cp-lable-abgeschlossen">Abgeschlossen</span>
                                            <div class="cp-bold uk-margin-top"><?=$value['name']; ?></div><div><?=$value['url']; ?></div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <option>bitte wählen</option>
                                <option>Pimdev</option>
                                <option>Re</option>
                                <option>Cheops</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="uk-width-expand">
                    <div class="uk-width-1-1@m">
                        <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small uk-align-right uk-margin-small-bottom">Speichern</button>
                    </div>
                    <div class="uk-width-1-1@m">
                        <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small uk-align-right uk-margin-small-bottom">Abbrechen</button>
                    </div>
                    <div class="uk-width-1-1@m">
                        <button class="cp-button uk-button uk-card-default uk-card-hover uk-button-small uk-align-right uk-margin-small-bottoms">Löschen</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<?php
/*
 * @Контроллер главной страницы
 */

namespace Controllers;

class ControllerMain extends AbstractController {
    function actionIndex(){
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
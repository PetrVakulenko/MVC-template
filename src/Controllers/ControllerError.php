<?php
/**
 * Controller for error page
 */

namespace Controllers;

class ControllerError extends AbstractController {
    public function actionIndex(){
        $this->view->generate('404_view.php', 'template_view.php');
    }

    public function actionError($message = ''){
        $this->view->generate(
            '404_view.php',
            'template_view.php',
            ['errorMessage' => $message != '' ? $message : "Undefined error"]
        );
    }
}

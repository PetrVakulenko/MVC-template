<?php
/**
 * View class for getting all views
 */

namespace Core;

class View {

    /**
     * @$content_view - view content for current page;
     * @$template_view - file for all templates;
     * @$data - array with page content.
     */
    public function generate(string $content_view, string $template_view = 'template_view.php', array $data = null) {
        $viewpath = MAINDIR . '/Views/';

        if(is_array($data)) {
            extract($data);
        }

        if (file_exists($path = $viewpath.$template_view)){
            include_once $path;
        } else {
            $errorMessage = 'Undefined view '.$template_view;
            include_once $viewpath.'404_view.php';
        }
    }

}

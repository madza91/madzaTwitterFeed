<?php
/**
 * Creates a templates/view object
 */
class Template
{
    //Path to templates
    protected $template;

    //Variables passed in
    protected $vars = [];

    /**
     * Template constructor.
     *
     * @param $template
     */
    public function __construct($template)
    {

        // Check for extension
        if(substr($template, -4) !== '.php') {
            $template .= '.php';
        }

        $this->template = BASE_DIR . 'templates/' . SITE_TEMPLATE . '/' . $template;
        $this->template_dir = BASE_DIR . 'templates/' . SITE_TEMPLATE . '/';
        $this->base_dir = BASE_DIR;
        $this->title    = 'Warning: Title is not set!';

    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->vars[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        extract($this->vars);
        @chdir(dirname($this->template));
        ob_start();


        // Include view source if exists, otherwise 404.php
        if(file_exists($this->template)){

            include($this->template);

        } else {
            print_r('e'); die;
            // View doesn't exists
            $tmpPageName = basename($this->template);
            $template = new Template('404.php');
            $template->title = 'Error 404 - View not found';

            $template->message = "View page doesn't exists.<br> View you requested is <b title='{$this->template}'>{$tmpPageName}</b>";
            echo $template;
        }


        return ob_get_clean();
    }
}

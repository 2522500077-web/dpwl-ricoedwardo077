
<?php

class Controller
{
    public $session;
    public $load;

    public function __construct()
    {
        $this->session = new Session();

        $this->load = new class {

            public function view($viewName, $data = [])
            {
                if (!empty($data)) {
                    extract($data);
                }

                $file = __DIR__ . '/../view/' . $viewName . '.php';

                if (!file_exists($file)) {
                    die('File view tidak ditemukan: ' . $file);
                }

                include $file;
            }

            public function model($modelName)
            {
                $file = __DIR__ . '/../model/' . $modelName . '.php';

                if (!file_exists($file)) {
                    die('File model tidak ditemukan: ' . $file);
                }

                require_once $file;

                $className = basename($modelName);

                return new $className();
            }

            public function post($key = null)
            {
                if ($key === null) {
                    return $_POST;
                }

                return $_POST[$key] ?? null;
            }

            public function get($key = null)
            {
                if ($key === null) {
                    return $_GET;
                }

                return $_GET[$key] ?? null;
            }
        };
    }
}

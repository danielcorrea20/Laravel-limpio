<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:views {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear una serie de vistas correspondientes al CRUD';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

         // Crear un directorio para las vistas si no existe
         if (!File::exists(resource_path("views/{$name}"))) {
            File::makeDirectory(resource_path("views/{$name}"));
        }

        // Crear las vistas básicas
        $this->createView('index', $name);
        $this->createView('create', $name);
        $this->createView('edit', $name);
        $this->createView('show', $name);

        $this->info("Vistas de {$name} creadas correctamente");

    }

    private function createView($vista, $carpeta){

        // Ruta de destino para las vistas
        $directorio = resource_path("views/{$carpeta}");

        // Verificar si existe el directorio o sino lo creo con permisos 755
        if (!File::exists($directorio) && !File::makeDirectory($directorio, 0755, true, true)) {
            $this->error("Failed to create directory: {$directorio}");
            return;
        }

        // Recoger sintaxis o contenido de las vistas de manera predefinida.
        // En este caso recogemos el contneido de home.blade.php para nuestras futuras vistas
        $homePath = resource_path("views/home.blade.php");

        // Verificar si el home.blade.php existe
        if (!File::exists($homePath)) {
            $this->error("Home file not found: {$homePath}");
            return;
        }

        // leer contenido de home.blade.php para copiarlo a las vistas que voy a generar
        $content = file_get_contents($homePath);

        // Agregar el encabezado para cada vista.
        $content = str_replace("@endsection", "<h1>{$vista}</h1>\n\n@endsection", $content);

        // Escribir el contenido en el archivo nuevo
        $viewPath = "{$directorio}/{$vista}.blade.php";

        if (!File::put($viewPath, $content)) {
            $this->error("Failed to write view file: {$viewPath}");
            return;
        }

        // Mensaje de confirmación
        $this->info("La vista ha sido creada correctamente en: views/{$directorio}/{$vista}.blade.php");
    }   


}

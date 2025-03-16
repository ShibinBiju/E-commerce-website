<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name');

        // Convert namespace format (guest/ControllerService) to path format (guest\ControllerService)
        $path = app_path("Services/{$name}.php");

        // Ensure the directory exists
        File::ensureDirectoryExists(dirname($path));

        // Check if file already exists
        if (File::exists($path)) {
            $this->error("Service already exists!");
            return;
        }

        // Get class name without namespace
        $className = basename(str_replace('\\', '/', $name));

        // Generate Service Class
        File::put($path, "<?php

namespace App\Services\\" . dirname(str_replace('/', '\\', $name)) . ";

class {$className}
{
    //
}");

        $this->info("Service {$name} created successfully!");
    }
}

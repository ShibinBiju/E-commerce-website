<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository class';

    public function handle()
    {
        $name = str_replace('\\', '/', $this->argument('name')); // Support namespace-like input
        $path = app_path("Repositories/{$name}.php");

        if (File::exists($path)) {
            $this->error("Repository {$name} already exists!");
            return;
        }

        // Ensure directory exists
        File::ensureDirectoryExists(dirname($path));

        // Extract class name from the full path
        $className = basename($name);
        $namespace = 'App\\Repositories' . (dirname($name) !== '.' ? '\\' . str_replace('/', '\\', dirname($name)) : '');

        $template = <<<PHP
<?php

namespace {$namespace};

class {$className}
{
    public function exampleMethod()
    {
        return 'Example output from {$className}';
    }
}
PHP;

        File::put($path, $template);
        $this->info("Repository {$name}Repository created successfully!");
    }
}

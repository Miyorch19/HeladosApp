<?php
// Crea este archivo como app/Console/Commands/DebugClasses.php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DebugClasses extends Command
{
    protected $signature = 'debug:classes';
    protected $description = 'Debug class loading issues';

    public function handle()
    {
        $this->info('=== DEBUGGING CLASSES ===');
        
        // Verificar autoloader
        $this->info('Composer autoload files:');
        $autoloadFiles = get_included_files();
        foreach ($autoloadFiles as $file) {
            if (strpos($file, 'autoload') !== false) {
                $this->line($file);
            }
        }
        
        // Verificar que las clases existan
        $classes = [
            'App\Models\User',
            'App\Models\Producto', 
            'App\Models\TipoProducto',
            'App\Policies\ProductoPolicy',
            'App\Policies\TipoProductoPolicy',
            'App\Http\Controllers\Admin\ProductoController',
            'App\Http\Controllers\Admin\TipoProductoController'
        ];
        
        $this->info("\n=== CHECKING CLASSES ===");
        foreach ($classes as $class) {
            if (class_exists($class)) {
                $this->info("✅ {$class} - EXISTS");
                
                // Verificar ubicación del archivo
                $reflection = new \ReflectionClass($class);
                $this->line("   File: " . $reflection->getFileName());
                
                // Verificar métodos si es un modelo
                if (strpos($class, 'Models') !== false) {
                    $methods = get_class_methods($class);
                    $this->line("   Methods: " . implode(', ', array_slice($methods, 0, 5)) . '...');
                }
            } else {
                $this->error("❌ {$class} - NOT FOUND");
            }
        }
        
        // Verificar archivos físicos
        $this->info("\n=== CHECKING FILES ===");
        $files = [
            'app/Models/TipoProducto.php',
            'app/Models/Producto.php',
            'app/Policies/TipoProductoPolicy.php',
            'app/Http/Controllers/Admin/ProductoController.php',
        ];
        
        foreach ($files as $file) {
            $fullPath = base_path($file);
            if (file_exists($fullPath)) {
                $this->info("✅ {$file} - EXISTS");
                $this->line("   Size: " . filesize($fullPath) . " bytes");
                $this->line("   Modified: " . date('Y-m-d H:i:s', filemtime($fullPath)));
            } else {
                $this->error("❌ {$file} - NOT FOUND");
            }
        }
        
        // Verificar namespace en archivos
        $this->info("\n=== CHECKING NAMESPACES ===");
        $tipoProductoFile = base_path('app/Models/TipoProducto.php');
        if (file_exists($tipoProductoFile)) {
            $content = file_get_contents($tipoProductoFile);
            if (strpos($content, 'namespace App\Models;') !== false) {
                $this->info("✅ TipoProducto.php has correct namespace");
            } else {
                $this->error("❌ TipoProducto.php missing or incorrect namespace");
            }
            
            if (strpos($content, 'class TipoProducto') !== false) {
                $this->info("✅ TipoProducto.php has correct class name");
            } else {
                $this->error("❌ TipoProducto.php missing or incorrect class name");
            }
        }
        
        $this->info("\n=== DEBUGGING COMPLETE ===");
    }
}
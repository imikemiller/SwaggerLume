<?php

namespace SwaggerLume\Console;

use Illuminate\Console\Command;
use SwaggerLume\Console\Helpers\Publisher;

class PublishViewsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'swagger-lume:publish-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish views';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing view files');
        
        (new Publisher($this))->publishFile(
            realpath(__DIR__.'/../../resources/views/').'/index.blade.php',
            config('swagger-lume.paths.views'),
            'index.blade.php'
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../resources/dist/css',
            public_path('swagger-ui-assets/css')
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../resources/dist/images',
            public_path('swagger-ui-assets/images')
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../resources/dist/lib',
            public_path('swagger-ui-assets/lib')
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../resources/dist/fonts',
            public_path('swagger-ui-assets/fonts')
        );
    }
}

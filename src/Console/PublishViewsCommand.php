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
        exec('git submodule update --init --recursive');
        (new Publisher($this))->publishFile(
            realpath(__DIR__.'/../../resources/views/').'/index.blade.php',
            config('swagger-lume.paths.views'),
            'index.blade.php'
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../swagger-ui/dist/css',
            public_path('css')
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../swagger-ui/dist/images',
            public_path('images')
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../swagger-ui/dist/lib',
            public_path('lib')
        );

        (new Publisher($this))->publishDirectory(
            __DIR__.'/../../swagger-ui/dist/fonts',
            public_path('fonts')
        );
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate'; // Change here
    protected $description = 'Generate a sitemap for the portfolio';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add projects to the sitemap
        $projects = \App\Models\Project::all();
        foreach ($projects as $project) {
            $sitemap->add(url('/projects/' . $project->slug), null, null, null, [
                'meta_title' => $project->meta_title,
                'meta_description' => $project->meta_description,
            ]);
        }

        // Save the sitemap to public directory
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}

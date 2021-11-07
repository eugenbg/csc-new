<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Category;
use App\Models\Slug;
use Illuminate\Console\Command;

class IndexSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $articles = Article::query()
            ->select(['id as object_id', 'slug'])
            ->get()
            ->toArray();

        foreach ($articles as &$article) {
            $article['type'] = Article::class;
        }

        $cats = Category::query()
            ->select(['id as object_id', 'slug'])
            ->get()
            ->toArray();

        foreach ($cats as &$cat) {
            $cat['type'] = Category::class;
        }

        Slug::query()->insert(array_merge($articles, $cats));
    }
}

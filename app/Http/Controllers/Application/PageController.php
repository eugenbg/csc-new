<?php

namespace App\Http\Controllers\Application;

use App\Base\Services\SitemapService;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\ChinaUniImage;
use App\Models\ChinaUniversity;
use App\Models\Page;
use App\Models\Slug;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function routeMatch($slug, Request $request)
    {
        /** @var Slug $slug */
        $slug = Slug::query()
            ->where('slug', '=', $slug)
            ->first();

        if(!$slug) {
            throw new NotFoundHttpException('Sorry this page does not exist');
        }

        switch ($slug->type) {
            case Article::class:
                $article = Article::query()->find($slug->object_id);
                return $this->getArticle($article);

            case Category::class:
                $category = Category::query()->find($slug->object_id);
                return $this->getCategory($category);

            case ChinaUniversity::class:
                $uni = ChinaUniversity::query()->find($slug->object_id);
                return $this->getChinaUni($uni);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $unis = ChinaUniversity::query()->limit(20)->get();
        $article = Article::query()
            ->where('slug', '=', 'csc-china-scholarship-council-scholarships')
            ->first();

        return view('app.main', [
            'unis' => $unis,
            'object' => $article
        ]);
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(Category $category)
    {
        return view('app.articles', [
            'title' => $category->title,
            'description' => $category->description,
            'articles' => Article::where('category_id', $category->id)->paginate(4)
        ]);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPage(Page $page)
    {
        return view('app.content', ['object' => $page]);
    }

    /**
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticle(Article $article)
    {
        return view('app.content', ['object' => $article]);
    }

    /**
     * @param \App\Base\Services\SitemapService $sitemapService
     *
     * @return mixed
     * @throws \Exception
     */
    public function getSitemap(SitemapService $sitemapService)
    {
        return $sitemapService->render();
    }

    private function getChinaUni(?ChinaUniversity $uni)
    {
        $campusImages = [];
        $dormImages = [];
        foreach ($uni->images as $image) {
            if($image->type == ChinaUniImage::TYPE_CAMPUS) {
                $campusImages[] = $image;
            }
            if($image->type == ChinaUniImage::TYPE_DORM) {
                $dormImages[] = $image;
            }
        }

        return view('app.china-uni', [
            'uni' => $uni,
            'programs' => $uni->getPrograms(),
            'campusImages' => $campusImages,
            'dormImages' => $dormImages,
            'dorms' => $uni->dorms,
            'scholarships' => $uni->scholarships,
        ]);
    }
}

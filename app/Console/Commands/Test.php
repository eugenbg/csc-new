<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\ChinaUniversity;
use App\Services\UniquenessTestingService;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test {uniId} {pieceNumber}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var int
     */
    private $i;

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
        $uniId = $this->argument('uniId');
        $pieceNumber = $this->argument('uniId');
        if($uniId) {
            $this->comparePiecesOfOneArticleToAllOthers($uniId, $pieceNumber);
        }
        $this->compareAllUniAgainstAllUnis(1);
    }

    private function comparePiecesOfOneArticleToAllOthers($uniId, $pieceNumber = 1)
    {
        $uni = ChinaUniversity::find($uniId);
        $otherUnis = ChinaUniversity::query()
            ->where('id', '!=', $uniId)
            ->where('generated', '!=', '')
            ->get();

        foreach ($otherUnis as $otherUni) {
            /** @var UniquenessTestingService $service */
            $service = resolve(UniquenessTestingService::class);
            $result = $service->run(
                $uni->getGeneratedTextPiece($pieceNumber),
                $otherUni->getGeneratedTextPiece($pieceNumber),
                3
            );

            if($result > 30) {
                $this->i++;
                $this->error(sprintf(
                    'uni %s and uni %s, peace %s, matching percent %s',
                    $uni->name,
                    $otherUni->name,
                    1,
                    $result
                ));
            }
        }

        $this->info($this->i);
    }

    private function compareAllUniAgainstAllUnis($pieceNumber)
    {
        $this->i = 0;

        $unis = ChinaUniversity::query()
            ->where('generated', '!=', '')
            ->get();

        foreach ($unis as $uni) {
            $this->comparePiecesOfOneArticleToAllOthers($uni->id, $pieceNumber);
        }
    }
}

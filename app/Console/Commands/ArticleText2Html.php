<?php

namespace App\Console\Commands;

use App\Models\ChinaUniversity;
use Illuminate\Console\Command;

class ArticleText2Html extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text2html {uniId?}';

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
        $uniId = $this->argument('uniId');
        $uni = ChinaUniversity::find($uniId);

        $matches = [];
        $generated = json_decode($uni->generated, true);

        $formatted = '';
        foreach ($generated as $header => $paragraph) {
            $original = $paragraph;
            $paragraph .= "\n";
            preg_match_all('/(\n-|: -)(.*)/', $paragraph, $matches);
            foreach ($matches[0] as $key => $match) {
                $replacement = '<li>' . $matches[2][$key] . '</li>';
                $paragraph = str_replace($match, $replacement, $paragraph);
            }

            preg_match_all('/<li>(.*)<\/li>/', $paragraph, $matches);
            if(count($matches[0])) {
                $paragraph = str_replace($matches[0][0], '<ul>' . $matches[0][0] . '</ul>', $paragraph);
            }

            $paragraph = str_replace("\n", '<br/>', ltrim(rtrim($paragraph)));
            $formatted .= $header . $paragraph;
        }

        $formatted = $this->randomizeHeaders($formatted);


        $uni->generated_html = $formatted;
        $uni->save();

        return 0;
    }

    private function randomizeHeaders($formatted)
    {
        $map = [
            '<h2>Facts To Know</h2>' => [
                '<h2>Consider This</h2>',
                '<h2>Things To Consider</h2>',
                '<h2>Good To Know</h2>',
                '<h2>Some Facts About CSC Scholarships</h2>',
                '<h2>About Chinese Government Scholarships</h2>',
            ],
            '<h2>Where To Start</h2>' => [
                '<h2>First Steps</h2>',
                '<h2>Do Your Research</h2>',
                '<h2>Research Specific Scholarship Options</h2>',
                '<h2>Before Filling The Application</h2>',
                '<h2>Before Applying</h2>',
            ],
            '<h2>Who Can Apply</h2>' => [
                '<h2>Who Is Eligible</h2>',
                '<h2>Who Is Eligible For The Scholarships</h2>',
                '<h2>Who Can Apply For The Scholarships</h2>',
                '<h2>Eligible Students</h2>',
                '<h2>Are You Suitable For The CSC Scholarship</h2>',
            ],
            '<h2>How To Fill The Application Form</h2>' => [
                '<h2>Filling The Form Step By Step</h2>',
                '<h2>Filling The Form</h2>',
                '<h2>Filling The Application Form Details</h2>',
                '<h2>Application Form</h2>',
                '<h2>How To Apply</h2>',
            ],
            '<h2>How To Increase Your Chances</h2>' => [
                '<h2>Maximize The Probability Of Winning The Scholarship</h2>',
                '<h2>Maximize Your Success Chances</h2>',
                '<h2>Improve Your Chances</h2>',
                '<h2>How To Make Sure You Are Awarded With The Scholarship</h2>',
            ],
            '<h2>Time Frame</h2>' => [
                '<h2>CSC Deadlines</h2>',
                '<h2>Deadlines Of The Submission And Results</h2>',
                '<h2>When To Apply And Wait For Results</h2>',
                '<h2>Application And Results Time Frame</h2>',
                '<h2>Target Dates For Applying And Results</h2>',
            ],
        ];

        foreach ($map as $header => $newHeaders) {
            $formatted = str_replace($header, $newHeaders[array_rand($newHeaders)], $formatted);
        }

        return $formatted;
    }
}

<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Usecase\UserAnalysisUsecase;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory as ViewFactory;

/**
 * Class AnalyzeAction
 */
final class AnalyzeAction extends Controller
{
    /** @var ViewFactory */
    private $view;

    /**
     * AnalyzeAction constructor.
     *
     * @param ViewFactory $view
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * @param UserAnalysisUsecase $usecase
     *
     * @return View
     */
    public function __invoke(UserAnalysisUsecase $usecase): View
    {
        return $this->view->make('analysis', ['analysis' => $usecase->run()]);
    }
}

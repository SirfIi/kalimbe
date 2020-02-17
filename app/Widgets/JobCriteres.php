<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class JobCriteres extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $experinces = \App\experience::all();
        return view('widgets.job_criteres', [
            'config' => $this->config,
            'experinces'  => $experinces,
        ]);
    }
}

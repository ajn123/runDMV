<?php

namespace App\Actions;

use App\Models\RunningModel;

class DisableModel
{


    public function handle(RunningModel $model)
    {
        $model->enabled = false;
        $model->save();
    }
}

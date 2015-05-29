<?php
/**
 * @link https://github.com/MadAnd/yii2-momentjs
 * @copyright Copyright (c) 2015 Andriy Kmit' <dev@madand.net>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace madand\momentjs;

use yii\web\AssetBundle;

class MomentJsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/moment';
    public $css = [
        'moment.css',
    ];
    public $js = [
        'moment.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

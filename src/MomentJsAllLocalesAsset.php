<?php
/**
 * @link https://github.com/MadAnd/yii2-momentjs
 * @copyright Copyright (c) 2015 Andriy Kmit' <dev@madand.net>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace madand\momentjs;

use yii\web\AssetBundle;

/**
 * Class MomentJsAsset includes the version of core MomentJs with all locales bundled in the single file.
 *
 * @package madand\momentjs
 * @author Andriy Kmit' <dev@madand.net>
 */
class MomentJsAllLocalesAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/moment/min';
    public $js = [
        'moment-with-locales.min.js',
    ];
}

<?php
/**
 * @link https://github.com/MadAnd/yii2-momentjs
 * @copyright Copyright (c) 2015 Andriy Kmit' <dev@madand.net>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace madand\momentjs;

use yii\base\InvalidConfigException;
use yii\web\AssetBundle;
use yii\web\View;
use Yii;

/**
 * Class MomentJsAsset includes particular MomentJs locale file.
 *
 * It also declares core MomentJsAsset as a dependency, so there is no need to explicitly register it.
 *
 * @package madand\momentjs
 * @author Andriy Kmit' <dev@madand.net>
 */
class MomentJsLocaleAsset extends AssetBundle
{
    /**
     * @var string Locale name to be included. If not set, current application language will be used.
     */
    public $locale;

    /**
     * @var bool Whether we should also generate JS code that activates the locale when DOM is ready.
     */
    public $setLocaleOnReady = true;

    public $sourcePath = '@vendor/bower/moment/locale';
    public $depends = [
        'madand\momentjs\MomentJsAsset',
    ];

    public function init()
    {
        parent::init();

        if ($this->locale === null) {
            $this->locale = \Yii::$app->language;
        }
    }

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $this->registerLocaleInternal($view);
    }

    /**
     * @param \yii\web\View $view
     * @throws \yii\base\InvalidConfigException If file with the locale is not exists.
     */
    public function registerLocaleInternal($view) {
        $localeFile = substr(strtolower($this->locale), 0, 2) . '.js';
        $localeFilePath = "{$this->sourcePath}/$localeFile";
        if (YII_DEBUG && !file_exists($localeFilePath)) {
            throw new InvalidConfigException('Locale file "' . $localeFilePath . '" not exists!');
        }

        $manager = $view->getAssetManager();
        $view->registerJsFile(
            $manager->getAssetUrl($this, $localeFile),
            $this->jsOptions,
            'moment-locale-' . $this->locale
        );

        if ($this->setLocaleOnReady) {
            $js = "moment.locale('{$this->locale}');'";
            $view->registerJs($js, View::POS_READY, 'moment-set-default-locale');
        }
    }
}

<?php

namespace humhubContrib\modules\jitsiMeet\widgets;

use Yii;
use humhub\widgets\JsWidget;
use humhubContrib\modules\jitsiMeet\Module;

class RoomWidget extends JsWidget
{
    /**
     * @inheritdoc
     */
    public $jsWidget = 'jitsiMeet.Room';

    /**
     * @inheritdoc
     */
    public $init = true;

    public $roomName = 'Unnamed';

    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('jitsi-meet');

        return $this->render('room', [
            'options' => $this->getOptions(),
            'roomName' => $this->roomName,
            # Allow overwriting via translation config
            'moduleLabel' => Yii::t('JitsiMeetModule.base', $module->getSettingsForm()->menuTitle),
            'jwt' => '',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('jitsi-meet');

        return [
            'roomName' => $this->roomName,
            'roomPrefix' => $module->getSettingsForm()->roomPrefix,
            'jitsiDomain' => $module->getSettingsForm()->jitsiDomain,
        ];
    }

}
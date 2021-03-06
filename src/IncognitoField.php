<?php
/**
 * Incognito Field plugin for Craft CMS 3.x
 *
 * PlainText drop-in replacement that can be set to disabled, hidden or readonly.
 *
 * @link      http://vaersaagod.no
 * @copyright Copyright (c) 2017 Mats Mikkel Rummelhoff
 */

namespace mmikkel\incognitofield;

use mmikkel\incognitofield\fields\IncognitoFieldType;

use Craft;
use craft\base\Plugin;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class IncognitoField
 *
 * @author    Mats Mikkel Rummelhoff
 * @package   IncognitoField
 * @since     1.0.0
 *
 */
class IncognitoField extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var IncognitoField
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Register our fields
        Event::on(Fields::class, Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = IncognitoFieldType::class;
            }
        );

        Craft::info(
            Craft::t(
                'incognito-field',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}

<?php

namespace Kanboard\Plugin\ModernDateTimePicker;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // add flatpickr asset files
        $this->hook->on('template:layout:css', array('template' => 'plugins/ModernDateTimePicker/vendor/flatpickr/flatpickr.min.css'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/ModernDateTimePicker/vendor/flatpickr/flatpickr.min.js'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/ModernDateTimePicker/vendor/flatpickr/l10n/' . $this->getFlatpickrLanguageCodeFilename() . '.js'));
        
        // add javascript that overrides the olde datetimepicker
        $this->hook->on('template:layout:js', array('template' => 'plugins/ModernDateTimePicker/Assets/App.js'));
    }

    public function getFlatpickrLanguageCodeFilename()
    {
        $languages = array(
            'cs_CZ' => 'cs',
            'ca_ES' => 'cat',
            'da_DK' => 'da',
            'de_DE' => 'de',
            'de_DE_du' => 'de',
            'en_GB' => 'default',
            'en_US' => 'default',
            'es_ES' => 'es',
            'es_VE' => 'es',
            'fr_FR' => 'fr',
            'it_IT' => 'it',
            'hr_HR' => 'hr',
            'hu_HU' => 'hu',
            'nl_NL' => 'nl',
            'nb_NO' => 'no',
            'pl_PL' => 'pl',
            'pt_PT' => 'pt',
            'pt_BR' => 'pt',
            'ro_RO' => 'ro',
            'ru_RU' => 'ru',
            'sr_Latn_RS' => 'sr',
            'fi_FI' => 'fi',
            'sk_SK' => 'sk',
            'sv_SE' => 'sv',
            'tr_TR' => 'tr',
            'uk_UA' => 'uk',
            'ko_KR' => 'ko',
            'zh_CN' => 'zh',
            'zh_TW' => 'zh-tw',
            'ja_JP' => 'ja',
            'th_TH' => 'th',
            'id_ID' => 'id',
            'el_GR' => 'gr',
            'fa_IR' => 'fa',
            'vi_VN' => 'vn',
            'bs_BA' => 'bs',
            'mk_MK' => 'mk',
            'my_MY' => 'my',
        );

        $lang = $this->languageModel->getCurrentLanguage();

        return isset($languages[$lang]) ? $languages[$lang] : 'default';
    }

    public function getPluginName()
    {
        return 'Modern DateTime Picker';
    }

    public function getPluginDescription()
    {
        return t('Replaces the jQuery UI DateTime Picker by flatpickr.');
    }

    public function getPluginAuthor()
    {
        return 'Till Schlueter';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/rfde/kanboard-plugin-ModernDateTimePicker';
    }
}


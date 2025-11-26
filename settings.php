<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext(
        'block_chatbotlyon3/api_key',
        get_string('apikey', 'block_chatbotlyon3'),
        get_string('apikey_desc', 'block_chatbotlyon3'),
        '',
        PARAM_ALPHANUMEXT
    ));
}

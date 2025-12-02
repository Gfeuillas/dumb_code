<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new admin_settingpage('block_chatbotlyon3', get_string('pluginname', 'block_chatbotlyon3'));

    $settings->add(new admin_setting_configtext(
        'block_chatbotlyon3/api_key',
        get_string('apikey', 'block_chatbotlyon3'),
        get_string('apikey_desc', 'block_chatbotlyon3'),
        '',
        PARAM_ALPHANUMEXT
    ));

    $settings->add(new admin_setting_configtext(
        'block_chatbotlyon3/api_endpoint',
        get_string('apiendpoint', 'block_chatbotlyon3'),
        get_string('apiendpoint_desc', 'block_chatbotlyon3'),
        '',
        PARAM_URL
    ));

    $ADMIN->add('blocksettings', $settings);
}

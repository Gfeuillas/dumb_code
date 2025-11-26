<?php
defined('MOODLE_INTERNAL') || die();

$functions = [
    'block_chatbotlyon3_log_conversation' => [
        'classname'   => 'block_chatbotlyon3\\external\\log_conversation',
        'method'      => 'execute',
        'description' => 'Log a chatbot question/answer pair for a user.',
        'type'        => 'write',
        'capabilities'=> 'block/chatbotlyon3:addinstance',
        'ajax'        => true,
    ],
];

$services = [
    'block_chatbotlyon3_service' => [
        'functions' => ['block_chatbotlyon3_log_conversation'],
        'restrictedusers' => 0,
        'enabled' => 1,
    ],
];

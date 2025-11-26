<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace block_chatbotlyon3\external;

use context_system;
use external_api;
use external_function_parameters;
use external_value;

defined('MOODLE_INTERNAL') || die();

class log_conversation extends external_api {
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'question' => new external_value(PARAM_RAW, 'User question', VALUE_DEFAULT, ''),
            'answer' => new external_value(PARAM_RAW, 'Chatbot answer', VALUE_DEFAULT, ''),
            'courseid' => new external_value(PARAM_INT, 'Course id', VALUE_DEFAULT, 0),
        ]);
    }

    public static function execute(string $question = '', string $answer = '', int $courseid = 0): array {
        global $DB, $USER;

        $params = self::validate_parameters(self::execute_parameters(), [
            'question' => $question,
            'answer' => $answer,
            'courseid' => $courseid,
        ]);

        require_login();
        $context = context_system::instance();
        self::validate_context($context);
        require_capability('block/chatbotlyon3:addinstance', $context);

        $record = (object) [
            'userid' => $USER->id,
            'question' => $params['question'],
            'answer' => $params['answer'],
            'timecreated' => time(),
            'courseid' => $params['courseid'],
        ];

        $id = $DB->insert_record('block_chatbotlyon3_conversations', $record);

        return [
            'id' => $id,
            'status' => 'logged',
        ];
    }

    public static function execute_returns() {
        return new \external_single_structure([
            'id' => new external_value(PARAM_INT, 'Record id'),
            'status' => new external_value(PARAM_TEXT, 'Insert status'),
        ]);
    }
}

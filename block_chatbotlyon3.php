<?php
defined('MOODLE_INTERNAL') || die();

class block_chatbotlyon3 extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_chatbotlyon3');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $renderer = $this->page->get_renderer('block_chatbotlyon3');

        $this->content = new stdClass();
        $this->content->text = $renderer ? $renderer->render_chatbotlyon3() : '';
        $this->content->footer = '';

        return $this->content;
    }
}

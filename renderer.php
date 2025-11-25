<?php
class block_chatbotlyon3_renderer extends plugin_renderer_base {
    public function render_chatbotlyon3() {
        $this->page->requires->css('/blocks/chatbotlyon3/styles.css');
        $this->page->requires->js('/blocks/chatbotlyon3/amd/src/chatbotlyon3.js');
        return $this->render_from_template('block_chatbotlyon3/chatbotlyon3', []);
    }
}
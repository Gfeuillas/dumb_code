<?php
class block_chatbotlyon3_renderer extends plugin_renderer_base {
    public function render_chatbotlyon3() {
        $this->page->requires->css('/blocks/chatbotlyon3/style.css');
        $this->page->requires->js_call_amd('block_chatbotlyon3/chatbotlyon3', 'init');

        $apikey = get_config('block_chatbotlyon3', 'api_key');

        return $this->render_from_template('block_chatbotlyon3/chatbotlyon3', [
            'apikey' => $apikey ?? '',
        ]);
    }
}

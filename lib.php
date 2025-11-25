<?php
function block_chatbotlyon3_supports($feature) {
    switch ($feature) {
        case 'block/instances':
            return true;
        default:
            return null;
    }
}

<?php
// security.php - Security helper functions

/**
 * Sanitize output for HTML context
 */
function sanitize_output($data, $max_length = null) {
    if ($max_length && is_string($data)) {
        $data = substr($data, 0, $max_length);
    }
    return htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Sanitize input data
 */
function sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sanitize_input', $data);
    }
    return trim(strip_tags($data));
}

/**
 * Validate and sanitize integer ID
 */
function validate_id($id) {
    if (!is_numeric($id) || $id <= 0) {
        return false;
    }
    return intval($id);
}

/**
 * Set security headers
 */
function set_security_headers() {
    header("X-Content-Type-Options: nosniff");
    header("X-Frame-Options: SAMEORIGIN");
    header("X-XSS-Protection: 0"); // Disable legacy XSS filter in favor of CSP
    // CSP will be set in the main file
}
?>
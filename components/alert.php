<?php
function display_alerts($messages, $type) {
    foreach ($messages as $message) {
        echo '<script>swal("' . $message . '","", "' . $type . '");</script>';
    }
}

if (isset($succes_msg)) {
    display_alerts($succes_msg, "success");
}

if (isset($warning_msg)) {
    display_alerts($warning_msg, "warning");
}

if (isset($info_msg)) {
    display_alerts($info_msg, "info");
}

if (isset($error_msg)) {
    display_alerts($error_msg, "error");
}
?>

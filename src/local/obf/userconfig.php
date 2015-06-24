<?php
/**
 * Page for handling user's backpack settings.
 */

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/form/userconfig.php';
require_once __DIR__ . '/class/backpack.php';
require_once __DIR__ . '/class/user_preferences.php';

$error = optional_param('error', '', PARAM_TEXT);
$action = optional_param('action', 'edit', PARAM_TEXT);
$context = context_system::instance();
$url = new moodle_url('/local/obf/userconfig.php', array('action' => $action));

require_login();
require_capability('local/obf:configureuser', $context);

$PAGE->set_context($context);
$PAGE->set_url($url);
$PAGE->set_pagelayout('standard');

$content = $OUTPUT->header();
$backpack = obf_backpack::get_instance($USER);
$obfuserpreferences = new obf_user_preferences($USER->id);
$formurl = new moodle_url('/local/obf/userconfig.php', array('action' => 'update'));
$form = new obf_userconfig_form($formurl,
        array('backpack' => ($backpack === false ? new obf_backpack() : $backpack),
              'userpreferences' => $obfuserpreferences));


switch ($action) {
    case 'edit':
        $content .= $PAGE->get_renderer('local_obf')->render_userconfig($form, $error);
        break;

    case 'update':
        // Disconnect-button was pressed
        if ($form->is_cancelled()) {
            if ($backpack !== false) {
                $backpack->disconnect();
            }

            redirect($url);
        }

        // User configuration was saved.
        else if (($data = $form->get_data())) {
            $obfuserpreferences->save_preferences($data);
            $redirecturl = new moodle_url('/local/obf/userconfig.php', array('action' => 'edit'));
            // If were saving backpack data, we can safely assume that the backpack exists, because it
            // had to be created before (via verifyemail.php)
            if ($backpack !== false) {
                if (isset($data->backpackgroups)) {
                    $backpack->set_groups(array_keys($data->backpackgroups));
                }

                $redirecturl = new moodle_url('/local/obf/userconfig.php', array('action' => 'edit'));

                try {
                    $backpack->save();
                } catch (Exception $e) {
                    $redirecturl->param('error', $e->getMessage());
                }
            }

            redirect($redirecturl);
        }
        $content .= $PAGE->get_renderer('local_obf')->render_userconfig($form, $error);
        break;
    case 'backpack':

        break;

}

$content .= $OUTPUT->footer();
echo $content;
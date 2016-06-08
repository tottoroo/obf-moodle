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

/**
 * Lib for local_obf.
 *
 * @package    local_obf
 * @copyright  2013-2015, Discendum Oy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

/**
 * OBF_DEFAULT_ADDRESS - The URL of Open Badge Factory.
 */
if ( !defined( 'OBF_DEFAULT_ADDRESS' ) )
    define('OBF_DEFAULT_ADDRESS', 'https://openbadgefactory.com/');


/**
 * OBF_API_CONSUMER_ID - The consumer id used in API requests.
 */
define('OBF_API_CONSUMER_ID', 'Moodle');

/**
 * OBF API error codes.
 */
define('OBF_API_CODE_CERT_ERROR', 495);
define('OBF_API_CODE_NO_CERT', 496);

require_once(__DIR__ . '/class/criterion/criterion.php');
require_once(__DIR__ . '/class/criterion/course.php');


/**
 * Reviews the badge criteria and issues the badges (if necessary) when
 * a course is completed.
 *
 * @param stdClass $eventdata
 * @return boolean Returns true if everything went ok.
 */
function local_obf_course_completed(stdClass $eventdata) {
    global $DB;
    require_once(__DIR__ . '/class/event.php');

    $user = $DB->get_record('user', array('id' => $eventdata->userid));
    $backpack = obf_backpack::get_instance($user);

    // If the user has configured the backpack settings, use the backpack email instead of the
    // default email.
    $recipients = array($backpack === false ? $user->email : $backpack->get_email());

    // No capability -> no badge.
    if (!has_capability('local/obf:earnbadge',
                    context_course::instance($eventdata->course),
                    $eventdata->userid)) {
        return true;
    }

    // Get all criteria related to course completion.
    $criteria = obf_criterion::get_course_criterion($eventdata->course);

    foreach ($criteria as $criterionid => $criterion) {
        // User has already met this criterion.
        if ($criterion->is_met_by_user($user)) {
            continue;
        }

        // Has the user completed all the required criteria (completion/grade/date)
        // in this criterion?
        $criterionmet = $criterion->review($eventdata->userid,
                $eventdata->course);

        // Criterion was met, issue the badge.
        if ($criterionmet) {
            $badge = $criterion->get_badge();
            $email = is_null($badge->get_email()) ? new obf_email() : $badge->get_email();
            
            $criteriaaddendum = $criterion->get_use_addendum() ? $criterion->get_criteria_addendum() : '';

            $eventid = $badge->issue($recipients, time(), $email, $criteriaaddendum);
            $criterion->set_met_by_user($user->id);

            if ($eventid && !is_bool($eventid)) {
                $issuevent = new obf_issue_event($eventid, $DB);
                $issuevent->set_criterionid($criterionid);
                $issuevent->save($DB);
            }
        }
    }

    return true;
}

/**
 * 
 * @param stdClass $eventdata
 * @return boolean Returns true if everything went ok.
 */
function local_obf_activity_completion_changed($eventdata) {
    $context = context_module::instance($eventdata->coursemoduleid);
    if ($context && $context->get_course_context()) {
        $eventdata->course = $context->get_course_context()->instanceid;
        local_obf_course_completed($eventdata);
    }
}

/**
 * When the course is deleted, this function deletes also the related badge
 * issuance criteria.
 *
 * @param stdClass $course
 * @return boolean
 */
function local_obf_course_deleted(stdClass $course) {
    global $DB;

    obf_criterion_course::delete_by_course($course, $DB);
    return true;
}

/**
 * Adds the OBF-links to Moodle's navigation, Moodle 2.2 -style.
 *
 * @param global_navigation $navigation Global navigation.
 */
function obf_extends_navigation(global_navigation $navigation) {
    global $COURSE, $PAGE;

    if ($COURSE->id > 1 && $branch = $navigation->find($COURSE->id,
            navigation_node::TYPE_COURSE)) {
        local_obf_add_course_participant_badges_link($branch);
    }

    if (@$PAGE->settingsnav) {
        if (($branch = $PAGE->settingsnav->get('courseadmin'))) {
            $branch = local_obf_add_course_admin_container($branch);
            local_obf_add_course_admin_link($branch);
            local_obf_add_course_event_history_link($branch);
        }

        if (($branch = $PAGE->settingsnav->get('usercurrentsettings'))) {
            local_obf_add_obf_user_preferences_link($branch);
            local_obf_add_obf_user_badge_blacklist_link($branch);
        }
    }
}

/**
 * Adds the OBF-links to Moodle's settings navigation.
 *
 * @param settings_navigation $navigation
 */
function local_obf_extend_settings_navigation(settings_navigation $navigation) {
    global $COURSE;

    if (($branch = $navigation->get('courseadmin'))) {
        $branch = local_obf_add_course_admin_container($branch);
        local_obf_add_course_admin_link($branch);
        local_obf_add_course_event_history_link($branch);
    }

    if (($branch = $navigation->get('usercurrentsettings'))) { // This does not work on Moodle 2.9?
        local_obf_add_obf_user_preferences_link($branch);
        local_obf_add_obf_user_badge_blacklist_link($branch);
    } else if (($branch = $navigation->find('usercurrentsettings', navigation_node::TYPE_CONTAINER))) { // This works on Moodle 2.9.
        local_obf_add_obf_user_preferences_link($branch);
        local_obf_add_obf_user_badge_blacklist_link($branch);
    }
}
/**
 * Adds the OBF-links to Moodle's settings navigation on older Moodle versions.
 *
 * @param settings_navigation $navigation
 */
function local_obf_extends_settings_navigation(settings_navigation $navigation) {
    local_obf_extend_settings_navigation($navigation);
}

/**
 * Adds the OBF-links to Moodle's navigation.
 *
 * @param global_navigation $navigation
 */
function local_obf_extend_navigation(global_navigation $navigation) {
    global $PAGE, $COURSE;

    // Course id 1 is Moodle.
    if ($COURSE->id > 1 && $branch = $PAGE->navigation->find($COURSE->id,
            navigation_node::TYPE_COURSE)) {
        local_obf_add_course_participant_badges_link($branch);
    }
}
/**
 * Adds the OBF-links to Moodle's navigation in Moodle 2.8 and older.
 *
 * @param global_navigation $navigation
 */
function local_obf_extends_navigation(global_navigation $navigation) {
    local_obf_extend_navigation($navigation);
}
/**
 * Adds the OBF admin-links container.
 *
 * @param type& $branch Branch where to add the container node.
 */
function local_obf_add_course_admin_container(&$branch) {
    global $COURSE;

    if (has_capability('local/obf:viewhistory', context_course::instance($COURSE->id)) ||
                    has_capability('local/obf:issuebadge', context_course::instance($COURSE->id))) {
        $node = navigation_node::create(get_string('obf', 'local_obf'),
                null, navigation_node::TYPE_CONTAINER, null, 'obf');
        $backupnode = $branch->find('backup', navigation_node::TYPE_SETTING);
        return $branch->add_node($node, $backupnode != false ? 'backup' : null);
    }
    return $branch;
}
/**
 * Adds the link to course navigation to see the badges of course participants.
 *
 * @param navigation_node& $branch Branch where to add the container node.
 */
function local_obf_add_course_participant_badges_link(&$branch) {
    global $COURSE;

    if (has_capability('local/obf:seeparticipantbadges',
                    context_course::instance($COURSE->id))) {
        $node = navigation_node::create(get_string('courseuserbadges',
                                'local_obf'),
                        new moodle_url('/local/obf/courseuserbadges.php',
                        array('courseid' => $COURSE->id, 'action' => 'badges')));
        $branch->add_node($node);
    }
}
/**
 * Adds the link to course navigation to see the event history related to course.
 *
 * @param type& $branch
 */
function local_obf_add_course_event_history_link(&$branch) {
    global $COURSE;

    if (has_capability('local/obf:viewhistory',
                    context_course::instance($COURSE->id))) {
        $node = navigation_node::create(get_string('courseeventhistory',
                                'local_obf'),
                        new moodle_url('/local/obf/courseuserbadges.php',
                        array('courseid' => $COURSE->id, 'action' => 'history')));
        $branch->add_node($node);
    }
}

/**
 * Adds the OBF-links to course management navigation.
 *
 * @param type& $branch
 */
function local_obf_add_course_admin_link(&$branch) {
    global $COURSE;

    if (has_capability('local/obf:issuebadge',
                    context_course::instance($COURSE->id))) {
        $obfnode = navigation_node::create(get_string('obf', 'local_obf'),
                        new moodle_url('/local/obf/badge.php',
                        array('action' => 'list', 'courseid' => $COURSE->id)));
        $branch->add_node($obfnode);
    }
}

/**
 * Adds the user preferences configuration link to navigation.
 *
 * @param type& $branch
 */
function local_obf_add_obf_user_preferences_link(&$branch) {
    $node = navigation_node::create(get_string('obfuserpreferences', 'local_obf'),
                    new moodle_url('/local/obf/userconfig.php'));
    $branch->add_node($node);
}

/**
 * Adds the user badge blacklist configuration link to navigation.
 *
 * @param type& $branch
 */
function local_obf_add_obf_user_badge_blacklist_link(&$branch) {
    $node = navigation_node::create(get_string('badgeblacklist', 'local_obf'),
                    new moodle_url('/local/obf/blacklist.php'));
    $branch->add_node($node);
}

/**
 * Adds OBF badges to profile pages.
 *
 * @param \core_user\output\myprofile\tree $tree
 * @param stdClass $user
 * @param bool $iscurrentuser
 * @param moodle_course $course
 */
function local_obf_myprofile_navigation(\core_user\output\myprofile\tree $tree, $user, $iscurrentuser, $course) {
    require_once(__DIR__ . '/class/user_preferences.php');
    global $PAGE, $DB;
    $show = obf_user_preferences::get_user_preference($user->id, 'badgesonprofile') == 1;
    if ($show) {
        $category = new core_user\output\myprofile\category('local_obf/badges', get_string('profilebadgelist', 'local_obf'), null);
        $tree->add_category($category);
        $assertions = local_obf_myprofile_get_assertions($user->id, $DB);
        if ($assertions !== false && count($assertions) > 0) {
            $title = get_string('profilebadgelist', 'local_obf');
            $renderer = $PAGE->get_renderer('local_obf');
            $content = $renderer->render_user_assertions($assertions, $user, false);
            $localnode = $mybadges = new core_user\output\myprofile\node('local_obf/badges', 'obfbadges',
                    '', null, null, $content, null, 'local-obf');
            $tree->add_node($localnode);
        }

        foreach (obf_backpack::get_providers() as $provider) {
            $bpassertions = local_obf_myprofile_get_backpack_badges($user->id, $provider, $DB);
            if ($assertions !== false && count($bpassertions) > 0) {
                $name = obf_backpack::get_providershortname_by_providerid($provider);
                $fullname = obf_backpack::get_providerfullname_by_providerid($provider);
                $title = get_string('profilebadgelistbackpackprovider', 'local_obf', $fullname);
                $renderer = $PAGE->get_renderer('local_obf');
                $content = $renderer->render_user_assertions($bpassertions, $user, false);
                $localnode = $mybadges = new core_user\output\myprofile\node('local_obf/badges', 'obfbadges'.$name,
                        $title, null, null, $content, null, 'local-obf');
                $tree->add_node($localnode);
            }
        }
    }
}
/**
 * Returns cached assertions for user
 *
 * @param int $userid
 * @param moodle_database $db
 * @return obf_assertion_collection
 */
function local_obf_myprofile_get_assertions($userid, $db) {
    $cache = cache::make('local_obf', 'obf_assertions');
    $assertions = $cache->get($userid);

    if (!$assertions) {
        require_once(__DIR__ . '/class/blacklist.php');
        // Get user's badges in OBF.
        $assertions = new obf_assertion_collection();
        try {
            $client = obf_client::get_instance();
            $blacklist = new obf_blacklist($userid);
            $assertions->add_collection(obf_assertion::get_assertions($client,
                    null, $db->get_record('user', array('id' => $userid))->email, -1, true ));
            $assertions->apply_blacklist($blacklist);
        } catch (Exception $e) {
            debugging('Getting OBF assertions for user id: ' . $userid . ' failed: ' . $e->getMessage());
        }

        $assertions->toArray(); // This makes sure issuer objects are populated and cached.
        $cache->set($userid, $assertions );
    }
    return $assertions;
}

/**
 * Returns cached backpack badges for user
 *
 * @param int $userid
 * @param int $provider Backpack provider. obf_backpack::BACKPACK_PROVIDER_*.
 * @param moodle_database $db
 * @return obf_assertion_collection
 */
function local_obf_myprofile_get_backpack_badges($userid, $provider, $db) {
    $backpack = obf_backpack::get_instance_by_userid($userid, $db, $provider);
    if ($backpack === false || count($backpack->get_group_ids()) == 0) {
        return new obf_assertion_collection();
    }
    $cache = cache::make('local_obf', 'obf_assertions_backpacks');
    $userassertions = $cache->get($userid);
    $shortname = obf_backpack::get_providershortname_by_providerid($provider);

    if (!$userassertions || !array_key_exists($shortname, $userassertions)) {
        require_once(__DIR__ . '/class/blacklist.php');
        if (!is_array($userassertions)) {
            $userassertions = array();
        }
        $assertions = new obf_assertion_collection();
        try {
            $client = obf_client::get_instance();
            $blacklist = new obf_blacklist($userid);
            $assertions->add_collection( $backpack->get_assertions() );
            $assertions->apply_blacklist($blacklist);
        } catch (Exception $e) {
            debugging('Getting OBF assertions for user id: ' . $userid . ' failed: ' . $e->getMessage());
        }

        $assertions->toArray(); // This makes sure issuer objects are populated and cached.
        $userassertions[$shortname] = $assertions;
        $cache->set($userid, $userassertions );
    } else {
        $userassertions[$shortname] = new obf_assertion_collection();
    }

    return $userassertions[$shortname];
}

/**
 * Checks the certificate expiration of the OBF-client and sends a message to admin if the
 * certificate is expiring. This function is called periodically when Moodle's cron job is run.
 * The interval is defined in version.php.
 *
 * @return boolean
 */
function local_obf_cron() {
    global $CFG;

    require_once($CFG->libdir . '/messagelib.php');
    require_once($CFG->libdir . '/datalib.php');

    $certexpiresin = obf_client::get_instance()->get_certificate_expiration_date();
    $diff = $certexpiresin - time();
    $days = floor($diff / (60 * 60 * 24));

    // Notify only if there's certain amount of days left before the certification expires.
    $notify = in_array($days, array(30, 25, 20, 15, 10, 5, 4, 3, 2, 1));

    if (!$notify) {
        return true;
    }

    $severity = $days <= 5 ? 'errors' : 'notices';
    $admins = get_admins();
    $textparams = new stdClass();
    $textparams->days = $days;
    $textparams->obfurl = get_config('local_obf', 'apiurl');

    foreach ($admins as $admin) {
        $eventdata = new object();
        $eventdata->component = 'moodle';
        $eventdata->name = $severity;
        $eventdata->userfrom = $admin;
        $eventdata->userto = $admin;
        $eventdata->subject = get_string('expiringcertificatesubject',
                'local_obf');
        $eventdata->fullmessage = get_string('expiringcertificate', 'local_obf',
                $textparams);
        $eventdata->fullmessageformat = FORMAT_PLAIN;
        $eventdata->fullmessagehtml = get_string('expiringcertificate',
                'local_obf', $textparams);
        $eventdata->smallmessage = get_string('expiringcertificatesubject',
                'local_obf');

        $result = message_send($eventdata);
    }

    return true;
}

// Moodle 2.2 -support.
if (!function_exists('users_order_by_sql')) {

    /**
     * This function generates the standard ORDER BY clause for use when generating
     * lists of users. If you don't have a reason to use a different order, then
     * you should use this method to generate the order when displaying lists of users.
     *
     * COPIED FROM THE CODE OF MOODLE 2.5
     *
     * @param string $usertablealias
     * @param string $search
     * @param context $context
     */
    function users_order_by_sql($usertablealias = '', $search = null,
                                context $context = null) {
        global $DB, $PAGE;

        if ($usertablealias) {
            $tableprefix = $usertablealias . '.';
        } else {
            $tableprefix = '';
        }

        $sort = "{$tableprefix}lastname, {$tableprefix}firstname, {$tableprefix}id";
        $params = array();

        if (!$search) {
            return array($sort, $params);
        }

        if (!$context) {
            $context = $PAGE->context;
        }

        $exactconditions = array();
        $paramkey = 'usersortexact1';

        $exactconditions[] = $DB->sql_fullname($tableprefix . 'firstname',
                        $tableprefix . 'lastname') .
                ' = :' . $paramkey;
        $params[$paramkey] = $search;
        $paramkey++;

        $fieldstocheck = array_merge(array('firstname', 'lastname'),
                get_extra_user_fields($context));
        foreach ($fieldstocheck as $key => $field) {
            $exactconditions[] = 'LOWER(' . $tableprefix . $field . ') = LOWER(:' . $paramkey . ')';
            $params[$paramkey] = $search;
            $paramkey++;
        }

        $sort = 'CASE WHEN ' . implode(' OR ', $exactconditions) .
                ' THEN 0 ELSE 1 END, ' . $sort;

        return array($sort, $params);
    }

}

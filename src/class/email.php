<?php

class obf_email {

    private $id = -1;
    private $badge_id = null;
    private $subject = '';
    private $body = '';
    private $footer = '';

    public static function get_by_badge(obf_badge $badge) {
        global $DB;

        $record = $DB->get_record('obf_email_templates', array('badge_id' => $badge->get_id()));

        if ($record !== false) {
            $obj = new self();
            $obj->set_badge_id($badge->get_id())
                    ->set_id($record->id)
                    ->set_subject($record->subject)
                    ->set_body($record->body)
                    ->set_footer($record->footer);
            return $obj;
        }
        
        return null;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function get_badge_id() {
        return $this->badge_id;
    }

    public function set_badge_id($badge_id) {
        $this->badge_id = $badge_id;
        return $this;
    }

    public function get_subject() {
        return $this->subject;
    }

    public function set_subject($subject) {
        $this->subject = $subject;
        return $this;
    }

    public function get_body() {
        return $this->body;
    }

    public function set_body($body) {
        $this->body = $body;
        return $this;
    }

    public function get_footer() {
        return $this->footer;
    }

    public function set_footer($footer) {
        $this->footer = $footer;
        return $this;
    }

    /**
     *
     * @global moodle_database $DB
     */
    public function save() {
        global $DB;

        $obj = new stdClass();
        $obj->subject = $this->subject;
        $obj->body = $this->body;
        $obj->footer = $this->footer;
        $obj->badge_id = $this->badge_id;

        if ($this->id > 0) {
            $obj->id = $this->id;
            $DB->update_record('obf_email_templates', $obj);
        } else {
            $DB->insert_record('obf_email_templates', $obj);
        }
    }

}

?>
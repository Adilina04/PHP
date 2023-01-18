<?php

class DbObject {
    public function getCreatedAt() {
		$date = new DateTime($this->$created_at);
		return $date->format('d/m/Y H:i:s');
	}
}

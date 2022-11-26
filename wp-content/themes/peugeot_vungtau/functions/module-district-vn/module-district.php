<?php

function get_district_vi() {
	$json = file_get_contents(__DIR__."/tinh_tp.json");
	return json_decode($json, true);

}

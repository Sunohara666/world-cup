<?php

$file[0] = '/data/projects/techsessions/world-cup/worldcup.teams.json';
$file[1] = '/data/projects/techsessions/world-cup/worldcup.teams-2.json';

$filec[0] = file_get_contents($file[0]);
$filec[1] = file_get_contents($file[1]);

$data[0] = json_decode($filec[0], 1);
$data[1] = json_decode($filec[1], 1);

$t[0] = [];
$t[1] = [];

foreach($data[0]['teams'] as $team) {
    @$t[0][$team['name']]++;
}

foreach($data[1]['teams'] as $team) {
    @$t[1][$team['name']]++;
}

$singles = [];

foreach($t[0] as $name => $dummy) {
    if(!isset($t[1][$name])) {
        @$singles[$name . ' case 1']++;
    }
}

foreach($t[1] as $name => $dummy) {
    if(!isset($t[0][$name])) {
        @$singles[$name . ' case 2']++;
    }
}

print_r(array_keys($singles));

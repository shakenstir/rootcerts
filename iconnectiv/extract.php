#!/usr/bin/env php
<?php

$list = json_decode(file_get_contents('ca-list.json'), true);

foreach ($list['trustList'] as $c) {
	$parsed = openssl_x509_parse(openssl_x509_read($c));
	$ski = $parsed['extensions']['subjectKeyIdentifier'];
	if (strlen($ski) !== 59) {
		throw new \Exception("'$ski' invalid, not 59 chars long");
	}
	$filename = genFilename($parsed);
	$dest = __DIR__."/../$filename";
	if (!file_exists($dest)) {
		print "$filename missing\n";
		file_put_contents($dest, $c);
	}
}


function genFilename(array $parsed): string {
	$cn = str_replace([" ",",","."], ["_"], strtolower($parsed['subject']['CN']));
	$sn = strtolower($parsed['serialNumberHex']);
	return "$cn-$sn.crt";
}



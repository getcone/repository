<?php
foreach(scandir(".") as $file)
{
	if(substr($file, -5) != ".json")
	{
		continue;
	}
	$json = json_decode(file_get_contents($file), true);
	usort($json, function($a, $b)
	{
		return strcmp($a["name"], $b["name"]);
	});
	file_put_contents($file, str_replace("    ", "\t", json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)));
}

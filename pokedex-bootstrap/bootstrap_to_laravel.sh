#!/bin/bash

cd $1

export_folder_rest=../../laravel/public/assets/
export_folder_php=../../laravel/resources/views/

function explore_and_export {
	local param=$1
	for filename in $param*; do
		if [[ "$filename" != "assets" && "$filename" != "templates" ]]; then
			if [ -f $filename ]; then
				to_file="$export_folder_php$(echo "$filename" | cut -f 1 -d '.').blade.php"
				cp -f $filename $to_file
			else
				mkdir $export_folder_php$filename 2>/dev/null
				explore_and_export "$filename/";
			fi
		fi
	done
}

rm $export_folder_php/../welcome.blade.dontremove 2>/dev/null
mv $export_folder_php/welcome.blade.php $export_folder_php/../welcome.blade.dontremove
rm $export_folder_php/../dashboard.blade.dontremove 2>/dev/null
mv $export_folder_php/dashboard.blade.php $export_folder_php/../dashboard.blade.dontremove
rm -rf $export_folder_php/../layouts.dontremove 2>/dev/null
mv $export_folder_php/layouts $export_folder_php/../layouts.dontremove
rm -rf $export_folder_php/../auth.dontremove 2>/dev/null
mv $export_folder_php/auth $export_folder_php/../auth.dontremove
rm -rf $export_folder_php/../components.dontremove 2>/dev/null
mv $export_folder_php/components $export_folder_php/../components.dontremove

rm -rf $export_folder_php/* 2>/dev/null

mv $export_folder_php/../welcome.blade.dontremove $export_folder_php/welcome.blade.php
mv $export_folder_php/../dashboard.blade.dontremove $export_folder_php/dashboard.blade.php
mv $export_folder_php/../auth.dontremove $export_folder_php/auth
mv $export_folder_php/../components.dontremove $export_folder_php/components
mv $export_folder_php/../layouts.dontremove $export_folder_php/layouts

explore_and_export ""

find $export_folder_php \( -type d -name .git -prune \) -o -type f -print0 | xargs --null sed -i "s/\\.html//g"

rm -rf $export_folder_rest/*

cp -r ./assets/* $export_folder_rest



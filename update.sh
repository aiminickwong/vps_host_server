#!/bin/bash
export base="$(readlink -f "$(dirname "$0")")";
git pull --all -f || rsync -av rsync://vpsadmin.interserver.net/vps/cpaneldirect/ ${base}/

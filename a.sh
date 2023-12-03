#!/bin/bash

VERTEXT="1.0.0"
HELPTEXT="Usage:
    a [command]
Misc:
    -v & --version: Print version number
    -h & --help: Print help page"

while [[ $# -gt 0 ]]; do
    case "$1" in
        -v|--version)
            echo "A version $VERTEXT (https://visually-outgoing-aphid.ngrok-free.app)"
            ;;
        -h|--help)
            echo "$HELPTEXT"
            ;;
        *)
            echo "$HELPTEXT"
            echo "You enterd invalid command."
            ;;
    esac
    shift
done

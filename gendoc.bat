@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
vendor\bin\phpdoc -d "./src" -t "./docs/api" --template="responsive-twig"
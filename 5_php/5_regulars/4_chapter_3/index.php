<?
require "../../base.php";

use Michelf\MarkdownExtra;

echo MarkdownExtra::defaultTransform(file_get_contents('README.md'));

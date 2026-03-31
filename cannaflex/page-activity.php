<?php
/**
 * Template Name: Activity
 * Template Post Type: page
 *
 * Compositional dispatcher — each section is a template part.
 * Matches: CANNAFLEX WEBSITE Activity page.pdf
 *
 * @package Cannaflex
 */

get_header();

// Section order matches PDF UX flow:
// Intro → Value Chain Blocks → Certifications
get_template_part('template-parts/sections/activity/intro');
get_template_part('template-parts/sections/activity/value-chain');
get_template_part('template-parts/sections/activity/certifications');

get_footer();

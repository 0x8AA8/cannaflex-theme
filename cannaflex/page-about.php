<?php
/**
 * Template Name: About
 * Template Post Type: page
 *
 * Compositional dispatcher — each section is a template part.
 * Matches: CANNAFLEX WEBSITE About page.pdf
 *
 * @package Cannaflex
 */

get_header();

// Section order matches PDF UX flow:
// Intro → Mission → Values → Team → CTA Strip
get_template_part('template-parts/sections/about/intro');
get_template_part('template-parts/sections/about/mission');
get_template_part('template-parts/sections/about/values');
get_template_part('template-parts/sections/about/team');
get_template_part('template-parts/sections/about/cta-strip');

get_footer();

<?php
/**
 * Template: Front Page (Home)
 *
 * Compositional dispatcher — each section is a template part.
 * Matches: CANNAFLEX WEBSITE Home page.pdf
 *
 * @package Cannaflex
 */

get_header();

// Section order matches PDF UX flow:
// Hero → About → Seed-to-Shelf → Products → Brands → News → Posts → Contact
get_template_part('template-parts/sections/home/hero');
get_template_part('template-parts/sections/home/about');
get_template_part('template-parts/sections/home/seed-flow');
get_template_part('template-parts/sections/home/products');
get_template_part('template-parts/sections/home/brands');
get_template_part('template-parts/sections/home/news-timeline');
get_template_part('template-parts/sections/home/recent-posts');
get_template_part('template-parts/sections/home/contact-cta');

get_footer();

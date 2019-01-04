# Smashing Splitted CSS

## Combining LESS Files

- above-the-fold.less
- archive-pages.less
- articles-only.less
- below-articles.less
- comments.less
- contact.less
- main.less
- search-results.less

### Above the Fold

The output `above-the-fold.css` and `above-the-fold.min.css` are put inline in the `<head>` section just below the `<title>`, the charset meta and the `preconnect` & `dns-prefetch` block.

The CSS targets all contents above the fold from a 320x480px viewport up to 1600x900px.

____

### Archive Pages

The output `archive-pages.css` and `archive-pages.min.css` will be enqueued with `preload` and `loadCSS` only on archive pages after the main stylesheet.

#### Example archive pages:

- category
- tags
- author

____

### Article Only

`article-only.css` and `article-only.min.css` will be enqueued with `preload` and `loadCSS` only for `is_single()`.

#### What's covered

Styles only needed inside articles but not in the excerpts:

- Article Contents
- Editorial Styles
- Prism

### Below Articles

The related CSS files will be enqueued with `loadCSS` only for `is_single()`. No need to preload those styles as they are only needed much further down the page.

#### What's covered

From top to bottom inside articles and pages:

- Post Pagination
- Editor's note
- Tags below articles
- Social Media Share Buttons
- Back-to-Top Link inside articles
- Related Articles
- Author Bio

____

### Comments

The comments section is only featured inside articles and pages. As with the below articles stylesheet it can be enqueued with `loadCSS`.

#### What's covered

- Ad above comments
- Comment Count display
- Comment Section
- Comment Form
- Comment Plugin CSS (Rating)

____

### Contact

The CSS is only needed on the contact form page in the Magazine. It can be enqueued with `loadCSS`.

____

### Main Stylesheet

All styles only needed on user-interaction and below-the-fold. This file is enqueued with `preload` and `loadCSS`.

____

### Search Results

This stylesheet is only needed on the Search Results Page inside the Magazine. Can be enqueued with `loadCSS`.

# Smashing Magazine

## Styleguide

The first paragraph of every article will be styled differently from all the others, hence there can't be any other code before it or you will break the pattern. It will be displayed in "Skolar Regular" and with a bigger font-size of 1.25em. If you want a part of it to be of even more importance, you can use the `<strong>` tag (displayed in <strong>Skolar Bold</strong>) or use the `<em>` tag (displayed in `<em>Skolar Italic</em>`). We also have `<a href="#">Links</a>` of course, if you needed them. Or if content is outdated/needs adjustments, you can put some `<del>line-through</del>` on it as well and `<ins>insert updated text for it</ins>`. Using `<code>` to markup code is also a possibility. Add <sup>superscript</sup> or <sub>subscript</sub> where it makes sense.

### The Smashing Magazine Styleguide - Episode 1

I'll try and gather as much code snippets and use-cases as I can and put it all in here in order to create some sort of styleguide for our authors and editors. After some versioning and proofreading and whatnot, we might as well put it out there for the public to see and be in awe. Who knows.

### Typography

#### Paragraphs, strong, em, del, a - apart from the first paragaph above

Here we go with the standard paragraph for the Smashing Magazine blog coming in "Proxima Nova Regular" (for brevity from now on only "Proxima") and 1.125em (18px) font-size. If you want a part of it to be of even more importance, you can use the `<strong>` tag (displayed in `<strong>Proxima Bold</strong>`) or use the `<em>` tag (displayed in `<em>Proxima Italic</em>`).
Links make the web what it is, so in order to create `<a href="#">Links</a>` you should, of course, use the anchor tag: `<a href="#">Linked Text</a>`.

You can use the `<del>` tag to line-through words: `<del>a line through my text</del>` and `<ins>` to `<ins>insert replacements</ins>`.

In order to write superscript or subscript, you may use `<sup>` or `<sub>` respectively: `<sup>superscript</sup>` and `<sub>subscript</sub>` do not interfere with the line-height.

Marking text for reference purpose is possible by adding `<mark>` `<mark>around the characters</mark>` of your paragraph you want to highlight. An explanation on `<em>when</em>` to use the element can be found at the [Mozilla Dev-Docs](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark).

#### Preformatted Text - Code Examples

In order to provide preformatted code examples with your article, you will want to use the `<pre>` tag in combination with the `<code>` tag. By adding a class of `language-*` to the code tag, you can give our syntax-highlighter <a href="https://prismjs.com">Prism</a> (by <a href="https://twitter.com/leaverou">Lea Verou</a>) hints at what he is going to highlight for our readers.

Currently we're supporting the following languages: see section "Codepen".

*Note:* When writing HTML/Markup please remember to use escape-characters instead of `<` and `>` inside the code element!

Here's for what the code would look like, if you wanted to show readers some markup-example inside your article:

```html
<pre><code class="language-markup">
Some HTML goes here.
</code></pre>
```

#### Blockquotes

Blockquotes are pretty straight-forward. Use `<blockquote>` and add some text. It will be displayed in Skolar Italic at a slightly bigger font-size than normal text and has a light-gray background, thus it really stands out. So, <em>this:</em>

```html
<blockquote>This is a wonderful blockquote.<br />
–  Marco Hengstenberg</blockquote>
```

Will result in *that:*

```html
<blockquote>This is a wonderful blockquote.<br />
–  Marco Hengstenberg
</blockquote>
```

### Headlines:

* Section Headlines –  Skolar Bold, 1.5em
* Subsection Headline –  Proxima Bold, uppercase, 1em
* Subsection Sub-Headline –  Proxima Bold, 1em, barely used

### Section Headlines - h3

* Subsection Headline - h4
* Subsection Sub-Headline - h5

### Headlines –  new hierarchy

* Section Headlines - h3
* Subsection Headline - h4
* `<h5 style="text-transform: uppercase; font-weight: 400; font-size: 1em;">`Subsection Sub-Headline - h5
* `<h6 style="font-weight:700;font-size:1.125em;margin:1.5em 0 .5em;">`Subsection Subheadline-Sub Sub Sub 'sup - h6


### Lists
```html
<ul>
<li>This is</li>
<li>an unordered</li>
<li>list with</li>
<li>four items.
  <ul>
    <li>And here are</li>
    <li>three (additional)</li>
    <li>list sub-items.</li>
  </ul>
</li>
</ul>

<ol>
<li>This is</li>
<li>an ordered</li>
<li>list with</li>
<li>four items.
  <ol>
    <li>And here are</li>
    <li>three (additional)</li>
    <li>list sub-items.</li>
  </ol>
</li>
</ol>
```

### Embedded Contents

#### Imagery

##### Standard Image

```html
<figure><img src="https://placehold.it/500x350" alt="Placeholder Image" /></figure>
```


##### An Image With A Link Around It

```html
<figure><a href="#"><img src="https://placehold.it/500x350" alt="Placeholder Image" /></a></figure>
```


##### An Image With A Caption

```html
<figure><img src="https://placehold.it/500x350" alt="Placeholder Image" /><figcaption>This is a cpation to the image above.</figcaption></figure>
```

Please make sure the `<figcaption>` element follows the `<img>` element without any whitespace. Otherwise Wordpress will put `<p>` tags around the figcaption and thusly add to the vertical spacing, which is unwanted.

##### An Image With A Link And A Caption With Another Link

```html
<figure><img src="https://placehold.it/500x350" alt="Placeholder Image" /><figcaption>This is a cpation to the <a href="#">image</a> above.</figcaption></figure>
```

#### Video Contents

##### Keeping the aspect-ratio

In order to maintain the aspect-ratio of videos, we <em>always</em> have to place a container around the `<iframe>`, `<object>` or `<embed>` referencing the source. Please make sure to remove (if given) the height and width attributes on the iframe in order to make the video scale without any hassle. <strong>Note:</strong> If the width of video exceeds 850 pixels, then it won't be a problem and the width-attribute can stay where it is, as the article's container won't scale above that value –  also, if someone wants a bigger view, there's always <em>fullscreen</em>.

The following code:

```html
<figure class="aspect-ratio">
  <iframe src="https://vimeo.com/21597685" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</figure>
```

will result in this:

```html
<figure class="aspect-ratio">
<iframe src="https://player.vimeo.com/video/21597685?color=ededec&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</figure>
```

##### A Video With A Caption

In order to display a caption to a video, you need to follow the same pattern as when adding a caption to an image. Yet, as the iframe element will be absolutely positioned you need to add a `<div>` to wrap the container and thereby make the `<figcaption>` element behave –  and not jump up and hide behind the video.

I'm currently fixing a bug preventing the video from spanning the whole width of the article.

```html
<figure>
  <div class="aspect-ratio">
    <iframe src="#" frameborder="0" allowfullscreen></iframe>
  </div><figcaption>Some caption to the embedded video content</figcaption>
<figure>
```

#### Codepen Embed

As you may have realized alreay, there was no mention on SVG. There is a shortcode to embed Codepens and it has a few options to choose from. `&#91;codepen_embed %settings% caption="{text}"] {text} &#91;/codepen_embed]` this is what the shortcode will look like.


## Codepen Embeds

### Pick the Shortcode

We are working closely to the original embed-code given by the Codepen Website thus editors won't have to worry too much about syntax and also won't have to type much themselves.

![image](https://cloud.githubusercontent.com/assets/3417446/7510141/627bfc7e-f499-11e4-865c-a1218ff7b6b3.png)

### Shortcode

Shortcode: `[codepen_embed %settings% caption="{text}"] {text} [/codepen_embed]`

Additionally we added the Shortcode for automatically adding a caption to a Codepen embed (see above).

### Settings

In case someone wanted to customize the way the embed is displayed inside the article, we can sure have that (whereas we haven't been using it so far at all).

| Attribute | Default | Note
|---|---|---|
| theme_id |  - | 0
| slug_hash | - | Required
| user |  - |    Not required
| default_tab |  result |  html/css/js/result
| height |    300 |  Not a part of themes
| show_tab_bar | true | true/false, PRO only
| animations |   run |  run/stop-after-5
| border | none | none/thin/thick
| border_color | #000000 | Hex Color Code
| tab_bar_color    | #3d3d3e | Hex Color Code
| tab_link_color   | #76daff | Hex Color Code
| active_tab_color | #cccccc | Hex Color Code
| active_link_color| #000000 | Hex Color Code
| link_logo_color  | #ffffff | Hex Color Code
| custom_css_url |   - |    URL to CSS-File

## Prism.js - Smashing Syntax Highlighting

### [!] Changes in `prism.js`-script

I've removed the following code block completely:

```js
document.addEventListener&&!r.hasAttribute("data-manual")&&document.addEventListener("DOMContentLoaded",n.highlightAll)
```

and called the `Prism.highlightAll()` and the bottom of the script file. We're loading the script now async and on DOMContentLoaded, so the JS-execution of highlighting the code can be done directly in script.

### How to use Prism in articles

Here the basic markup you need to have in place for Prism to highlight the code example

```
<pre><code class="language-*">
  Some Code goes here
</code></pre>
```

The asterisk stands for any type of language used inside the code example.

### Languages and their classes

|Language|Classname|
|---|---|
|Apache|language-apacheconf|
|C|language-c|
|C++|language-cpp|
|C-like|language-clike|
|CSS|language-css|
|Git|language-git|
|Go|language-go|
|HTTP|language-http|
|JSON|language-json|
|LESS|language-less|
|Make|language-makefile|
|Markdown|language-markdown|
|Markup|language-markup|
|NGINX|language-nginx|
|Objective-C|language-objectivec|
|Perl|language-perl|
|PHP|language-php|
|Powershell|language-powershell|
|Python|language-python|
|Sass|language-sass|
|Scss|language-scss|
|SQL|language-sql|
|Stylus|language-stylus|
|YAML|language-yaml|


## How to use Tablesaw in Smashing Magazine articles

### 1. Activate tablesaw.js

To use [Tablesaw](https://github.com/filamentgroup/tablesaw) in articles its script of the same name needs to be activated. In order to do this you will need to check the box inside the "Custom Post Options" (on `post.php` right under the textarea of your article) in the WordPress backend. Next to the checkbox you can read "Enable the tablesaw-JS for responsive tables"

![Enabling Tablesaw in the WordPress backend](tablesaw-usage-screen-01.png)

By doing so and saving your draft `tablesaw.js` and `jquery.js` will now be sent to the user when requesting your article.

### 2. Markup

Example Markup for a table with all needed attributes and values.

Give your table a class of `tablesaw`, the attribute/value combination of `data-tablesaw-mode="swipe"` and the boolean `data-tablesaw-minimap`. There were other options but this is the most handy and reliable one in the context of the design of Smashing Magazine.

In order to make the first column persistent you can add `data-tablesaw-priority="persist"` to the first `<th>` element in the `<thead>` element.

```
<table class="tablesaw" data-tablesaw-mode="swipe" data-tablesaw-minimap>
  <thead>
    <tr>
      <th data-tablesaw-priority="persist">Table Headline</th>
      <th>Table Headline</th>
      <th>Table Headline</th>
      <th>Table Headline</th>
      <th>Table Headline</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>First Row</td>
      <td>First Row</td>
      <td>First Row</td>
      <td>First Row</td>
      <td>First Row</td>
    </tr>
    <tr>
      <td>Second Row</td>
      <td>Second Row</td>
      <td>Second Row</td>
      <td>Second Row</td>
      <td>Second Row</td>
    </tr>
    <tr>
      <td>Third Row</td>
      <td>Third Row</td>
      <td>Third Row</td>
      <td>Third Row</td>
      <td>Third Row</td>
    </tr>
    <tr>
      <td>Fourth Row</td>
      <td>Fourth Row</td>
      <td>Fourth Row</td>
      <td>Fourth Row</td>
      <td>Fourth Row</td>
    </tr>
    <tr>
      <td>Fifth Row</td>
      <td>Fifth Row</td>
      <td>Fifth Row</td>
      <td>Fifth Row</td>
      <td>Fifth Row</td>
    </tr>
  </tbody>
</table>
```

If the first column is not persistent, just use all the same markup but without the `data-tablesaw-priority="persist"` attribute/value combination on the `<th>` element. It is totally possible to use this on more than one column or just on the 2nd, 3rd or n-th column.

After setting the table up, you may again save your draft and preview your doings in the frontend.

### Output

If you followed the markup conventions what you get should look something like this example I made a screenshot of:

![Example output inside an article](tablesaw-usage-screen-02.png)

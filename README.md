# Omitsis WordPress Challenge

Thanks for taking this challenge! We hope it'll help to know each other better. Please don't panic if you find anything you don't know how to resolve yet.


## Objective

We are interested in testing your ability to:

- Follow instructions;
- Follow code conventions;
- Estimate timing of tasks;
- and most importantly, achieve new knowledge on your own.


## Prerequisites

- Your computer must be able to run docker containers using `docker compose`.
- You must have a GitHub user account.


## Tasks

You'll be asked to complete some tasks which involve some of the capabilities required in our day-to-day work:

- Handle code via git;
- Using docker containers–you won't need to setup anything, just use them;
- Basic composer usage;
- Command line abilities;
- English reading comprehension;
- Templating with plain PHP using WordPress methods;
- Marking up HTML content properly;
- Styling using CSS—no libs allowed!;
- Setting up some simple behaviours using vanilla Javascript (again, no libs);
- Elaborating a couple of plain SQL queries on a…
- Custom WP CLI command;
- Setting up a Custom Post Type with additional fields using Advanced Custom Fields in plain PHP (no GUI allowed);
- Asking for help when you need it.

You won't be asked to fulfill all the tasks, but some selected ones. We want to learn about your ability to solve problems—but we are not interested in devouring your spare time.

Feel free to use any helpers you may need: usage of Copilot, ChatGPT, forums, etc. is totally allowed. But be aware that we'll ask you to explain your solutions. RTFM'ing is recommended.

IMPORTANT: If you feel stuck on any step, please contact your instructors. They will help and guide you. We do not expect you to know all about everything, we are looking for people who is able to learn and grow.

For any of the required tasks we ask you to fulfill, we'd like you to:

- Read its description in detail—please ask for any additional details you may need ;
- Set up an estimate;
- Progress through the task (that will involve creating a git branch, pushing, and merging);
- Annotate the actual time spent—and whatever you'd like to comment with us about the task.


### 0. Set up your coding environment

- Fork this repository to your own Github account: <https://github.com/omitsis/omitsis-challenge-wordpress>. This is where you'll create your branches, merge your changes, and lately send us a pull request from. Please keep your fork private. Clone to your machine.
- Clone also this other repo which contains a docker stack similar to what we use for development: <https://github.com/omitsis/omitsis-challenge-stack>.
- To ease the configuration of the docker containers, place the working copies as sibling directories. That is:
  ```
	somewhere-in-your-hd
	├── omitsis-challenge-stack
	└── omitsis-challenge-wordpress
		├── dumps
		├── html
		└── README.md
  ```
- Start the set of docker containers by invoking `docker compose up` from the `omitsis-challenge-stack` directory. Please don't get stuck on this, contact us if you need any help. Note that the first run make take a while! A **phpinfo** page should now be accessible at <https://localhost/info.php>.

- Import our database dump.
  - Copy the `dumps/initial.sql` to the `html` dir.
  - Find the name of your `application` docker. If you haven't made any changes, it'll be "omitsis-challenge-application".
  - Connect to your container command line by executing `docker exec -ti omitsis-challenge-application bash`, you should get a prompt similar to this.
	```
	8f8c8a13eced:/var/www/html$
	```
  - Run `wp db import initial.sql`. Now you should be able to access our current challenge homepage at <https://localhost>. Viva!


- Set up an administrator user for yourself using the `wp` command. As you already know how to get to the application bash shell, look for the instructions you need using `wp help`.

- Fulfill any required tasks (remember to ask for additional detais if required).

- Work on each task in a separate branch. We prefer small well commented commits. Merge each task branch when ready.

- Remember to estimate each task in advance, and annotate the actual time dedicated when ready.

- Include a database dump of the final site in `dumps/result-YOURNAME.sql`

- Send us a pull request from your fork when you consider this challenge complete.

#### Regarding code style

- Any naming must be English language based
- Remember to keep functions short (save for data constructs)
- We like using namespaced code, see `functions.php` in the theme for an example
- Follow WordPress PHP Coding Standards <https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/>, your code will be validated using PHPCS.


#### Regarding commit messages

- Follow conventional commits conventions <https://www.conventionalcommits.org/en/v1.0.0/>
- Name your branches using whatever prefix is appropriate (`feature/...`, `chore/...`, `fix/...`)


#### Regarding internationalization

- Any text to be shown in the interface must use the gettext WordPress methods, *even* if you don't provide or load any translations.


#### Regarding accessibility

- Use appropriate HTML markup
- Allow any interactive element to be handled via keyboard
- When using animations/transitions via CSS/JS, provide some method to disable them (usually, a media query check against `prefers-reduced-motion` will suffice)


### A. Write a template and style some content in a grid

Our initial project already includes some posts, which are shown on the homepage without any styling and not so much info as we'd like.

Markup and style a responsive grid as shown in the [following picture](./docs/img/grid-technical-challenge.png). Notice that we'll appreciate keeping nesting to a minimum, semantic markup, and accessible styling.

- Note that this style must only apply to the posts archive listing
- You'll need to show **every** post (of type `post`) in the site in this grid—only one page!

A basic stylesheet is included in `wp-content/omitsis-challenge/style.css`. Add your CSS code there. Go as modern as you like! At this stage we'd like to know how well you manage custom properties, grid and/or flex layouts, and the most recent CSS features. We are not asking for backwards compatibility in this exercise, but the result must look alike both in Chromium and Firefox based browsers.

Do not use utility classes (we allow `.visually-hidden` though). No CSS libs allowed. Use BEM to name your classes. Avoid unnecessary nesting selectors.

#### Bonus

The task will be considered complete once the above requirements are fulfilled. But, if you feel like going for some extra, these are things we appreciate in our developments:

- Create an adequate custom media size to display the pictures in your template.
- Can you reach a 100 score on Lighthouse performance?
- Can you get the same behaviour without using any media query?


### B. Develop a filterable list using javascript

We've set up a _Who whe are_ page where part of Omitsis's Staff is listed in a table.

For a start, we want to see **your name on the table**. Append it to the array of people adding a filter (check the template for the name) in `functions.php`.

You must create an in-page search form to filter the list. The form must include:

- A free-text `input` to search through the names
- A `select` dropdown which will allow filtering by department.
- A search button.
- A reset button (only visible once a search has been performed).

Once a search is performed, only rows matching both criteria will be displayed.

Use vanilla javascript. No jQuery nor other external libs are allowed.


#### Bonus

- As the behaviour is implemented via JavaScript, the form won't do anything when JavaScript is not available or if the script fails. Can you create it via JS? Using a WebComponent or a `<template>` may work great for this.

- Have you put your additional scripts and styles in the assets directory? Are you loading them **only** for the template that needs them?


### C. Set up composer to install some plugins

To complete this challenge you'll need to connect again to the application bash console. Once there, you'll have access to both the `composer` and `wp` command line tools. Just follow our instructions!

```
# Initialize the composer project (will create composer.json).
# Replace wp-your-project-name as fit.
composer init --name "omitsis/wp-your-project-name-here" --author Omitsis --type project -n

# Set up the ACF repository.
composer config repositories.acf composer https://connect.advancedcustomfields.com

# Set up the WPackagist repository.
composer config repositories.wpackagist '{"type": "composer", "url": "<https://wpackagist.org>", "only": [ "wpackagist-plugin/*","wpackagist-theme/*" ]}'
```

Those steps should get you a ready to use composer environment. Didn't work? Ask for help.

Now, install the Advanced Custom Fields PRO plugin. Its vendor/name string is "wpengine/advanced-custom-fields-pro".

Thus, you need to run:

```
composer require wpengine/advanced-custom-fields-pro
```

You'll be asked for credentials, ask your instructors for them if they forgot to give you this info before the test.

Now, activate the plugin using wp-cli. Again, using the application bash console, execute:

```
wp help plugin
```

And find out how to activate the plugin.

Add all composer related files, and the plugin files, to the repo.

Remember to commit, push, merge.

Done.


### D. Create a custom post type with ACF fields

- Create a custom plugin named `omitsis-challenge-book`.
- Create a Custom Post Type named `omitsis_book`.
- Its posts must be publicly accessible on `/books/{item-slug}/`, and it should have an archive at `/books/`.
- It support (through core features) title, editor, thumbnail.
- Add the following additional fields using the Advanced Custom Fields plugin using PHP. If you haven't done this before, ask for a hint on how to proceed.
    - ISBN - type `text`
	- Allowed distribution countries - type `checkbox`, with multiple selection allowed, set these possible choices: Spain, Portugal.
	- Language - type `select`, single selection. Set these possible choices: Spanish, English.
- Add some content: create a couple of `omitsis_book` posts about your favourite books. (Just place the titles, some random gibberish for the content, and fill the three custom fields with anything).
- Create a specialized template to show each item, including the additional fields, in the archive. It should live in `wp-content/themes/omitsis-challenge/template-parts/content-omitsis_book.php`
- Use your best markup, do not care—at the moment—about presentation.


#### Bonus

The task will be considered complete once the above requirements are fulfilled. But, if you feel like going for some extra…

- Add code in the **theme** `functions.php` that adds a couple of additional options to the language choices.
- Restrict the allowed Gutenberg blocks to be used in the editor for this content type. Limit them to paragraphs and lists.


### E. Create a custom WP-CLI command

- Create a custom plugin named `omitsis-challenge-cli`
- Add a `WP_CLI` command `omitsis dump-expired`- Our database contains some hidden on the `wp_postmeta` table. Under the `meta_key` "expiration_date" we've saved an expiration date in ISO format. The `meta_key` "reputation" holds numeric values.

- The command will dump (more on the dump format later) posts which have all these characteristics:
  - `post_type` is "post"
  - `expiration_date` is before today
  - `reputation` is over 10
- Sort the results by descending `reputation`, then by `expiration_date`
- Regarding the format: Output and ASCII table with the following headers: `post_id`, `post_title`, `expiration_date`, `reputation`. Hint: <https://make.wordpress.org/cli/handbook/references/internal-api/wp-cli-utils-format-items/> (see the bonus section below for extras).
- **Important** this task must be completed using **one** plain SQL query which is executed via the global `$wpdb` object.
- Ensure safety of the query!


#### Bonus

The task will be considered complete once the above requirements are fulfilled. But, if you feel like going for some extra, why not add some flags to your command?

- Allow passing a flag like `--min-reputation=NUMBER` which restricts the selection to posts with reputation great than or equal to NUMBER.
- Allow passing a `--format=[yaml, table, json, csv]` to choose the output format.

---

Thanks for taking the challenge! We hope you feel this was a good investment of your time. We bet it'll be great to have you on board.

The Omitsis WordPress team

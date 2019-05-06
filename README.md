# Requirements

1. Install Docker

# Local Development
Theme development should occur in the `site/wp-content/themes` directory.
Likewise, any custom plugin development should occur in the `site/wp-content/plugins` directory.

If you want to include additional plugins, without needing to modify the plugin files, please install the plugin from `wpackagist.com` via the `site/composer.json` file in the `require` section. Make sure to update the `.gitignore` file to exclude the plugin from commits. 

If you do need to include plugins that require customizations to its files, then you will need to manually include that plugin and its file within the `site/wp-content/plugins` directory. 

To start up the wordpress environment locally, simply run
`docker-compose up --build`

You can now access WordPress via your browser at `localhost:8080`.
Additionally, if required, you can access MySQL at `localhost:3306`.

In order to ensure that you are working with the latest copy of the hosted development database data, you must log into the WordPress dashboard from your local environment and use the `WP Migrate DB Pro` plugin to pull from the development database.

To bring down the local environment you can usually do so via `ctrl+c`. However, if this results in an error `ERROR: Aborting.` then you must run `docker-compose down`.

# Deployment
This project follows a traditional GitFlow, the process goes like this:

1. Developers branch off the `development` branch to do local development.

2. Once the developer is ready to deploy his code to the hosted `development` environment, he opens a PR to merge his branch into the development branch. Upon merge, the WordPress site will be automatically built and deployed to the hosted development environment. 

3. After you merge, you must also migrate the database from your local environment to the hosted development environment (assuming you have made any changes to dynamic content that is stored in the database), you must log into the WordPress dashboard on your local environment and use the `WP Migrate DB Pro` plugin to push to the development database. Be sure to configure the migration to update the site URL.

4. The above two steps should then be repeated between `development` & `staging`, and then between `staging` & `master`. When migrating the database from development to staging, be sure to configure the migration to exclude test data. 




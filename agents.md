# Agents

- `index.php`: Starts the app, prepares demo form state, and passes page data into the layout.
- `templates/layout.php`: Renders the HTML shell, page sections, and the sample form.
- `assets/css/input.css`: Tailwind source file plus the theme variables for the palette.
- `assets/css/styles.css`: Generated stylesheet output from the Tailwind CLI.
- `assets/js/app.js`: Handles the mobile navigation toggle and live preview updates.
- `tailwind.config.js`: Tells Tailwind which files to scan and maps the semantic color names.
- `package.json`: Defines the local Tailwind build scripts.
- `.github/workflows/ci.yml`: Runs linting and the CSS build on pushes and pull requests.
- `.github/workflows/deploy.yml`: Syncs the built project to a server over SSH using repository secrets.
- `agents.md`: This file, used as the quick map of responsibilities.

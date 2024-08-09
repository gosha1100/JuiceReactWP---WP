# JuiceReactWP - React Integration for WordPress

**JuiceReactWP** offers an efficient solution for integrating React with existing WordPress projects. SPA is not available with this setup, because it's just made for using react libaries and people who are used to react syntax. If You wanna use wordpress as a headless, this is the wrong repo. It's particularly useful for working with child themes or when requiring React's capabilities while maintaining Gutenberg block editing for client projects.

## Directory Structure

Place the JuiceReactWP directory in the same location as your React project. You can find the repository here: [JuiceReactWP - React](https://github.com/gosha1100/JuiceReactWP---React).

A shell script, executed during `pnpm build` ([copy-indexjs_indexcss.sh]), copies the compiled JavaScript and CSS files into the appropriate locations within the WordPress project. The current paths are `../WordPressJuicer/wp-content/themes/reactJuice/index.css` and `../WordPressJuicer/wp-content/themes/reactJuice/index.js`. Adjust these if you rename the directory.

## Features

- **Navigation Menu and Footer**: These are pre-added for convenience.
- **LazyBlock Integration**: Utilize `json_encode` on your LazyBlock PHP array and mount the corresponding React component in your LazyBlock's `block.php`.

## Component Management

- **Creating New Components**: Use `pnpm component components/'YourComponent'` to create a new React component in the `components` directory, along with a matching Storybook file. Adjust the values for this component in the Storybook file.
- **Including Components**: Incorporate your new components into `bootstrap.ts`. See the Juice component for an example.
- **Component Library Development**: Run `pnpm storybook` in the React directory to launch a local development environment for the React component library. This environment lists all components, facilitating isolated development of each one.

## WordPress Environment Setup

- **Configuration**: Use `ddev config` in the WordPress directory for setup.
- **Starting the Environment**: Use `ddev start`.
- **Admin Panel Access**: Access the admin panel with `ddev launch admin`.

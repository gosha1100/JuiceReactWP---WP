# JuiceReactWP - React Integration for WordPress

This repository provides an efficient solution for integrating React with an existing WordPress project, particularly useful when working with child themes or when you need access to React's capabilities while maintaining Gutenberg block editing for client projects.

## Directory Structure

Ensure that this directory is located in the same directory as your React project. The repository can be found here: [JuiceReactWP - React](https://github.com/gosha1100/JuiceReactWP---React).

A shell script is used to copy the compiled JavaScript and CSS files into the appropriate locations within the WordPress project.

## Features

- **Navigation Menu and Footer**: Pre-added for convenience.
- **LazyBlock Integration**: Utilize `json_encode` on your LazyBlock PHP array and mount the corresponding React component in your LazyBlock `block.php`.

## Component Management

- **Creating New Components**: Use `pnpm component components/'YourComponent'` to create a new React component in the `components` directory along with a matching Storybook file. Remember to adjust the values for this component in the Storybook file.
- **Including Components**: Add your new components to `bootstrap.ts`. For example, see the Juice component.
- **Component Library Development**: Run `pnpm storybook` in the React directory to launch your local development environment for the React component library. This environment lists all components, allowing for isolated development of each one.

## WordPress Environment Setup

Use `ddev config` in the WordPress directory to set up your WordPress environment. Start the environment with `ddev start` and launch the admin panel using `ddev launch admin`.

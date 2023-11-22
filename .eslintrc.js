module.exports = {
  root: true,
  env: {
    browser: true,
    es2021: true,
    node: true,
  },
  parserOptions: {
    parser: 'babel-eslint',
    sourceType: "module",
    ecmaVersion: 2021,
  },
  extends: ['prettier', 'plugin:prettier/recommended'],
  plugins: ['prettier'],
  // add your custom rules here
  rules: {
    'no-console': 'off',
    'require-await': 'off',
    'object-shorthand': 'off',
    'vue/no-arrow-functions-in-watch': 'off',
    'unicorn/prefer-includes': 'off',
  },
}

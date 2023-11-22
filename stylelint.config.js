module.exports = {
  extends: ['stylelint-config-standard', 'stylelint-config-prettier', '@wordpress/stylelint-config'],
  // add your custom config here
  // https://stylelint.io/user-guide/configuration
  rules: {
    "at-rule-no-unknown": [true, { ignoreAtRules: ["use", "forward", "import", "include", "mixin", "extend", "each", "return", "function", "if", "for", "else"] }],
    // 'scss/at-rule-no-unknown': false,
    'declaration-empty-line-before': null,
    'no-descending-specificity': null,
    'comment-empty-line-before': null,
    'no-invalid-position-at-import-rule': null,
  },
}
